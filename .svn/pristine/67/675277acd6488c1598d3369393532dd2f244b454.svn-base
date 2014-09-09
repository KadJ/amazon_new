{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

*}
{include file="_head.tpl" theme_template=true}
<body onMouseOut="closeMenus();">
<a name="top"></a>
{$SUGAR_DCJS}
<div id="header">
    {include file="_companyLogo.tpl" theme_template=true}
    {include file="_globalLinks.tpl" theme_template=true}
    {include file="_welcome.tpl" theme_template=true}
    <div class="clear"></div>
    {include file="_headerSearch.tpl" theme_template=true}
    <div class="clear"></div>
    {if !$AUTHENTICATED}
    <br /><br />
    {/if}
    <div id="ajaxHeader">
        {include file="_headerModuleList.tpl" theme_template=true}
    </div>
    <div class="clear"></div>
    <div class="line"></div>
</div>
<div id="leftSection">
	<div id="subModuleList">
		{assign var="groupSelected" value=false}
		{foreach from=$groupTabs item=modules key=group name=moduleList}
		{capture name=extraparams assign=extraparams}parentTab={$group}{/capture}
		<span id="moduleLink_{$smarty.foreach.moduleList.index}" {if ( ( $smarty.request.parentTab == $group || (!$smarty.request.parentTab && in_array($MODULE_TAB,$modules.modules)) ) && !$groupSelected ) || ($smarty.foreach.moduleList.index == 0 && $defaultFirst)}class="selected" {assign var="groupSelected" value=true}{/if}>
			<ul id='subModuleList_list'>
				<li class="submenuListTitle">Submenu List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="./themes/KOSS_Green/images/arrow_down.gif" /></li>
				<li style='height:10px; background:#ffffff; border-top:0px; '></li>
				{foreach from=$modules.modules item=module key=modulekey}
				<li>
					{capture name=moduleTabId assign=moduleTabId}moduleTab_{$smarty.foreach.moduleList.index}_{$module}{/capture}
					{sugar_link id=$moduleTabId module=$modulekey data=$module extraparams=$extraparams}
				</li>
				{/foreach}
				{if !empty($modules.extra)}
				<li class="subTabMore">
					<a>>></a>      
					<ul class="cssmenu">
					{foreach from=$modules.extra item=submodulename key=submodule}
						<li> 
							<a href="{sugar_link module=$submodule link_only=1 extraparams=$extraparams}">{$submodulename}
							</a>
						</li>
					{/foreach}
					</ul> 
				</li>
				{/if}	        
			</ul>
		</span>  
		{/foreach}    
	</div>
</div>
{literal}
<iframe id='ajaxUI-history-iframe' src='index.php?entryPoint=getImage&imageName=blank.png'  title='empty' style='display:none'></iframe>
<input id='ajaxUI-history-field' type='hidden'>
<script type='text/javascript'>
if (SUGAR.ajaxUI && !SUGAR.ajaxUI.hist_loaded)
{
    YAHOO.util.History.register('ajaxUILoc', "", SUGAR.ajaxUI.go);
    {/literal}{if $smarty.request.module != "ModuleBuilder"}{* Module builder will init YUI history on its own *}
    YAHOO.util.History.initialize("ajaxUI-history-field", "ajaxUI-history-iframe");
    {/if}{literal}
}
</script>
{/literal}

<div id="main">
    <div id="content" {if !$AUTHENTICATED}class="noLeftColumn" {/if}>
        <table style="width:100%"><tr><td>
