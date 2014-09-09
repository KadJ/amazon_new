<?php /* Smarty version 2.6.11, created on 2014-09-09 10:39:17
         compiled from custom/include/SugarFields/Fields/Phone/ListView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_fetch', 'custom/include/SugarFields/Fields/Phone/ListView.tpl', 38, false),array('function', 'sugar_phone', 'custom/include/SugarFields/Fields/Phone/ListView.tpl', 41, false),)), $this); ?>
<?php ob_start();  echo smarty_function_sugar_fetch(array('object' => $this->_tpl_vars['parentFieldArray'],'key' => $this->_tpl_vars['col']), $this); $this->_smarty_vars['capture']['getPhone'] = ob_get_contents();  $this->assign('phone', ob_get_contents());ob_end_clean();  ob_start();  echo smarty_function_sugar_fetch(array('object' => $this->_tpl_vars['parentFieldArray'],'key' => 'ID'), $this); $this->_smarty_vars['capture']['getRecord'] = ob_get_contents();  $this->assign('record', ob_get_contents());ob_end_clean(); ?>

<?php echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone'],'record' => $this->_tpl_vars['record'],'usa_format' => $this->_tpl_vars['usa_format']), $this);?>