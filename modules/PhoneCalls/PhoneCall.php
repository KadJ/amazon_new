<?php

class PhoneCall extends Basic
{

    private static $_supported_modules;
    public $direction;
    public $phone_master;
    public $phone_slave;
    public $phone;
    public $status;
    public $online;
    public $parent_type;
    public $parent_id;
    public $parent_name;
    public $talk_start;
    public $talk_duration;
    public $online_duration;
    public $file_url;
    public $file_link;

    public function PhoneCall()
    {
        $this->module_dir = 'PhoneCalls';
        $this->object_name = 'PhoneCall';
        $this->table_name = 'phonecalls';
        $this->importable = false;

        parent::Basic();
    }
    
    public static function getSupportedModules()
    {
        if (!isset(self::$_supported_modules)) {
            global $modInvisList;

            $supported_modules = SugarConfig::getInstance()->get('phone_calls_supported_modules');
            if (empty($supported_modules) || !is_array($supported_modules)) {
                $supported_modules = array(
                    'Accounts',
                    'Contacts',
                    'Leads',
                );
            }
            foreach ($supported_modules as $key => $module) {
                if (in_array($module, $modInvisList)) {
                    unset($supported_modules[$key]);
                }
            }
            self::$_supported_modules = $supported_modules;
        }

        return self::$_supported_modules;
    }

    public static function getInstance()
    {
        static $instance;

        if (!isset($instance)) {
            $instance = new self;
        }

        return $instance;
    }

    public function UserACLAccess($user, $view, $permission = self::PERMISSION_NOT_SET)
    {
        switch (strtolower($view)) {
            case 'popupeditview':
            case 'delete':
            case 'export':
            case 'import':
                return false;
                break;
            default:
                return parent::UserACLAccess($user, $view, $permission);
                break;
        }
    }

    public function setName()
    {
        if (empty($this->name)) {
            if ($this->direction == 0) {
                $this->name = $this->phone_master;
            }
            if ($this->direction == 1) {
                $this->name = $this->phone_slave;
            }
        }
    }

    public function unformat_all_fields()
    {
        $this->talk_duration = self::unformatDuration($this->talk_duration);
        $this->online_duration = self::unformatDuration($this->online_duration);

        parent::unformat_all_fields();
    }

    public function preprocess_fields_on_save()
    {
        $this->setName();
        $this->talk_duration = self::unformatDuration($this->talk_duration);
        $this->online_duration = self::unformatDuration($this->online_duration);

        if (empty($this->assigned_user_id)) {
            $user_phone = intval($this->direction) === 0 ? $this->phone_slave : $this->phone_master;
            $this->assigned_user_id = self::getUserIdByInternalNumber($user_phone);
        }

        parent::preprocess_fields_on_save();
    }

    public function populateFromRow($row)
    {
        parent::populateFromRow($row);
        $this->setName();
        $this->loadFileLink();
    }

    protected function loadFileLink()
    {
        if (!empty($this->file_url) && $this->ACLAccess('view')) {
            $link = '<a target="_blank" href=":file_url" title=":title">:name</a>';
            $this->file_link = strtr($link, array(
                ':name' => translate('LBL_FILE_LINK_LABEL', 'PhoneCalls'),
                ':title' => translate('LBL_FILE_LINK_TITLE', 'PhoneCalls'),
                ':file_url' => $this->file_url,
            ));
        } else {
            $this->file_link = translate('LBL_FILE_NO_LINK', $this->module_dir);
        }
    }

    protected function loadParentName()
    {
        if (empty($this->parent_type) && empty($this->parent_id) && $this->ACLAccess('edit')) {
            $link = '<a href=":link" title=":title">:name</a>';
            $this->parent_name = strtr($link, array(
                ':name' => translate('LNK_PARENT_SEARCH_LABEL', $this->module_dir),
                ':title' => translate('LNK_PARENT_SEARCH_TITLE', $this->module_dir),
                ':link' => 'index.php?' . http_build_query(array(
                    'module' => $this->module_dir,
                    'action' => 'Search',
                    'record' => $this->id,
                )),
            ));
        }
    }

    public function get_list_view_array()
    {
        $this->loadFileLink();
        $return = parent::get_list_view_array();
        
        return $return;
    }


    public function fill_in_additional_parent_fields()
    {
        parent::fill_in_additional_parent_fields();
        $this->loadParentName();
    }

    public function check_date_relationships_load()
    {
        if (empty($this->talk_start)) {
            $this->talk_start = $this->date_entered;
        }

        $this->talk_duration = self::formatDuration($this->talk_duration);
        $this->online_duration = self::formatDuration($this->online_duration);

        parent::check_date_relationships_load();
    }

