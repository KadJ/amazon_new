<?php 
 $GLOBALS["dictionary"]["PhoneCall"]=array (
  'table' => 'phonecalls',
  'audited' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'phonecalls_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'phonecalls_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'phonecalls_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'direction' => 
    array (
      'name' => 'direction',
      'vname' => 'LBL_DIRECTION',
      'type' => 'enum',
      'options' => 'phonecalls_direction_list',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'phone_master' => 
    array (
      'name' => 'phone_master',
      'vname' => 'LBL_PHONE_MASTER',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => '32',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'phone_slave' => 
    array (
      'name' => 'phone_slave',
      'vname' => 'LBL_PHONE_SLAVE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => '32',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'phone' => 
    array (
      'name' => 'phone',
      'vname' => 'LBL_PHONE',
      'type' => 'phone',
      'source' => 'non-db',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_STATUS',
      'type' => 'enum',
      'options' => 'phonecalls_status_list',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'online' => 
    array (
      'name' => 'online',
      'vname' => 'LBL_ONLINE',
      'type' => 'bool',
      'default' => false,
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'parent_type' => 
    array (
      'name' => 'parent_type',
      'vname' => 'LBL_PARENT_TYPE',
      'type' => 'parent_type',
      'dbType' => 'varchar',
      'len' => 25,
      'group' => 'parent_name',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT_ID',
      'type' => 'id',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'parent_name' => 
    array (
      'name' => 'parent_name',
      'vname' => 'LBL_RELATED_TO',
      'type' => 'parent',
      'type_name' => 'parent_type',
      'id_name' => 'parent_id',
      'source' => 'non-db',
      'options' => 'moduleList',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'talk_start' => 
    array (
      'name' => 'talk_start',
      'vname' => 'LBL_TALK_START',
      'type' => 'datetime',
      'comment' => 'Time of call begins',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
    ),
    'talk_duration' => 
    array (
      'name' => 'talk_duration',
      'vname' => 'LBL_TALK_DURATION',
      'type' => 'varchar',
      'len' => 11,
      'default' => 0,
      'comment' => 'Duration of talk',
      'required' => true,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
    ),
    'online_duration' => 
    array (
      'name' => 'online_duration',
      'vname' => 'LBL_ONLINE_DURATION',
      'type' => 'int',
      'len' => 11,
      'default' => 0,
      'comment' => 'Duration of line connection',
      'required' => true,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
    ),
    'file_url' => 
    array (
      'name' => 'file_url',
      'vname' => 'LBL_FILE_URL',
      'type' => 'varchar',
      'len' => 255,
      'comment' => 'URL of call audio record',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
    ),
    'file_link' => 
    array (
      'name' => 'file_link',
      'vname' => 'LBL_FILE_LINK',
      'type' => 'varchar',
      'source' => 'non-db',
      'comment' => 'Link to call audio record',
      'required' => false,
      'audited' => false,
      'importable' => 'false',
      'massupdate' => false,
    ),
  ),
  'relationships' => 
  array (
    'phonecalls_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'PhoneCalls',
      'rhs_table' => 'phonecalls',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'phonecalls_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'PhoneCalls',
      'rhs_table' => 'phonecalls',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'phonecalls_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'PhoneCalls',
      'rhs_table' => 'phonecalls',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'phonecallspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_date_entered',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'date_entered',
        1 => 'online',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_direction',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'direction',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_phone_master',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'phone_master',
      ),
    ),
    3 => 
    array (
      'name' => 'idx_phone_slave',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'phone_slave',
      ),
    ),
    4 => 
    array (
      'name' => 'idx_parent',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'parent_type',
        1 => 'parent_id',
      ),
    ),
    5 => 
    array (
      'name' => 'idx_online',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'online',
      ),
    ),
    6 => 
    array (
      'name' => 'idx_status',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'status',
      ),
    ),
  ),
  'optimistic_lock' => true,
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);