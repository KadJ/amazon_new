<input type="checkbox" class="checkbox" name="cost_approval" id="cost_approval" disabled="true" {if $ts.COST_APPROVAL}checked{/if}>
{if $ts.COST_TYPE == "free"}
	<span style="color:grey;">Утверждено автоматически в силу отсутствия стоимости</span>
{elseif $ts.COST == '' AND ($ts.COST_TYPE == "none" OR $ts.COST_TYPE == "fix" OR $ts.COST_TYPE == "time")}
	<span style="color:grey;">Стоимость работ пока еще не указана</span>
{elseif !$ts.COST_APPROVAL}
	<span style="color:green;"><A href="#" onclick="if(confirm('Вы действительно подтверждаете стоимость?')){ldelim}location.href='index.php?module=lm_TechnicalSupport&action=setCostApproval&record={$ts.ID}'{rdelim}else {ldelim}return false{rdelim}" onmouseout="return nd();" onmouseover="return overlib('Нажатием ссылки &quot;Утвердить&quot; Вы подтвердждаете согласие с предложенным размером оплаты!', FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass', WIDTH, -1, NOFOLLOW, 'ol_nofollow' );">Утвердить</A>
{/if}