    public static function getPhoneLink($phone = '', $module = '', $record = '', array $params = null)
    {
        global $current_user;

        if (is_array($phone)) {
            foreach ($phone as & $phone_item) {
                $phone_item = self::getPhoneLink($phone_item, $module, $record, $params);
            }

            return implode(', ', $phone);
        }

        $id = ($params && isset($params['id'])) ? $params['id'] : '';
        $class = ($params && isset($params['class'])) ? $params['class'] : 'phonecall';

        if (self::sendPhoneCalls()) {
            $phone = '<a href="javascript:void(0);" ' .
            'id="' . htmlspecialchars($id) . '" ' .
            'class="' . htmlspecialchars($class) . ' phoneCallsSend" ' .
            'phone="' . htmlspecialchars($phone) . '" ' .
            'module="' . htmlspecialchars($module) . '" ' .
            'record="' . htmlspecialchars($record) . '" ' .
            'label="' . htmlspecialchars(str_replace('"', '\\"', translate('LBL_SEND_CALL', 'PhoneCalls')) . $phone) . '" ' .
            '>' .
            $phone . '</a>';
        }

        return $phone;
    }

    public static function formatDuration($duration_int = 0)
    {
        if (is_string($duration_int) && strpos($duration_int, ':') !== false) {
            return $duration_int;
        }

        $duration_int = intval($duration_int);
        $duration = array(
            'h' => 3600,
            'm' => 60,
            's' => 1,
        );

        foreach ($duration as $duration_key => $duration_seconds) {
            $duration[$duration_key] = intval(floor($duration_int / $duration_seconds));
            $duration_int = $duration_int - $duration_seconds * $duration[$duration_key];
            $duration[$duration_key] = sprintf('%02u', $duration[$duration_key]);
        }

        if (intval($duration['h'], 10) < 10) {
            $duration['h'] = sprintf('%u', intval($duration['h'], 10));
        }

        if ($duration['h'] == '0') {
            unset($duration['h']);
            if (intval($duration['m'], 10) < 10) {
                $duration['m'] = sprintf('%u', intval($duration['m'], 10));
            }
        }

        return implode(':', $duration);
    }

    public static function unformatDuration($duration_str = '')
    {
        if ((string) intval($duration_str) === (string) $duration_str) {
            return intval($duration_str);
        }

        $duration_str = explode(':', $duration_str);
        $multiplier = 1;
        $time = 0;

        while (($duration_part = array_pop($duration_str)) !== null) {
            $time = $time + $multiplier * intval($duration_part, 10);
            $multiplier = $multiplier * 60;
        }

        return $time;
    }

    public static function getBeanRelatedPhoneCallsQuery($phones)
    {
        $phoneCall = new self;
        $db = $phoneCall->db;
        $table = $phoneCall->table_name;
        $where = array();
        $phone_master = self::prepareDatabasePhone($table . '.phone_master');
        $phone_slave = self::prepareDatabasePhone($table . '.phone_slave');

        foreach ($phones as $phone) {
            $phone = self::correctPhoneNumber($phone);
            if (!empty($phone)) {
                $condition = "LIKE '%" . $db->quote($phone) . "%'";
                $where[] = '(' . $table . '.direction = 0 AND ' . $phone_master . ' ' . $condition . ')';
                $where[] = '(' . $table . '.direction = 1 AND ' . $phone_slave . ' ' . $condition . ')';
            }
        }
        
        if (!empty($where)) {
            $where = implode(' OR ', $where);
        } else {
            $where = 'FALSE';
        }

        return $phoneCall->create_new_list_query('', $where, array(), array(), 0, '', false, $phoneCall);
    }

    public static function correctPhoneNumber($number)
    {
        $arg = array();
        
        preg_match('/[\W0-9]+[^а-яa-zё]?/iu', $number, $arg);
        
        if (empty($arg[0])) {
            return '';
        }
        
        $number = $arg[0];

        $number = preg_replace('/[^0-9]/u', '', $number);

        $settings = self::getPhoneCallsSettings();

        return substr($number, -$settings['cti_format']);
    }

    public static function sendPhoneCalls($user = null)
    {
        if ($user === null) {
            global $current_user;
            $user = & $current_user;
        }

        $settings = self::getPhoneCallsSettings($user);

        return (!empty($settings['cti_ext_c']) && !empty($settings['cti_outbound_c']));
    }

    public static function getPhoneCallsSettings($user = null)
    {
        global $current_user;

        if ($user === null) {
            $user = & $current_user;
        }

        if (!empty($user) && !empty($user->id)) {
            return array(
                'cti_ext_c' => $user->cti_ext_c,
                'cti_inbound_c' => $user->cti_inbound_c,
                'cti_outbound_c' => $user->cti_outbound_c,
                'cti_client_id' => SugarConfig::getInstance()->get('cti_client_id'),
                'cti_format' => SugarConfig::getInstance()->get('cti_format'),
                'cti_host' => SugarConfig::getInstance()->get('cti_host'),
                'cti_port' => SugarConfig::getInstance()->get('cti_port'),
            );
        } else {
            return array();
        }
    }

