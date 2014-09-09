<input type="checkbox" class="checkbox" name="repayment_terms_approval" id="repayment_terms_approval" disabled="true" {if $ts.REPAYMENT}checked{/if}>
{if $ts.COST_TYPE == "free"}
	<span style="color:grey;">Утверждено автоматически в силу отсутствия стоимости</span>
{elseif $ts.COST_TYPE == 'none'}
	<span style="color:grey;">Тип оплаты пока еще не указан</span>
{elseif $ts.REPAYMENT_AUTOYES}
	<span style="color:grey;">Утверждено автоматически на основании ранее достигнутых соглашений</span>
{elseif !$ts.REPAYMENT}
	<span style="color:green;"><A href="#" onclick="if(confirm('Вы действительно согласны с условиями оплаты?')){ldelim}location.href='index.php?module=lm_TechnicalSupport&action=setRepaymentTerms&record={$ts.ID}'{rdelim}else {ldelim}return false{rdelim}" onmouseout="return nd();" onmouseover="return overlib('Нажатием ссылки &quot;Утвердить&quot; Вы подтвердждаете согласие с предлагаемыми условиями оплаты!', FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass', WIDTH, -1, NOFOLLOW, 'ol_nofollow' );">Утвердить</A>
{/if}
