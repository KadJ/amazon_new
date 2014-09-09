{foreach from=$messages item="message"}
<B>{if $message.USER_ID}<A href="index.php?module=Employees&action=DetailView&record={$message.USER_ID}">{$message.USER_NAME}</A>{else}{$message.USER_NAME}{/if} {$message.DATE} в {$message.TIME}</B><BR>
{$message.COMMENT}<BR>
{/foreach}

<h3>{$MOD.LBL_SEND_REQUEST_TITLE}</h3>
<form action="index.php" method="post">
<input type="hidden" name="module" value="lm_TechnicalSupport">
<input type="hidden" name="action" value="sendRequest">
<input type="hidden" name="record" value="{$ID}">
<textarea rows="1" cols="120" name="requestContent" style="color: #aaaaaa" onclick="this.innerHTML='';this.rows='10';this.style.color='black';" onfocus="this.innerHTML='';this.rows='10';this.style.color='black';">{$MOD.MSG_REQUEST_CONTENT_DEFAULT}</textarea><BR>
<input type="submit" value="{$MOD.LBL_SEND_REQUEST_BUTTON_VALUE}">
</form>