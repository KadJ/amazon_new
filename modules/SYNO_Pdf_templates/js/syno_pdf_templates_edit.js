
var insert_variable_html = function(text) {
	var inst = tinyMCE.getInstanceById("body_html");
	if (inst) {
		inst.getWin().focus();
		inst.execCommand('mceInsertRawHTML', false, '{$fields.' + text + '.value}');
	}
}

var syno_pdf_templates_load_field = function () {

	var successAddFieldsForTemplate = function(data) {
		dataResponse = data.responseText;

        var span_base_module_field = YAHOO.util.Dom.get('span_base_module_field');

		if (dataResponse.length > 0 && span_base_module_field != null) {
			span_base_module_field.innerHTML = dataResponse;
		} else {
			//alert('PAS DE Fields' + dataResponse);
		}		
	}

	var base_module = YAHOO.util.Dom.get('base_module');
	var hidden_previous_base_module = YAHOO.util.Dom.get('hidden_previous_base_module');
	var confirm_to_load_field = true;

	if (base_module.value.length > 0 && hidden_previous_base_module.value.length > 0 && base_module.value != hidden_previous_base_module.value) {
		if (confirm(SUGAR.language.get('SYNO_Pdf_templates', 'LBL_CONFIRM_SWITCH_BASE_MODULE'))) {
			confirm_to_load_field = true;
		} else {
			confirm_to_load_field = false;
			base_module.value = hidden_previous_base_module.value;
		}
	}

	if (base_module.value.length > 0 && confirm_to_load_field) {
		hidden_previous_base_module.value = base_module.value;
		url = 'index.php?module=SYNO_Pdf_templates&to_pdf=1&action=checkFieldsAvailableForTemplates&base_module=' + base_module.value;
		var cObj = YAHOO.util.Connect.asyncRequest('GET', url, {success: successAddFieldsForTemplate, failure: successAddFieldsForTemplate});

	}
}

YAHOO.util.Event.onDOMReady(syno_pdf_templates_load_field);
