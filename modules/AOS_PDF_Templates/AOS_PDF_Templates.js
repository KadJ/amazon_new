	
	var selected = 0;

	function showVariable(fld){
		document.getElementById('variable_text').value=fld;
	}
	
	function setType(type){
		document.getElementById("type").value = type;
		populateModuleVariables(type);
	}

	function populateVariables(type){
		for(i=0;i<document.getElementById('variable_name').options.length;i++){
			document.getElementById('variable_name').remove(0);
		} 
		document.getElementById('variable_name').innerHTML = regularOptions[type];
		document.getElementById('variable_name').options.selectedIndex =0;
		document.getElementById('variable_text').value = '';
	}
	
	function populateModuleVariables(type){
		for(i=0;i<document.getElementById('module_name').options.length;i++){
			document.getElementById('module_name').remove(0);
		} 
		document.getElementById('module_name').innerHTML = moduleOptions[type];
		populateVariables(type);
	}

	function insert_variable(text) {
		if (text != ''){
			var inst = tinyMCE.getInstanceById("description");
		if (inst) inst.getWin().focus();
			inst.execCommand('mceInsertContent', false, text);
			inst.execCommand('mceToggleEditor');
			inst.execCommand('mceToggleEditor');
		}
	}

	function insertSample(smpl){
		if(smpl != 0){
			var body = tinyMCE.getInstanceById("description");
			var header = tinyMCE.getInstanceById("pdfheader");
			var footer = tinyMCE.getInstanceById("pdffooter");
			var cnf = true;
			if(body.getContent() != '' || header.getContent() != '' || footer.getContent() != ''){
				cnf=confirm('Warning this will overwrite you current Work');
			}
			if(cnf){
				smpl = eval(smpl);
				setType(smpl[0]);
				body.setContent(smpl[1]);
				header.setContent(smpl[2]);
				footer.setContent(smpl[3]);
				selected = document.getElementById('sample').options.selectedIndex;
			}
			else{
				document.getElementById('sample').options.selectedIndex =selected;
			}
		}
	}
