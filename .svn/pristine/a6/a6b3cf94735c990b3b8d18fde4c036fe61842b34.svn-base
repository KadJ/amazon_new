<?php
$module_name = 'AOS_PDF_Templates';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '60',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'include/javascript/tiny_mce/tiny_mce.js',
        ),
        1 => 
        array (
          'file' => 'modules/AOS_PDF_Templates/AOS_PDF_Templates.js',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'type',
            'label' => 'LBL_TYPE',
            'displayParams' => 
            array (
              'field' => 
              array (
                'onchange' => 'populateModuleVariables(this.options[this.selectedIndex].value)',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'sample',
            'label' => 'LBL_SAMPLE',
            'customCode' => '{$CUSTOM_SAMPLE}',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'insert_fields',
            'label' => 'LBL_INSERT_FIELDS',
            'customCode' => '{$INSERT_FIELDS}',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'pdfheader',
            'label' => 'LBL_HEADER',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'pdffooter',
            'label' => 'LBL_FOOTER',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'margin_left',
            'label' => 'LBL_MARGIN_LEFT',
          ),
          1 => 
          array (
            'name' => 'margin_right',
            'label' => 'LBL_MARGIN_RIGHT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'margin_top',
            'label' => 'LBL_MARGIN_TOP',
          ),
          1 => 
          array (
            'name' => 'margin_bottom',
            'label' => 'LBL_MARGIN_BOTTOM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'margin_header',
            'label' => 'LBL_MARGIN_HEADER',
          ),
          1 => 
          array (
            'name' => 'margin_footer',
            'label' => 'LBL_MARGIN_FOOTER',
          ),
        ),
      ),
    ),
  ),
);
?>
