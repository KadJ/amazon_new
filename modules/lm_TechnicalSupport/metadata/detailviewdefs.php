<?php
$module_name = 'lm_TechnicalSupport';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 
          array (
            'customCode' => '{if $fields.status.value != "closed"}<input type="button" value="{$MOD.LBL_SET_STATUS_CLOSED_BUTTON_VALUE}" onclick="this.form.action.value=\'closeRequest\';this.form.submit();">{/if}',
          ),
          1 => 
          array (
            'customCode' => '&nbsp;<input type="button" value="{$MOD.LBL_CHECK_MESSAGES_VALUE}" onclick="location.href=\'ts_check.php?return_module=lm_TechnicalSupport&return_action=DetailView&return_id={$fields.id.value}\';">',
          ),
          2 => 
          array (
            'customCode' => '<input type="button" value="{$MOD.LBL_CHECK_ONLINE_STATUS_VALUE}" onclick="this.form.action.value=\'checkOnline\';this.form.submit();">',
          ),
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'include/javascript/sugar_grp_overlib.js',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'cost_type',
            'studio' => 'visible',
            'label' => 'LBL_COST_TYPE',
            'customCode' => '{$COST_TYPE}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'priority',
            'studio' => 'visible',
            'label' => 'LBL_PRIORITY',
          ),
          1 => 
          array (
            'name' => 'repayment_terms_approval',
            'label' => 'LBL_REPAYMENT_TERMS_APPROVAL',
            'customCode' => '{$REPAYMENT_TERMS_APPROVAL}',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'fix_cost',
            'label' => 'LBL_FIX_COST',
            'customCode' => '{if $fields.cost_type.value == "free"}<span style="color:grey;">не предусмотрена</span>{else}{sugar_number_format var=$fields.fix_cost.value}{/if}',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'status_work',
            'studio' => 'visible',
            'label' => 'LBL_STATUS_WORK',
            'customCode' => '{$STATUS_WORK}',
          ),
          1 => 
          array (
            'name' => 'cost_approval',
            'label' => 'LBL_COST_APPROVAL',
            'customCode' => '{$COST_APPROVAL}',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'payment',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_finish_plan',
            'comment' => '',
            'label' => 'LBL_DATE_FINISH_PLAN',
          ),
          1 => 
          array (
            'name' => 'date_finish_fact',
            'comment' => '',
            'label' => 'LBL_DATE_FINISH_FACT',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'work_log',
            'studio' => 'visible',
            'label' => 'LBL_WORK_LOG',
            'customCode' => '{$WORK_LOG}',
          ),
        ),
      ),
    ),
  ),
);
?>
