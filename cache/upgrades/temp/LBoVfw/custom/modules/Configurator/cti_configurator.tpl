<div class="moduleTitle"><h2>{$MOD.LBL_CTI_CONFIGURATION}</h2></div>
<div class="clear"></div>
<form id="CTIForm" name="CTIForm" method="POST" action="index.php">
    <input type="hidden" name="action" value="cti_configurator"/>
    <input type="hidden" name="module" value="Configurator"/>
    <input type="hidden" name="return_module" value="Administration">
    <input type="hidden" name="return_action" value="index">
    <input type="hidden" name="save" value="1">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td style="padding-bottom: 2px;" width="100%">
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button save" type="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">
        <input title="{$MOD.LBL_CANCEL_BUTTON_TITLE}" class="button cancel" type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> 
        <input title="{$MOD.LBL_TEST_BUTTON_TITLE}" class="button test" type="button" value="{$MOD.LBL_TEST_BUTTON_TITLE}"><span class="test_status"></span>
            </td>
        </tr>
        <tr>
            <td width="100%">
                <table id="cti_configuration" width="100%" border="0" cellspacing="0" cellpadding="0" class="tabForm">
                    <tr>
                        <td align="left" class="dataLabel" width="15%" nowrap="nowrap">{$MOD.LBL_CTI_CLIENT_ID}</td>
                        <td align="left" class="dataField" width="15%" nowrap="nowrap">
                            <input id="cti_client_id" name="cti_client_id" type="text" size="40" value="{$config.cti_client_id|default:$default.cti_client_id}">
                        </td>
                        <td align="left" class="dataLabel" style="font-size: smaller;">
                            <span id="cti_client_id_error" class="error" style="display:none;"></span>
                            {$MOD.LBL_CTI_CLIENT_ID_DESC}
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="dataLabel" width="15%" nowrap="nowrap">{$MOD.LBL_CTI_HOST}</td>
                        <td align="left" class="dataField" width="15%" nowrap="nowrap">
                            <input id="cti_host" name="cti_host" type="text" size="40" value="{$config.cti_host|default:$default.cti_host}">
                        </td>
                        <td align="left" class="dataLabel" style="font-size: smaller;">
                            <span id="cti_host_error" class="error" style="display:none;"></span>
                            {$MOD.LBL_CTI_HOST_DESC}
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="dataLabel" width="15%" nowrap="nowrap">{$MOD.LBL_CTI_PORT}</td>
                        <td align="left" class="dataField" width="15%" nowrap="nowrap">
                            <input id="cti_port" name="cti_port" type="text" size="40" value="{$config.cti_port|default:$default.cti_port}">
                        </td>
                        <td align="left" class="dataLabel" style="font-size: smaller;">
                            <span id="cti_port_error" class="error" style="display:none;"></span>
                            {$MOD.LBL_CTI_PORT_DESC}
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="dataLabel" width="15%" nowrap="nowrap">{$MOD.LBL_CTI_FORMAT}</td>
                        <td align="left" class="dataField" width="15%" nowrap="nowrap">
                            <input name="cti_format" value="{$config.cti_format}"/>
                        </td>
                        <td align="left" class="dataLabel" style="font-size: smaller;">
                            <span id="cti_format_error" class="error" style="display:none;"></span>
                            {$MOD.LBL_CTI_FORMAT_DESC}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div style="padding-top: 2px;">
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button save" type="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">
        <input title="{$MOD.LBL_CANCEL_BUTTON_TITLE}" class="button cancel" type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> 
    </div>
</form>
<!-- {$JAVASCRIPT} -->
<script type="text/javascript" src="custom/modules/Configurator/js/cti_configurator.js"></script>