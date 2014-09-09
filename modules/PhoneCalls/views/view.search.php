<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('include/MVC/View/SugarView.php');

class PhoneCallsViewSearch extends SugarView
{

    var $tpl = 'modules/PhoneCalls/tpls/search.tpl';
    protected $_phone;
    protected $_phone_corrected;
    protected $_search;
    protected $_search_corrected;

    /**
     * Constructot
     */
    function PhoneCallsViewSearch()
    {
        parent::SugarView();
    }

    /**
     * (non-PHPdoc)
     * @see SugarView::display()
     */
    function display()
    {
        global
        $odd_bg,
        $even_bg,
        $hilite_bg;

        if (!empty($_REQUEST['phone'])) {
            $this->_phone = trim($_REQUEST['phone']);
        } elseif (!empty($this->bean->id)) {
            $this->_phone = $this->bean->phone;
        }
        if (!empty($_REQUEST['search'])) {
            $this->_search = trim($_REQUEST['search']);
        }
        if (empty($this->_search) && !empty($this->_phone)) {
            $this->_search = $this->_phone;
        }
        if (empty($this->_phone) && !empty($this->_search)) {
            $this->_phone = $this->_search;
        }
        $beans = array();
        $create_access = array();
        $this->_phone_corrected = PhoneCall::correctPhoneNumber($this->_phone);
        $this->_search_corrected = PhoneCall::correctPhoneNumber($this->_search);

        foreach (PhoneCall::getSupportedModules() as $module) {
            $beans_item = $this->getBeans($module);
            if (!empty($beans_item))
                $beans[$module] = $beans_item;
        }

        $title = translate('LNK_NEW_CALL', 'Calls');
        foreach ($beans as $module => $beans_by_module) {
            foreach ($beans_by_module['list'] as $key => $bean) {
                $params = http_build_query(array(
                    'parent_type' => $module,
                    'parent_name' => htmlspecialchars_decode(strip_tags($bean['name'])),
                    'parent_id' => $bean['id'],
                ));

                $beans[$module]['list'][$key]['NEW_CALL_LINK'] = ''
                . '<a target="_blank" href="index.php?module=Calls&action=EditView'
                . (empty($params) ? '' : '&' . $params) . '">'
                . '<img src="themes/default/images/Calls.gif" title="' . $title . '" alt="' . $title . '" />'
                . '</a>';
            }
        }

        $this->ss->assign('bgHilite', $hilite_bg);
        $this->ss->assign('rowColor', array('oddListRow', 'evenListRow'));
        $this->ss->assign('bgColor', array($odd_bg, $even_bg));
        $this->ss->assign('PHONE', $this->_phone);
        $this->ss->assign('SEARCH', $this->_search);
        $this->ss->assign('PHONE_CORRECTED', $this->_phone_corrected);
        $this->ss->assign('BEANS', $beans);
        $this->ss->assign('PHONECALL', $this->bean);
        echo $this->ss->fetch($this->tpl);
    }

