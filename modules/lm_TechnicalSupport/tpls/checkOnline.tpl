<div class="moduleTitle">
<h2><a href="index.php?module=lm_TechnicalSupport&amp;action=index"><img src="custom/themes/default/images/icon_lm_TechnicalSupport_32.gif" alt="lm_TechnicalSupport" title="lm_TechnicalSupport" align="absmiddle"></a><span class="pointer">»</span>{if $ts.ID}<a href="index.php?module=lm_TechnicalSupport&amp;action=DetailView&amp;record={$ts.ID}">{$ts.NAME}</a><span class="pointer">»</span>{/if}Проверка соединения с службой технической поддежки SugarCRM</h2>
</div>

<div id="lm_TechnicalSupport_detailview_tabs">
	<div>
		<div class="detail view">
			<table cellspacing="0">
			<tbody>
				<tr>
					<td width="12.5%" scope="row">Результаты проверки:</td>
					<td>
						{if $STATUS == 'online'}
							<span style="color: green;"><b>Соединение с службой технической поддержки установлено!</b></span><BR><BR>
							Система функционирует в стандартном режиме.
						{elseif $STATUS == 'proceeding_connection'}
							<B>Соединение с службой технической поддержки установлено УСЛОВНО.</B><BR>
							Что это значит:<BR>
							Судя по всему Ваша CRM-система установлена на сервере, не имеющем прямой доступ из сети Интернет.<BR>
							Обычно это бывает в случаях, когда из соображений безопасности CRM-систему устанавливают внутри компании.<BR>
							При таком типе подключения все Ваши запросы гарантированно доставляются в нашу службу поддержки.<BR>
							Наши ответы на Ваши запросы приходят к Вам автоматически, если корректно настроен <A href="index.php?module=Schedulers&action=index">Планировщик</A> Вашей CRM-системы.<BR>
							Доступ в <A href="index.php?module=Schedulers&action=index">Планировщик</A> имеют пользователи с правами администратора CRM-системы.<BR>
							Задача для Планировщика настраивается модулем тех.поддержки автоматически. Попросите администратора Вашей CRM-системы корректно настроить crontab.<BR>
							Как настраивается crontab указано в модуле <A href="index.php?module=Schedulers&action=index">Планировщик</A> Вашей CRM-системы.<BR><BR>
							Если настроить автоматический прием наших ответов у Вас не получается, Вы можете воспользоваться ручной доставкой наших сообщений.<BR><BR>
							По всем возникающим у Вас вопросам обратитесь за консультацией в нашу службу технической поддержки одним из удобных Вам способом:<BR><BR>
							<img alt="" src="/custom/themes/default/images/Phone-icon2.png" width="20" height="20" border="0"> +7 (495) 646-06-27<BR>
							<img alt="" src="/custom/themes/default/images/Phone-icon2.png" width="20" height="20" border="0"> 8 (800) 555-06-28 (звонок бесплатный)<BR>
							<img alt="" src="/custom/themes/default/images/Phone-icon2.png" width="20" height="20" border="0"> +7 (910) 908-21-23 (мобильный, МТС)<BR>
							<img alt="" src="/custom/themes/default/images/Skype.png" width="20" height="20" border="0"> evgenjekson (бесплатная переадресация на сотовый)<BR>
							<img alt="" src="/custom/themes/default/images/Icq.gif" width="20" height="20" border="0"> 195938768</BR>
							<img alt="" src="/custom/themes/default/images/Agent_log.png" width="20" height="20" border="0"> info@lemars.ru
							
							
							
						{elseif $STATUS == 'offline'}
							<span style="color: red;"><b>Соединение с службой технической поддержки ОТСУТСТВУЕТ!</b></span><BR>
							Это может произойти из-за того, что данная система установлена на компьютере, не имеющем доступ в Интернет.<BR>
							Проверьте настройки подключения к Интернету. Если имеете доступ к компьютеру, <BR>
							на котором установлена данная CRM-система, попробуйте зайти с него на сайт <A href="http://www.crmhosting.ru" target="_blank">http://www.crmhosting.ru</A>.<BR>
							Если проблему не получается самостоятельно решить, обратитесь за консультацией в нашу службу технической поддержки одним из удобных Вам способом:<BR><BR>
							<img alt="" src="/custom/themes/default/images/Phone-icon2.png" width="20" height="20" border="0"> +7 (495) 646-06-27<BR>
							<img alt="" src="/custom/themes/default/images/Phone-icon2.png" width="20" height="20" border="0"> 8 (800) 555-06-28 (звонок бесплатный)<BR>
							<img alt="" src="/custom/themes/default/images/Phone-icon2.png" width="20" height="20" border="0"> +7 (910) 908-21-23 (мобильный, МТС)<BR>
							<img alt="" src="/custom/themes/default/images/Skype.png" width="20" height="20" border="0"> evgenjekson (бесплатная переадресация на сотовый)<BR>
							<img alt="" src="/custom/themes/default/images/Icq.gif" width="20" height="20" border="0"> 195938768</BR>
							<img alt="" src="/custom/themes/default/images/Agent_log.png" width="20" height="20" border="0"> info@lemars.ru
						{/if}
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>