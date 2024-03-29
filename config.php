<?php
// created: 2013-04-05 10:14:10
$sugar_config = array (
  'SAML_X509Cert' => '',
  'SAML_loginurl' => '',
  'admin_access_control' => false,
  'admin_export_only' => true,
  'aos' => 
  array (
    'version' => '5.2.3',
  ),
  'asterisk_call_subject_inbound_abbr' => 'Вх: ',
  'asterisk_call_subject_max_length' => '50',
  'asterisk_call_subject_outbound_abbr' => 'Исх: ',
  'asterisk_context' => 'from-internal',
  'asterisk_dialin_ext_match' => 'Local\\/(?:.*?)(\\d\\d\\d?\\d?\\d?)@',
  'asterisk_dialout_channel' => 'SIP/###',
  'asterisk_expr' => '^(sip\\/[1-9][0-9][0-9]?[0-9]?-|Local)',
  'asterisk_hide_call_popups_after_mins' => '60',
  'asterisk_host' => '194.125.236.103',
  'asterisk_listener_poll_rate' => '5000',
  'asterisk_opencnam_retries' => '4',
  'asterisk_port' => '5038',
  'asterisk_rg_cell_ring_expr' => '^Local\\/\\d{7,10}',
  'asterisk_rg_detect_expr' => '^Local\\/RG',
  'asterisk_secret' => 'Mak1Mozer0',
  'asterisk_short_call_status' => 'Held',
  'asterisk_soappass' => 'kaset45783592698',
  'asterisk_soapuser' => 'olga',
  'asterisk_user' => 'admin',
  'authenticationClass' => '',
  'cache_dir' => 'cache/',
  'calculate_response_time' => true,
  'calendar' => 
  array (
    'default_view' => 'week',
    'show_calls_by_default' => true,
    'show_tasks_by_default' => true,
    'editview_width' => 990,
    'editview_height' => 480,
    'day_timestep' => 15,
    'week_timestep' => 30,
    'month_timestep' => 60,
    'items_draggable' => true,
    'mouseover_expand' => true,
    'items_resizable' => true,
    'enable_repeat' => true,
    'max_repeat_count' => 1000,
  ),
  'chartEngine' => 'Jit',
  'common_ml_dir' => '',
  'create_default_user' => false,
  'cron' => 
  array (
    'max_cron_jobs' => 10,
    'max_cron_runtime' => 30,
    'min_cron_interval' => 30,
  ),
  'currency' => '',
  'dashlet_auto_refresh_min' => '30',
  'dashlet_display_row_options' => 
  array (
    0 => '1',
    1 => '3',
    2 => '5',
    3 => '10',
  ),
  'date_formats' => 
  array (
    'Y-m-d' => '2010-12-23',
    'm-d-Y' => '12-23-2010',
    'd-m-Y' => '23-12-2010',
    'Y/m/d' => '2010/12/23',
    'm/d/Y' => '12/23/2010',
    'd/m/Y' => '23/12/2010',
    'Y.m.d' => '2010.12.23',
    'd.m.Y' => '23.12.2010',
    'm.d.Y' => '12.23.2010',
  ),
  'datef' => 'm/d/Y',
  'dbconfig' => 
  array (
    'db_host_name' => 'localhost',
    'db_user_name' => 'root',
    'db_password' => 'sugar_root',
    'db_name' => 'sugar',
    'db_type' => 'mysql',
  ),
  'dbconfigoption' => 
  array (
    'persistent' => true,
    'autofree' => false,
    'debug' => 0,
    'seqname_format' => '%s_seq',
    'portability' => 0,
    'ssl' => false,
    'collation' => 'utf8_general_ci',
  ),
  'default_action' => 'index',
  'default_charset' => 'UTF-8',
  'default_currencies' => 
  array (
    'AUD' => 
    array (
      'name' => 'Australian Dollars',
      'iso4217' => 'AUD',
      'symbol' => '$',
    ),
    'BRL' => 
    array (
      'name' => 'Brazilian Reais',
      'iso4217' => 'BRL',
      'symbol' => 'R$',
    ),
    'GBP' => 
    array (
      'name' => 'British Pounds',
      'iso4217' => 'GBP',
      'symbol' => '£',
    ),
    'CAD' => 
    array (
      'name' => 'Canadian Dollars',
      'iso4217' => 'CAD',
      'symbol' => '$',
    ),
    'CNY' => 
    array (
      'name' => 'Chinese Yuan',
      'iso4217' => 'CNY',
      'symbol' => '￥',
    ),
    'EUR' => 
    array (
      'name' => 'Euro',
      'iso4217' => 'EUR',
      'symbol' => '€',
    ),
    'HKD' => 
    array (
      'name' => 'Hong Kong Dollars',
      'iso4217' => 'HKD',
      'symbol' => '$',
    ),
    'INR' => 
    array (
      'name' => 'Indian Rupees',
      'iso4217' => 'INR',
      'symbol' => '₨',
    ),
    'KRW' => 
    array (
      'name' => 'Korean Won',
      'iso4217' => 'KRW',
      'symbol' => '₩',
    ),
    'YEN' => 
    array (
      'name' => 'Japanese Yen',
      'iso4217' => 'JPY',
      'symbol' => '¥',
    ),
    'MXM' => 
    array (
      'name' => 'Mexican Pesos',
      'iso4217' => 'MXM',
      'symbol' => '$',
    ),
    'SGD' => 
    array (
      'name' => 'Singaporean Dollars',
      'iso4217' => 'SGD',
      'symbol' => '$',
    ),
    'CHF' => 
    array (
      'name' => 'Swiss Franc',
      'iso4217' => 'CHF',
      'symbol' => 'SFr.',
    ),
    'THB' => 
    array (
      'name' => 'Thai Baht',
      'iso4217' => 'THB',
      'symbol' => '฿',
    ),
    'USD' => 
    array (
      'name' => 'US Dollars',
      'iso4217' => 'USD',
      'symbol' => '$',
    ),
  ),
  'default_currency_iso4217' => 'RUB',
  'default_currency_name' => 'RUB',
  'default_currency_significant_digits' => 2,
  'default_currency_symbol' => '$',
  'default_date_format' => 'd/m/Y',
  'default_decimal_seperator' => ',',
  'default_email_charset' => 'UTF-8',
  'default_email_client' => 'sugar',
  'default_email_editor' => 'html',
  'default_export_charset' => 'UTF-8',
  'default_language' => 'ru_ru',
  'default_locale_name_format' => 'l f',
  'default_max_tabs' => '7',
  'default_module' => 'Home',
  'default_module_favicon' => true,
  'default_navigation_paradigm' => 'gm',
  'default_number_grouping_seperator' => '.',
  'default_password' => '',
  'default_permissions' => 
  array (
    'dir_mode' => 1533,
    'file_mode' => 436,
    'user' => 'www-data',
    'group' => 'www-data',
  ),
  'default_subpanel_links' => false,
  'default_subpanel_tabs' => true,
  'default_swap_last_viewed' => false,
  'default_swap_shortcuts' => false,
  'default_theme' => 'ModernAqua',
  'default_time_format' => 'H:i',
  'default_user_is_admin' => false,
  'default_user_name' => '',
  'demoData' => 'no',
  'developerMode' => false,
  'disableAjaxUI' => true,
  'disable_export' => false,
  'disable_persistent_connections' => 'false',
  'disabled_languages' => '',
  'disabled_themes' => '',
  'display_email_template_variable_chooser' => false,
  'display_inbound_email_buttons' => false,
  'dump_slow_queries' => true,
  'email_address_separator' => ',',
  'email_default_client' => 'sugar',
  'email_default_delete_attachments' => true,
  'email_default_editor' => 'html',
  'email_xss' => 'YToxOntzOjY6InNjcmlwdCI7czo2OiJzY3JpcHQiO30=',
  'enable_action_menu' => true,
  'export_delimiter' => ',',
  'history_max_viewed' => 5000,
  'host_name' => 'derinat',
  'import_dir' => 'cache/import/',
  'import_max_execution_time' => 3600,
  'import_max_records_per_file' => 100,
  'import_max_records_total_limit' => '',
  'inbound_email_case_subject_macro' => '[CASE:%1]',
  'installer_locked' => true,
  'jobs' => 
  array (
    'min_retry_interval' => 30,
    'max_retries' => 5,
    'timeout' => 86400,
  ),
  'js_custom_version' => 1,
  'js_lang_version' => 36,
  'languages' => 
  array (
    'en_us' => 'English (US)',
    'ru_ru' => 'Русский - Russian',
  ),
  'large_scale_test' => false,
  'lead_conv_activity_opt' => 'donothing',
  'list_max_entries_per_page' => '50',
  'list_max_entries_per_subpanel' => '500',
  'lock_default_user_name' => false,
  'lock_homepage' => false,
  'lock_subpanels' => false,
  'log_dir' => '.',
  'log_file' => 'sugarcrm.log',
  'log_memory_usage' => false,
  'logger' => 
  array (
    'level' => 'error',
    'file' => 
    array (
      'ext' => '.log',
      'name' => 'sugarcrm',
      'dateFormat' => '%c',
      'maxSize' => '10MB',
      'maxLogs' => 10,
      'suffix' => '',
    ),
  ),
  'max_dashlets_homepage' => '15',
  'name_formats' => 
  array (
    's f l' => 's f l',
    'f l' => 'f l',
    's l' => 's l',
    'l, s f' => 'l, s f',
    'l, f' => 'l, f',
    's l, f' => 's l, f',
    'l s f' => 'l s f',
    'l f s' => 'l f s',
    'l f' => 'l f',
  ),
  'passwordsetting' => 
  array (
    'SystemGeneratedPasswordON' => '0',
    'generatepasswordtmpl' => '72d2b8dd-dd34-8e92-d235-509ab7eb7c63',
    'lostpasswordtmpl' => '72d2b8dd-dd34-8e92-d235-509ab7eb7c63',
    'forgotpasswordON' => true,
    'linkexpiration' => true,
    'linkexpirationtime' => 24,
    'linkexpirationtype' => 60,
    'systexpiration' => '1',
    'systexpirationtime' => '1',
    'systexpirationtype' => '7',
    'systexpirationlogin' => '',
    'minpwdlength' => 6,
    'oneupper' => true,
    'onelower' => true,
    'onenumber' => true,
  ),
  'portal_view' => 'single_user',
  'require_accounts' => true,
  'resource_management' => 
  array (
    'special_query_limit' => 50000,
    'special_query_modules' => 
    array (
      0 => 'Reports',
      1 => 'Export',
      2 => 'Import',
      3 => 'Administration',
      4 => 'Sync',
    ),
    'default_limit' => 5000,
  ),
  'rss_cache_time' => '10800',
  'save_query' => 'all',
  'search_wildcard_char' => '%',
  'search_wildcard_infront' => false,
  'securitysuite_additive' => false,
  'securitysuite_filter_user_list' => true,
  'securitysuite_inherit_assigned' => false,
  'securitysuite_inherit_creator' => true,
  'securitysuite_inherit_parent' => false,
  'securitysuite_popup_select' => true,
  'securitysuite_strict_rights' => true,
  'securitysuite_user_popup' => true,
  'securitysuite_user_role_precedence' => true,
  'securitysuite_version' => '6.4.5',
  'session_dir' => '',
  'showDetailData' => true,
  'showThemePicker' => true,
  'site_url' => 'http://54.164.48.74/sugarcrm',
  'slow_query_time_msec' => '100',
  'stack_trace_errors' => false,
  'sugar_version' => '6.5.9',
  'sugarbeet' => 0,
  'time_formats' => 
  array (
    'H:i' => '23:00',
    'h:ia' => '11:00pm',
    'h:iA' => '11:00PM',
    'H.i' => '23.00',
    'h.ia' => '11.00pm',
    'h.iA' => '11.00PM',
    'h:i a' => '11:00 pm',
    'h:i A' => '11:00 PM',
    'h.i a' => '11.00 pm',
    'h.i A' => '11.00 PM',
  ),
  'timef' => 'H:i',
  'tmp_dir' => 'cache/xml/',
  'tracker_max_display_length' => 15,
  'translation_string_prefix' => false,
  'unique_key' => '9a2ea0a64af3fb3ab610fe9bb0530d2e',
  'upload_badext' => 
  array (
    0 => 'php',
    1 => 'php3',
    2 => 'php4',
    3 => 'php5',
    4 => 'pl',
    5 => 'cgi',
    6 => 'py',
    7 => 'asp',
    8 => 'cfm',
    9 => 'js',
    10 => 'vbs',
    11 => 'html',
    12 => 'htm',
  ),
  'upload_dir' => 'upload/',
  'upload_maxsize' => 30000000,
  'use_common_ml_dir' => false,
  'use_php_code_json' => true,
  'use_real_names' => true,
  'vcal_time' => '2',
  'verify_client_ip' => false,
);
