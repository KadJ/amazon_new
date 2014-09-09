<p><form action="index.php" method="POST">
    <input type="hidden" name="module" value="Campaigns">
    <input type="hidden" name="action" value="QueueCampaignFax">
    <input type="hidden" name="record" value="{$campaing.ID}">
    <input type="hidden" name="to_pdf" value="true">
<table align='center' class='list view' width='100%' border='0' cellspacing='1' cellpadding='1'>
    <tr class='detail view'>
        <td colspan='4'><h4>Рассылка факсов</h4></td>
    </tr>
    <tr class='listViewHRS1'>
        <td width='50%' scope='col'><b>Используемый PDF-шаблон</b></td>
        <td width='5%' scope='col'><b>Начало нумерации исходящих</b></td>
        <td width='5%' scope='col'>&nbsp;</td>
    </tr>
    <tr class="evenListRowS1">
        <td scope="row"><select name="aos_pdf_templates_id_c">{$PDF_TEMPATE_OPTIONS}</select></td>
        <td scope="row"><input type="text" name="start_email_outbound_conter" value=""></td>
        <td scope="row">
            <input type="submit" value="Запустить Факс-рассылку">
        </td>
    </tr>
</table></form></p>
