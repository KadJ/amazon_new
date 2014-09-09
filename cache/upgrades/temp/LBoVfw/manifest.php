<?php

$manifest = array(
    'name' => 'All-In-One CTI',
    'description' => 'All-In-One CTI Integration',
    'version' => '14.06.20a',
    'author' => 'Vedisoft',
    'readme' => 'README',
    'acceptable_sugar_flavors' => array('CE', 'PRO', 'CORP', 'ULT', 'ENT'),
    'acceptable_sugar_versions' => array(
        'exact_matches' => array(),
        'regex_matches' => array('6\.\d+\.\d+$'),
    ),
    'icon' => '',
    'is_uninstallable' => true,
    'published_date' => '2014-20-06',
    'type' => 'module',
);

$installdefs['id'] = 'aioc_' . $manifest['version'];

$installdefs['administration'] = array(
    array(
        'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Administration/cti_configurator.php',
    ),
);

$installdefs['copy'] = array(
    array(
        'from' => '<basepath>/modules/PhoneCalls',
        'to' => 'modules/PhoneCalls',
    ),
    array(
        'from' => '<basepath>/custom/',
        'to' => 'custom',
    ),
    array(
        'from' => '<basepath>/custom/modules/Configurator/cti_configurator.php',
        'to' => 'custom/modules/Configurator/cti_configurator.php',
    ),
    array(
        'from' => '<basepath>/custom/modules/Configurator/cti_configurator.tpl',
        'to' => 'custom/modules/Configurator/cti_configurator.tpl',
    ),
    array(
        'from' => '<basepath>/custom/modules/Configurator/js/cti_configurator.js',
        'to' => 'custom/modules/Configurator/js/cti_configurator.js',
    ),
    array(
        'from' => '<basepath>/custom/include/CTI',
        'to' => 'custom/include/CTI',
    ),
    array(
        'from' => '<basepath>/custom/include/Smarty',
        'to' => 'custom/include/Smarty',
    ),
    array(
        'from' => '<basepath>/custom/include/SugarFields',
        'to' => 'custom/include/SugarFields',
    ),
    array(
        'from' => '<basepath>/custom/include/javascript',
        'to' => 'custom/include/javascript',
    ),
    array(
        'from' => '<basepath>/custom/include/images',
        'to' => 'custom/include/images',
    ),
);

$installdefs['language'] = array(
    array(
        'from' => '<basepath>/custom/Extension/application/Ext/Language/en_us.lang.php',
        'to_module' => 'application',
        'language' => 'en_us',
    ),
    array(
        'from' => '<basepath>/custom/Extension/application/Ext/Language/ru_ru.lang.php',
        'to_module' => 'application',
        'language' => 'ru_ru',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/en_us.lang.php',
        'to_module' => 'Administration',
        'language' => 'en_us',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/ru_ru.lang.php',
        'to_module' => 'Administration',
        'language' => 'ru_ru',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Configurator/Ext/Language/en_us.lang.php',
        'to_module' => 'Configurator',
        'language' => 'en_us',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Configurator/Ext/Language/ru_ru.lang.php',
        'to_module' => 'Configurator',
        'language' => 'ru_ru',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Users/Ext/Language/en_us.lang.php',
        'to_module' => 'Users',
        'language' => 'en_us',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Users/Ext/Language/ru_ru.lang.php',
        'to_module' => 'Users',
        'language' => 'ru_ru',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Accounts/Ext/Language/en_us.lang.php',
        'to_module' => 'Accounts',
        'language' => 'en_us',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Accounts/Ext/Language/ru_ru.lang.php',
        'to_module' => 'Accounts',
        'language' => 'ru_ru',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Contacts/Ext/Language/en_us.lang.php',
        'to_module' => 'Contacts',
        'language' => 'en_us',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Contacts/Ext/Language/ru_ru.lang.php',
        'to_module' => 'Contacts',
        'language' => 'ru_ru',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Leads/Ext/Language/en_us.lang.php',
        'to_module' => 'Leads',
        'language' => 'en_us',
    ),
    array(
        'from' => '<basepath>/custom/Extension/modules/Leads/Ext/Language/ru_ru.lang.php',
        'to_module' => 'Leads',
        'language' => 'ru_ru',
    ),
);

$installdefs['logic_hooks'] = array(
    array(
        'module' => '',
        'hook' => 'after_ui_footer',
        'order' => 1,
        'description' => 'after_ui_footer insert All-In-One-CTI js',
        'file' => 'custom/include/CTI/MainHook.php',
        'class' => 'CTI_MainHook',
        'function' => 'displayJavascript',
    ),
);

$installdefs['custom_fields'] = array(
    array(
        'name' => 'cti_ext_c',
        'label' => 'LBL_CTI_EXT',
        'type' => 'varchar',
        'max_size' => 255,
        'require_option' => '0',
        'default_value' => '',
        'ext1' => '',
        'ext2' => '',
        'ext3' => '',
        'audited' => 0,
        'module' => 'Users',
    ),
    array(
        'name' => 'cti_inbound_c',
        'label' => 'LBL_CTI_INBOUND',
        'type' => 'bool',
        'max_size' => 1,
        'require_option' => '0',
        'default_value' => false,
        'ext1' => '',
        'ext2' => '',
        'ext3' => '',
        'audited' => 0,
        'module' => 'Users',
    ),
    array(
        'name' => 'cti_outbound_c',
        'label' => 'LBL_CTI_OUTBOUND',
        'type' => 'bool',
        'max_size' => 1,
        'require_option' => '0',
        'default_value' => false,
        'ext1' => '',
        'ext2' => '',
        'ext3' => '',
        'audited' => 0,
        'module' => 'Users',
    ),
);

$installdefs['beans'] = array(
    array(
        'module' => 'PhoneCalls',
        'class' => 'PhoneCall',
        'path' => 'modules/PhoneCalls/PhoneCall.php',
        'tab' => true,
    )
);

$installdefs['vardefs'] = array(
    array(
        'name' => $installdefs['id'],
        'from' => '<basepath>/custom/Extension/modules/Accounts/Ext/Vardefs/ext.php',
        'to_module' => 'Accounts',
    ),
    array(
        'name' => $installdefs['id'],
        'from' => '<basepath>/custom/Extension/modules/Contacts/Ext/Vardefs/ext.php',
        'to_module' => 'Contacts',
    ),
    array(
        'name' => $installdefs['id'],
        'from' => '<basepath>/custom/Extension/modules/Leads/Ext/Vardefs/ext.php',
        'to_module' => 'Leads',
    ),
);

$installdefs['layoutdefs'] = array(
    array(
        'name' => $installdefs['id'],
        'from' => '<basepath>/custom/Extension/modules/Leads/Ext/Layoutdefs/ext.php',
        'to_module' => 'Accounts',
    ),
    array(
        'name' => $installdefs['id'],
        'from' => '<basepath>/custom/Extension/modules/Contacts/Ext/Layoutdefs/ext.php',
        'to_module' => 'Contacts',
    ),
    array(
        'name' => $installdefs['id'],
        'from' => '<basepath>/custom/Extension/modules/Leads/Ext/Layoutdefs/ext.php',
        'to_module' => 'Leads',
    ),
);

