
var addSynoPdfButton = function(){

	if(module_sugar_grp1 != null && action_sugar_grp1 != null && action_sugar_grp1 == 'DetailView') {
		var successAddSynoPdfButton = function(data) {
			dataResponse = data.responseText;

			if (dataResponse.length > 0) {

				var allForms = document.getElementsByTagName('form');

				for(i=0; i<allForms.length; i++) {
					if (allForms[i].getAttribute('name') == 'DetailView') {
						var trButtons = YAHOO.util.Dom.getAncestorByTagName(allForms[i], 'tr');
						var listTd = YAHOO.util.Dom.getElementsByClassName('buttons', '', trButtons);
						var latestTdButtons = listTd[listTd.length-1];
						if (listTd.length == 0) {
							var listTd = YAHOO.util.Dom.getChildren(trButtons);
							var latestTdButtons = listTd[listTd.length-2];
						}

						var latestTdButtons = listTd[listTd.length-1];
						
						var tdPDF = document.createElement('td');
						tdPDF.setAttribute('class', 'buttons');
						tdPDF.setAttribute('nowrap', 'nowrap');
						
						tdPDF.innerHTML = dataResponse;


						YAHOO.util.Dom.insertAfter(tdPDF, latestTdButtons);
						break;
					}
				}

			} else {
				//alert('PAS DE PDF' + dataResponse);
			}
			
		}

		url = 'index.php?module=SYNO_Pdf_templates&to_pdf=1&action=checkPdfAvailable&base_module=' + module_sugar_grp1 + '&base_id=' + window.document.forms['DetailView'].record.value;
		var cObj = YAHOO.util.Connect.asyncRequest('GET', url, {success: successAddSynoPdfButton, failure: successAddSynoPdfButton});
    }
};

var initialisationSynoJS = function(){
    addSynoPdfButton();
}
YAHOO.util.Event.onDOMReady(initialisationSynoJS);
