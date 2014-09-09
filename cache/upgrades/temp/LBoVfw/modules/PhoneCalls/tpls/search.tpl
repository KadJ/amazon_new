{literal}
    <style>
        a.phonecall {
            color: #7a7a7a;
        }
        a.phonecall_highlite {
            color: #ff4444;
        }
        fieldset {
            border: none;
            padding:1px;
        }
        legend {
            color: #444444;
            cursor: pointer;
            font-weight: bold;		
        }
        div.search_result {
            //		max-height: 200px;
            overflow: auto;
        }
    </style>
{/literal}
<h3 style="margin: 0px 0px 10px 10px; padding: 0;">{$MOD.LBL_SEARCHPHONE_TITLE}: {$PHONE}</h3>
<fieldset>
    <form method="get">
        <input type="hidden" name="module" value="PhoneCalls" />
        <input type="hidden" name="action" value="Search" />
        <input type="hidden" name="record" value="{$PHONECALL->id|default:$smarty.request.record}" />
        <input type="hidden" name="return_module" value="{$smarty.request.return_module}" />
        <input type="hidden" name="return_action" value="{$smarty.request.return_action}" />
        <input type="hidden" name="return_id" value="{$smarty.request.return_id}" />
        <input type="hidden" name="phone" value="{$PHONE}" />
        <table id="new_search" cellpadding="0" cellspacing="0" width="100%" border="0" style="border:none;">
            <tr height="20">
                <td class="tabDetailViewDF" width="1%" nowrap="nowrap" style="text-align:left">
                    <input type="text" name="search" size="40" value="{$SEARCH}" />
                </td>
                <td class="tabDetailViewDF" width="1%" nowrap="nowrap" style="text-align:left">
                    <input type="submit" class="button" value="{$MOD.LBL_SEARCHPHONE_START_SEARCH_BUTTON_LABEL}" title="{$MOD.LBL_SEARCHPHONE_START_SEARCH_BUTTON_TITLE}" />
                </td>
                <td class="tabDetailViewDF" width="97%" nowrap="nowrap" style="text-align:left">&nbsp;</td>
                {if !empty($PHONECALL->id) && $PHONECALL->online == 0 && $PHONECALL->ACLAccess('view')}
                    <td class="tabDetailViewDF" width="1%" nowrap="nowrap" style="text-align:left">
                        <a href="index.php?module={$PHONECALL->module_dir|escape}&action=DetailView&record={$PHONECALL->id|escape}" title="{$MOD.LNK_SEARCHPHONE_VIEW_TITLE|escape}">{$MOD.LNK_SEARCHPHONE_VIEW_LABEL|escape}</a>
                    </td>
                    {if !empty($PHONECALL->file_url)}
                        <td class="tabDetailViewDF" width="1%" nowrap="nowrap" style="text-align:left">
                            {$PHONECALL->file_link}
                        </td>
                    {/if}
                {/if}
            </tr>
        </table>
    </form>
    {foreach from=$BEANS item=BEAN_DATA key=BEAN_MODULE}
        {if $BEAN_DATA.list|@count > 0}
            {math assign="cell_width" equation="floor( (100 - 1)/x )" x=$BEAN_DATA.fields|@count}
            <table width="100%" cellspacing="2" cellpadding="0" border="0" class="h3Row">
                <tr>
                    <td nowrap="nowrap"><b>{sugar_translate label="LBL_MODULE_NAME" module=$BEAN_MODULE}</b></td>
                    <td width="100%"><img width="1" height="1" alt="" src="include/images/blank.gif"></td>
                </tr>
            </table>
            <div class="search_result">
                <table cellpadding="0" cellspacing="0" width="100%" border="0" class="listview">
                    <tr height="20">
                        <td class="listViewThS1" nowrap="nowrap" width="1%"></td>
                        {foreach from=$BEAN_DATA.fields item=FILED}
                            <td class="listViewThS1" nowrap="nowrap" width="{$cell_width}%">{sugar_translate label=$FILED.vname module=$BEAN_MODULE}</td>
                        {/foreach}
                    </tr>
                    {counter start=$pageData.offsets.current print=false assign="offset" name="offset"}
                    {foreach from=$BEAN_DATA.list item=BEAN_ITEM name="BEAN_LIST"}
                        {counter name="offset" print=false}
                        {if $smarty.foreach.BEAN_LIST.iteration is odd}
                            {assign var='_bgColor' value=$bgColor[0]}
                            {assign var='_rowColor' value=$rowColor[0]}
                        {else}
                            {assign var='_bgColor' value=$bgColor[1]}
                            {assign var='_rowColor' value=$rowColor[1]}
                        {/if}
                        <tr height="20" onmouseover="setPointer(this, '{$BEAN_ITEM.ID}', 'over', '{$_bgColor}', '{$bgHilite}', '');" onmouseout="setPointer(this, '{$BEAN_ITEM.ID}', 'out', '{$_bgColor}', '{$bgHilite}', '');" onmousedown="setPointer(this, '{$BEAN_ITEM.ID}', 'click', '{$_bgColor}', '{$bgHilite}', '');">
                            <td width='1%' class='{$_rowColor}S1' bgcolor='{$_bgColor}' nowrap="nowrap">{$BEAN_ITEM.NEW_CALL_LINK}</td>
                            {foreach from=$BEAN_DATA.fields item=FILED key=FIELD_KEY}
                                <td width='1%' class='{$_rowColor}S1' bgcolor='{$_bgColor}' nowrap="nowrap">{$BEAN_ITEM[$FIELD_KEY]}&nbsp;</td>
                            {/foreach}
                        </tr>
                    {/foreach}
                </table>
            </div>
        {/if}
    {/foreach}
</fieldset>
<br />
<br />
<fieldset>
    <legend rel="search_result">{$MOD.LBL_SEARCHPHONE_ADDITIONAL_ACTIONS}</legend>
    <table cellpadding="0" cellspacing="0" width="100%" border="0" class="tabDetailView">
        <tr>
            <td class="tabDetailViewDF" colspan="3">
                {foreach from=$BEANS item=BEAN_ITEM key=BEAN_MODULE}
                    {if $BEAN_ITEM.urls.create.access}
                        <a target="abount:blank" rel="Create-New-Bean" module="{$BEAN_MODULE}" href="{$BEAN_ITEM.urls.create.link}">
                            {sugar_translate label=$BEAN_ITEM.urls.create.label module=$BEAN_MODULE}
                        </a><br />
                    {/if}	
                {/foreach}
            </td>
        </tr>
    </table>
</fieldset>
<script type="text/javascript">
    var PHONE = "{$PHONE}";
    var PHONECALL_ALLOW_EDIT = {if !empty($PHONECALL->id) && $PHONECALL->ACLAccess('edit')}true{else}false{/if};
</script>
<script type="text/javascript" src="modules/PhoneCalls/js/search.js"></script>