    public static function getUserIdByInternalNumber($number)
    {
        $db = DBMAnagerFactory::getInstance();

        $q = "
        SELECT 
            id
        FROM 
            users
        INNER JOIN
            users_cstm
        ON
            users.id = users_cstm.id_c
        WHERE
            users.deleted = 0 AND
            users_cstm.cti_ext_c = ':cti_ext_c'
        ";

        $sql = strtr($q, array(
            ':cti_ext_c' => $db->quote($number),
        ));

        $row = $db->fetchOne($sql);

        if (!empty($row['id'])) {
            return $row['id'];
        }

        return null;
    }
    
    public static function prepareDatabasePhone($phone_field)
    {
        $phone_field = "REPLACE($phone_field, '+', '')";
        $phone_field = "REPLACE($phone_field, ' ', '')";
        $phone_field = "REPLACE($phone_field, '-', '')";
        $phone_field = "REPLACE($phone_field, ')', '')";
        $phone_field = "REPLACE($phone_field, '(', '')";
        
        return $phone_field;
    }

    public static function getRedirectPhoneNumber($phone)
    {
        $db = DBMAnagerFactory::getInstance();
        $phone = PhoneCall::correctPhoneNumber($phone);
        $phone_search = "LIKE '%" . $db->quote($phone) . "%'";
        $phone_field = self::prepareDatabasePhone('#filed#');
        

        foreach (PhoneCall::getSupportedModules() as $module) {
            $bean = BeanFactory::getBean($module);
            $phone_where = array();
            
            foreach ($bean->getFieldDefinitions() as $field_def) {
                if ((isset($field_def['type']) && $field_def['type'] == 'phone') &&
                (!isset($field_def['source']) || $field_def['source'] == 'db') &&
                (!isset($field_def['phone_search']) || $field_def['phone_search'])) {
                    $phone_where[] = str_replace('#filed#', $bean->table_name . '.' . $field_def['name'], $phone_field) . ' ' . $phone_search;
                }
            }
            
            if (!empty($phone_where)) {
                $sql = "
                SELECT 
                    assigned_user_id 
                FROM 
                    {$bean->table_name}
                WHERE
                    {$bean->table_name}.deleted = 0 AND (" . implode(' OR ', $phone_where) . ") 
                LIMIT 1";

                $user_id = $db->getOne($sql);
                if (!empty($user_id)) {
                    $user = BeanFactory::getBean('Users', $user_id);
                    if (!empty($user)) {
                        return (string) $user->cti_ext_c;
                    }
                }
            }
        }

        return null;
    }

    public static function getNameFields(SugarBean $bean)
    {
        global $locale;

        $fields = array();
        $fields['name'] = $bean->getFieldDefinition('name');
        if (empty($fields['name']['db_concat_fields']))
            return $fields;

        foreach ($fields['name']['db_concat_fields'] as $field) {
            $fields[$field] = $bean->getFieldDefinition($field);
        }
        $sort_by = isset($fields['name']['sort_on']) ? $fields['name']['sort_on'] : null;
        unset($fields['name']);
        $format = $locale->getLocaleFormatMacro();
        $format = preg_replace('/[^flstp]/', '', $format);
        $standart_name_fields = array(
            'f' => 'first_name',
            'l' => 'last_name',
            's' => 'salutation',
            't' => 'title',
            'p' => 'patronymic'
        );

        $standart_fields = array();
        for ($i = 0; $i < strlen($format); $i++) {
            $format_char = substr($format, $i, 1);
            if (!isset($standart_name_fields[$format_char]) ||
            !isset($fields[$standart_name_fields[$format_char]]))
                continue;
            $standart_fields[$standart_name_fields[$format_char]] = $fields[$standart_name_fields[$format_char]];
        }
        if (!empty($standart_fields))
            $fields = $standart_fields;
        return $fields;
    }

    public static function getPhoneFields(SugarBean $bean)
    {
        $fields = array();

        foreach ($bean->getFieldDefinitions() as $field => $def) {
            if (isset($def['type']) && $def['type'] === 'phone') {
                $fields[] = isset($def['name']) ? $def['name'] : $field;
            }
        }

        return $fields;
    }

    static public function getCallEvetId($id)
    {
        $id = md5($id);
        $id = substr($id, 0, 8) . '-' . substr($id, 8, 4) . '-' . substr($id, 12, 4) . '-' . substr($id, 16, 4) . '-' . substr($id, 20, 12);

        return $id;
    }

    static public function isUsageId($id)
    {
        $db = DBManagerFactory::getInstance();

        $sql = "SELECT count(*) count FROM phonecalls WHERE id = '" . $db->quote($id) . "'";

        $result = $db->fetchOne($sql);

        if (!empty($result['count'])) {
            return true;
        }

        return false;
    }
    
	public function bean_implements($interface)
    {
        switch ($interface) {
            case 'ACL':return true;
        }
        return false;
    }
}