    /**
     * Return list of finded beans
     * 
     * @param	string	$module
     * @return	array
     */
    public function getBeans($module)
    {
        require_once('modules/PhoneCalls/PhoneCall.php');

        $bean = BeanFactory::getBean($module);

        if (empty($bean)) {
            return null;
        }

        $filter = array();
        $where_phone = array();
        $name_fields = PhoneCall::getNameFields($bean);
        
        if (isset($name_fields['salutation'])) {
            unset($name_fields['salutation']);
        }

        if (isset($name_fields['title'])) {
            unset($name_fields['title']);
        }

        $filter = $name_fields;
        $display_fields = array();
        $display_fields_order = array();
        $display_fields['name'] = $bean->getFieldDefinition('name');
        $display_fields_order['name'] = -1;
        $phone_fields = array();
        $phone_main = array();
        $search_fields = array();

        foreach ($bean->getFieldDefinitions() as $field_name => $field_def) {
            if (isset($field_def['type']) && $field_def['type'] == 'phone') {
                if ((!isset($field_def['source']) || $field_def['source'] == 'db') &&
                (!isset($field_def['phone_search']) || $field_def['phone_search'])) {
                    $phone_fields[] = $field_name;
                    $filter[$field_name] = $field_def;
                    $display_fields[$field_name] = $field_def;
                    $display_fields_order[$field_name] = !isset($field_def['phone_search']) || is_bool($field_def['phone_search']) ? ($field_name == 'name' ? -1 : 100) : intval($field_def['phone_search']);
                    if (!empty($this->_search_corrected)) {
                        $query_field = (isset($field_def['table']) ? $field_def['table'] : $bean->table_name) . '.' .
                        (isset($field_def['rname']) ? $field_def['rname'] : $field_name);
                        $where_phone[] = PhoneCall::prepareDatabasePhone($query_field) . " LIKE '%" . $bean->db->quote($this->_search_corrected) . "%'";
                    }
                }
                if (!empty($field_def['phone_main'])) {
                    $phone_main[$field_name] = $field_def;
                }
            } elseif (!empty($field_def['phone_search'])) {
                $search_fields[$field_name] = $field_def;
                $filter[$field_name] = $field_def;
                $display_fields[$field_name] = $field_def;
                $display_fields_order[$field_name] = is_bool($field_def['phone_search']) ? ($field_name == 'name' ? -1 : 100) : $field_def['phone_search'];
            }
        }
        if (empty($phone_fields)) {
            return null;
        }
        $display_fields_tmp = $display_fields;
        $display_fields = array();
        asort($display_fields_order);
        foreach ($display_fields_order as $display_fields_field_name => $display_fields_field_order) {
            $display_fields[$display_fields_field_name] = $display_fields_tmp[$display_fields_field_name];
        }

        $urls = array();
        $urls['create'] = array(
            'link' => 'index.php?module=' . urldecode($module) . '&action=EditView',
            'label' => 'LNK_NEW_RECORD',
            'module' => $module,
            'access' => ACLController::checkAccess($module, 'edit', true),
        );
        if (!empty($phone_main)) {
            foreach (array_keys($phone_main) as $phone_main_field) {
                $urls['create']['link'].= '&' . $phone_main_field . '=' . urlencode($this->_search);
            }
        }

        $return = array(
            'urls' => $urls,
            'fields' => $display_fields,
            'list' => array()
        );
        $where = array();
        if (!empty($where_phone)) {
            $where[] = '(' . implode(' OR ', $where_phone) . ')';
        }
        if (!empty($this->_search)) {
            foreach ($search_fields as $field_name => $field_def) {
                if ($field_name == 'name' &&
                (($bean instanceof Person) || count($name_fields) > 1)) {
                    $name_where = array();
                    $name_parts = explode(' ', preg_replace('/\s+/', ' ', $this->_search), count($name_fields));
                    foreach ($name_parts as $name_part) {
                        $name_where_item = array();
                        foreach ($name_fields as $name_field_name => $name_field_def) {
                            $query_field = (isset($name_field_def['table']) ? $name_field_def['table'] : $bean->table_name) . '.' .
                            (isset($name_field_def['rname']) ? $name_field_def['rname'] : $name_field_name);
                            $name_where_item[] = $query_field . ' LIKE \'%' . $bean->db->quote($name_part) . '%\'';
                        }
                        $name_where[] = '(' . implode(' OR ', $name_where_item) . ')';
                    }
                    $name_where = implode(' AND ', $name_where);
                    $where[] = '(' . $name_where . ')';
                } else {
                    $query_field = (isset($field_def['table']) ? $field_def['table'] : $bean->table_name) . '.' .
                    (isset($field_def['rname']) ? $field_def['rname'] : $field_name);
                    $where[] = $query_field . ' LIKE \'%' . $bean->db->quote($this->_search) . '%\'';
                }
            }
        }
        $where = implode(' OR ', $where);
        if (empty($where)) {
            return $return;
        }
        if (count($name_fields) > 1) {
            $order_by = array();
            foreach ($name_fields as $name_field_name => $name_field_def) {
                $order_by[] = $bean->table_name . '.' . $name_field_name . ' ASC';
            }
            $order_by = implode(', ', $order_by);
        } else {
            reset($name_fields);
            $order_by = $bean->table_name . '.' . key($name_fields) . ' ASC';
        }

        $sql_array = $bean->create_new_list_query($order_by, $where, $filter, array(), 0, '', true, $bean, true);
        $sql = $sql_array['select'] . $sql_array['from'] . $sql_array['where'] . $sql_array['order_by'];
        $result = $bean->db->query($sql);
        $return['list'] = array();
        while (($row = $bean->db->fetchByAssoc($result)) != null) {
            if (count($name_fields) > 1 && empty($row['name'])) {
                $row['name'] = array();
                foreach ($name_fields as $name_field => $name_field_def) {
                    $row['name'][] = $row[$name_field];
                }
                $row['name'] = implode(' ', $row['name']);
            }

            $row['name'] = '<a target="_blank" ' .
            'href="index.php?module=' . urldecode($module) . '&action=DetailView&record=' . urldecode($row['id']) . '">' .
            $row['name'] . '</a>';

            foreach ($phone_fields as $phone_field) {
                if (!empty($this->_phone_corrected) && !empty($row[$phone_field])) {
                    $class = strpos(PhoneCall::correctPhoneNumber($row[$phone_field]), $this->_phone_corrected) !== false ? 'phonecall_highlite' : 'phonecall';

                    $params = array(
                        'class' => $class,
                        'name' => $phone_field);

                    $row[$phone_field] = PhoneCall::getPhoneLink($row[$phone_field], $bean->module_dir, $row['id'], $params);
                } elseif (!empty($row[$phone_field])) {
                    $params = array('name' => $phone_field);

                    $row[$phone_field] = PhoneCall::getPhoneLink($row[$phone_field], $bean->module_dir, $row['id'], $params);
                }
            }
            $return['list'][] = $row;
        }

        return $return;
    }

}
