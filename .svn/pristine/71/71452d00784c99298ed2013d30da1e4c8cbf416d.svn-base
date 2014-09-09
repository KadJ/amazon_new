/**
 * Advanced, robust set of sales and support modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Greg Soper <greg.soper@salesagility.com>
 */

 var lineno;
 var prodln = 0;
 var servln = 0;
 var groupn = 0;
 var group_ids = {};
 
 
 /**
 * Load Line Items
 */
 
function insertLineItems(product,group){

	var type = 'product_';
	var ln = 0;
	var current_group = 'lineItems';
	var gid = product.group_id;
	
	if(group_ids[gid] == null){
		current_group = insertGroup();
		group_ids[gid] = current_group;
		for(var g in group){
			if(document.getElementById('group'+current_group + g) != null){
				document.getElementById('group'+current_group + g).value = group[g];
			}
		}
	} else {
		current_group = group_ids[gid];
	}
	
	if(product.product_id != '0' && product.product_id != ''){
		ln = insertProductLine('product_group'+current_group,current_group);
		type = 'product_';
	} else {
		ln = insertServiceLine('service_group'+current_group,current_group);
		type = 'service_';
	}
	
	for(var p in product){
		if(document.getElementById(type + p + ln) != null){
            if(product[p] != '' && isNumeric(product[p]) && p != 'vat'  && p != 'product_id'){
                document.getElementById(type + p + ln).value = format2Number(product[p]);
            } else {
                document.getElementById(type + p + ln).value = product[p];
            }
		}
	}

	calculateLine(ln,type);

}


/**
 * Insert product line
 */
 
function insertProductLine(tableid, groupid) {

    if (document.getElementById(tableid + '_head') != null) {
        document.getElementById(tableid + '_head').style.display = "";
    }

    var vat_hidden = document.getElementById("vathidden").value;
    var discount_hidden = document.getElementById("discounthidden").value;

    sqs_objects["product_name[" + prodln + "]"] = {
        "form": "EditView",
        "method": "query",
        "modules": ["AOS_Products"],
        "group": "or",
        "field_list": ["name", "id", "cost", "price"],
        "populate_list": ["product_name[" + prodln + "]", "product_product_id[" + prodln + "]", "product_product_cost_price[" + prodln + "]", "product_product_list_price[" + prodln + "]"],
        "required_list": ["product_id[" + prodln + "]"],
        "conditions": [{
            "name": "name",
            "op": "like_custom",
            "end": "%",
            "value": ""
        }],
        "order": "name",
        "limit": "30",
        "post_onblur_function": "formatListPrice(" + prodln + ");",
        "no_match_text": "No Match"
    };

    tablebody = document.createElement("tbody");
    tablebody.id = "product_body" + prodln;
    document.getElementById(tableid).appendChild(tablebody);


    var x = tablebody.insertRow(-1);
    x.id = 'product_line' + prodln;

    var a = x.insertCell(0);
    a.innerHTML = "<input type='text' style='width:73px;' name='product_product_qty[" + prodln + "]' id='product_product_qty" + prodln + "' size='5' value='' title='' tabindex='116' onblur='Quantity_format2Number(" + prodln + ");calculateLine(" + prodln + ",\"product_\");'>";

    var b = x.insertCell(1);
    b.innerHTML = "<input style='width:178px;' class='sqsEnabled sqsNoAutofill' autocomplete='off' type='text' name='product_name[" + prodln + "]' id='product_name" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''><input type='hidden' name='product_product_id[" + prodln + "]' id='product_product_id" + prodln + "' size='20' maxlength='50' value=''>";

    var ba = x.insertCell(2);
    ba.innerHTML = "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>";

    var c = x.insertCell(3);
    c.innerHTML = "<input style='width:114px;' type='text' name='product_product_list_price[" + prodln + "]' id='product_product_list_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' onfocus='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_cost_price[" + prodln + "]' id='product_product_cost_price" + prodln + "' value=''  />";

    if (typeof currencyFields !== 'undefined'){

        currencyFields.push("product_product_list_price" + prodln);
        currencyFields.push("product_product_cost_price" + prodln);

    }

    var d = x.insertCell(4);
    d.innerHTML = "<input type='text' style='width:123px;' name='product_product_discount[" + prodln + "]' id='product_product_discount" + prodln + "' size='12' maxlength='50' value='' title='' tabindex='116' onfocus='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_discount_amount[" + prodln + "]' id='product_product_discount_amount" + prodln + "' value=''  />";

    var e = x.insertCell(5);
    e.innerHTML = "<input type='text' style='width:115px;' name='product_product_unit_price[" + prodln + "]' id='product_product_unit_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly' onfocus='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_unit_price" + prodln);
    }
    var f = x.insertCell(6);
    f.innerHTML = "<input type='text' style='width:115px;' name='product_vat_amt[" + prodln + "]' id='product_vat_amt" + prodln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_vat_amt" + prodln);
    }
    var g = x.insertCell(7);
    g.innerHTML = "<input type='text' style='width:120px;' name='product_product_total_price[" + prodln + "]' id='product_product_total_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='product_group_number[" + prodln + "]' id='product_group_number" + prodln + "' value='"+groupid+"'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_total_price" + prodln);
    }
    var h = x.insertCell(8);
    h.innerHTML = "<input type='hidden' name='product_deleted[" + prodln + "]' id='product_deleted" + prodln + "' value='0'><input type='hidden' name='product_id[" + prodln + "]' id='product_id" + prodln + "' value=''><button type='button' id='product_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"product_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button><br>";


    enableQS(true);
    //QSFieldsArray["EditView_product_name"+prodln].forceSelection = true;

    var y = tablebody.insertRow(-1);
    y.id = 'product_note_line' + prodln;

    var i = y.insertCell(0);
    i.align = "right";
    i.style.color = "rgb(68,68,68)";
    i.innerHTML = "&nbsp;&nbsp;&nbsp;" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp";

    var j = y.insertCell(1);
    j.colSpan = "3";
    j.innerHTML = "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";

    var k = y.insertCell(2);
    k.style.color = "rgb(68,68,68)";
    k.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_TYPE') + "&nbsp;:&nbsp;<select tabindex='116' name='product_discount[" + prodln + "]' id='product_discount" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + discount_hidden + "</select>";

    var l = y.insertCell(3);

    var m = y.insertCell(4);
    m.style.color = "rgb(68,68,68)";
    m.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_VAT') + " %&nbsp; :&nbsp;&nbsp;<select tabindex='116' name='product_vat[" + prodln + "]' id='product_vat" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + vat_hidden + "</select>";

    var n = y.insertCell(5);

    var o = y.insertCell(6);

    prodln++;

    return prodln - 1;
}


/**
 * Open product popup
 */
function openProductPopup(ln){
	
	lineno=ln;
	var popupRequestData = {
		"call_back_function" : "setProductReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "product_product_id" + ln,
			"name" : "product_name" + ln,
			"cost" : "product_product_cost_price" + ln,
			"price" : "product_product_list_price" + ln
		}
	};

	open_popup('AOS_Products', 800, 850, '', true, true, popupRequestData);

}

function setProductReturn(popupReplyData){
	set_return(popupReplyData);
	formatListPrice(lineno);
}

function formatListPrice(ln){

    if (typeof currencyFields !== 'undefined'){
        document.getElementById('product_product_list_price' + ln).value = format2Number(ConvertFromDollar(document.getElementById('product_product_list_price' + ln).value, lastRate));
    }
    else
    {
        document.getElementById('product_product_list_price' + ln).value = format2Number(document.getElementById('product_product_list_price' + ln).value);
    }

    document.getElementById('product_product_cost_price' + ln).value = format2Number(document.getElementById('product_product_cost_price' + ln).value);
    calculateLine(ln,"product_");
}


/**
 * Insert Service Line
 */

function insertServiceLine(tableid, groupid) {

    if (document.getElementById(tableid + '_head') != null) {
        document.getElementById(tableid + '_head').style.display = "";
    }

    var vat_hidden = document.getElementById("vathidden").value;

    tablebody = document.createElement("tbody");
    tablebody.id = "service_body" + servln;
    document.getElementById(tableid).appendChild(tablebody);

    var x = tablebody.insertRow(-1);
    x.id = 'service_line' + servln;

    var a = x.insertCell(0);
    a.colSpan = "4";
    a.innerHTML = "<textarea name='service_name[" + servln + "]' id='service_name" + servln + "' size='16' cols='60' title='' tabindex='116'></textarea><input type='hidden' name='service_product_id[" + servln + "]' id='service_product_id" + servln + "' size='20' maxlength='50' value='0'>";

    var b = x.insertCell(1);
    b.innerHTML = "<input type='text' style='width:115px;' name='service_product_unit_price[" + servln + "]' id='service_product_unit_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_unit_price" + servln);
    }
    var c = x.insertCell(2);
    c.innerHTML = "<input type='text' style='width:115px;' name='service_vat_amt[" + servln + "]' id='service_vat_amt" + servln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'><br>" + SUGAR.language.get(module_sugar_grp1, 'LBL_VAT') + " %&nbsp; :&nbsp;&nbsp;<select tabindex='116' name='service_vat[" + servln + "]' id='service_vat" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");'>" + vat_hidden + "</select>";
    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_vat_amt" + servln);
    }
    var d = x.insertCell(3);
    d.innerHTML = "<input type='text' style='width:115px;' name='service_product_total_price[" + servln + "]' id='service_product_total_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='service_group_number[" + servln + "]' id='service_group_number" + servln + "' value='"+ groupid +"'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_total_price" + servln);
    }
    var e = x.insertCell(4);
    e.innerHTML = "<input type='hidden' name='service_deleted[" + servln + "]' id='service_deleted" + servln + "' value='0'><input type='hidden' name='service_id[" + servln + "]' id='service_id" + servln + "' value=''><button type='button' class='button' id='service_delete_line" + servln + "' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + servln + ",\"service_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button><br>";

    servln++;

    return servln - 1;
}


/**
 * Insert product Header
 */
 
function insertProductHeader(tableid){
	tablehead = document.createElement("thead");
	tablehead.id = tableid +"_head";
	tablehead.style.display="none";
	document.getElementById(tableid).appendChild(tablehead);
	
	var x=tablehead.insertRow(-1);
	x.id='product_head';
	
	var a=x.insertCell(0);
	a.style.color="rgb(68,68,68)";
	a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QUANITY');
	
	var b=x.insertCell(1);
	b.style.color="rgb(68,68,68)";
	b.colSpan="2";
	b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME');
	
	var c=x.insertCell(2);
	c.style.color="rgb(68,68,68)";
	c.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_LIST_PRICE');
	
	var d=x.insertCell(3);
	d.style.color="rgb(68,68,68)";
	d.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT');
	
	var e=x.insertCell(4);
	e.style.color="rgb(68,68,68)";
	e.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE');
	
	var f=x.insertCell(5);
	f.style.color="rgb(68,68,68)";
	f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');
	
	var g=x.insertCell(6);
	g.style.color="rgb(68,68,68)";
	g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');
	
	var h=x.insertCell(7);
	h.style.color="rgb(68,68,68)";
	h.innerHTML='&nbsp;';
}


/**
 * Insert service Header
 */
 
function insertServiceHeader(tableid){
	tablehead = document.createElement("thead");
	tablehead.id = tableid +"_head";
	tablehead.style.display="none";
	document.getElementById(tableid).appendChild(tablehead);
	
	var x=tablehead.insertRow(-1);
	x.id='service_head';
	
	var a=x.insertCell(0);
	a.colSpan = "4";
	a.style.color="rgb(68,68,68)";
	a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_NAME');
	
	var b=x.insertCell(1);
	b.style.color="rgb(68,68,68)";
	b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_PRICE');
	
	var c=x.insertCell(2);
	c.style.color="rgb(68,68,68)";
	c.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');
	
	var d=x.insertCell(3);
	d.style.color="rgb(68,68,68)";
	d.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');
	
	var e=x.insertCell(4);
	e.style.color="rgb(68,68,68)";
	e.innerHTML='&nbsp;';
}

/**
 * Insert Group
 */

function insertGroup()
{
	var tableBody = document.createElement("tr");
	tableBody.id = "group_body"+groupn;
	document.getElementById('lineItems').appendChild(tableBody);
	
	var a=tableBody.insertCell(0);
	a.colSpan="100";
    var table = document.createElement("table");
	table.id = "group"+groupn;
	table.style.border = '1px grey solid';
	table.style.borderRadius = '4px';
	table.style.whiteSpace = 'nowrap';
	table.border="1";
	table.width = '950';
	a.appendChild(table);
	

	
	tableheader = document.createElement("thead");
	table.appendChild(tableheader);
	var header_row=tableheader.insertRow(-1);
	var header_cell = header_row.insertCell(0);
	header_cell.scope="row";
	header_cell.colSpan="8";
	header_cell.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_GROUP_NAME')+":&nbsp;&nbsp;<input name='group_name[]' id='"+ table.id +"name' size='30' maxlength='255'  title='' tabindex='120' type='text'><input type='hidden' name='group_id[]' id='"+ table.id +"id' value=''><input type='hidden' name='group_group_number[]' id='"+ table.id +"group_number' value='"+groupn+"'>";
	
	var header_cell_del = header_row.insertCell(1);
	header_cell_del.scope="row";
	header_cell_del.innerHTML="<span title='" + SUGAR.language.get(module_sugar_grp1, 'LBL_DELETE_GROUP') + "' style='float: right;'><a style='cursor: pointer;' id='deleteGroup' tabindex='116' onclick='markGroupDeleted("+groupn+")'><img src='themes/default/images/id-ff-clear.png' alt='X'></a></span><input type='hidden' name='group_deleted[]' id='"+ table.id +"deleted' value='0'>";
	
	
	
	
	var productTableHeader = document.createElement("thead");
	table.appendChild(productTableHeader);
	var productHeader_row=productTableHeader.insertRow(-1);
	var productHeader_cell = productHeader_row.insertCell(0);
	productHeader_cell.colSpan="100";
	var productTable = document.createElement("table");
	productTable.id = "product_group"+groupn;
	productHeader_cell.appendChild(productTable);

	insertProductHeader(productTable.id);
	
	var serviceTableHeader = document.createElement("thead");
	table.appendChild(serviceTableHeader);
	var serviceHeader_row=serviceTableHeader.insertRow(-1);
	var serviceHeader_cell = serviceHeader_row.insertCell(0);
	serviceHeader_cell.colSpan="100";
	var serviceTable = document.createElement("table");
	serviceTable.id = "service_group"+groupn;
	serviceHeader_cell.appendChild(serviceTable);

	insertServiceHeader(serviceTable.id);
	

	/*tablebody = document.createElement("tbody");
	table.appendChild(tablebody);
	var body_row=tablebody.insertRow(-1);
	var body_cell = body_row.insertCell(0);
	body_cell.innerHTML+="&nbsp;";*/
	
	tablefooter = document.createElement("tfoot");
	table.appendChild(tablefooter);
	var footer_row=tablefooter.insertRow(-1);
	var footer_cell = footer_row.insertCell(0);
	footer_cell.scope="row";
	footer_cell.colSpan="20";
	footer_cell.innerHTML="<input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_PRODUCT_LINE')+"' id='"+productTable.id+"addProductLine' onclick='insertProductLine(\""+productTable.id+"\",\""+groupn+"\")' />";
	footer_cell.innerHTML+=" <input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_SERVICE_LINE')+"' id='"+serviceTable.id+"addServiceLine' onclick='insertServiceLine(\""+serviceTable.id+"\",\""+groupn+"\")' />";

		footer_cell.innerHTML+="<span style='float: right;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_AMT')+":&nbsp;&nbsp;<input name='group_total_amt[]' id='"+ table.id +"total_amt' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></span>";

		var footer_row2=tablefooter.insertRow(-1);
		var footer_cell2 = footer_row2.insertCell(0);
		footer_cell2.scope="row";
		footer_cell2.colSpan="20";
		footer_cell2.innerHTML="<span style='float: right;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMOUNT')+":&nbsp;&nbsp;<input name='group_discount_amount[]' id='"+ table.id +"discount_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></span>"

		var footer_row3=tablefooter.insertRow(-1);
		var footer_cell3 = footer_row3.insertCell(0);
		footer_cell3.scope="row";
		footer_cell3.colSpan="20";
		footer_cell3.innerHTML="<span style='float: right;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SUBTOTAL_AMOUNT')+":&nbsp;&nbsp;<input name='group_subtotal_amount[]' id='"+ table.id +"subtotal_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></span>"

		var footer_row4=tablefooter.insertRow(-1);
		var footer_cell4 = footer_row4.insertCell(0);
		footer_cell4.scope="row";
		footer_cell4.colSpan="20";
		footer_cell4.innerHTML="<span style='float: right;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TAX_AMOUNT')+":&nbsp;&nbsp;<input name='group_tax_amount[]' id='"+ table.id +"tax_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></span>"

	if(document.getElementById('subtotal_tax_amount') != null){
		var footer_row5=tablefooter.insertRow(-1);
		var footer_cell5 = footer_row5.insertCell(0);
		footer_cell5.scope="row";
		footer_cell5.colSpan="20";
        footer_cell5.innerHTML="<span style='float: right;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SUBTOTAL_TAX_AMOUNT')+":&nbsp;&nbsp;<input name='group_subtotal_tax_amount[]' id='"+ table.id +"subtotal_tax_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></span>"
	}

		var footer_row6=tablefooter.insertRow(-1);
		var footer_cell6 = footer_row6.insertCell(0);
		footer_cell6.scope="row";
		footer_cell6.colSpan="20";
		footer_cell6.innerHTML="<span style='float: right;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_GROUP_TOTAL')+":&nbsp;&nbsp;<input name='group_total_amount[]' id='"+ table.id +"total_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></span>"

	groupn++;
	return groupn -1;
}

/**
 * Mark Group Deleted
 */

function markGroupDeleted(gn)
{
	document.getElementById('group_body' + gn).style.display = 'none';
	
	var rows = document.getElementById('group_body' + gn).getElementsByTagName('tbody');
	
	for (x=0; x < rows.length; x++) {
		var input = rows[x].getElementsByTagName('button');
		for (y=0; y < input.length; y++) {
			if (input[y].id.indexOf('delete_line') != -1) {
				input[y].click();
			}
		}
	}
	
}

/**
 * Mark line deleted
 */
 
function markLineDeleted(ln, key)
{
	// collapse line; update deleted value
	document.getElementById(key + 'body' + ln).style.display = 'none';
	document.getElementById(key + 'deleted' + ln).value = '1';
    document.getElementById(key + 'delete_line' + ln).onclick = '';
    var groupid = 'group' + document.getElementById(key + 'group_number' + ln).value;

    calculateTotal(groupid);
    calculateTotal('lineItems');
}


/**
 * Calculate Line Values
 */

function calculateLine(ln, key){

    var required = 'product_list_price';
    if(document.getElementById(key + required + ln) == null){
        required = 'product_unit_price';
    }

    if (document.getElementById(key + 'name' + ln).value == '' || document.getElementById(key + required + ln).value == ''){
        return;
    }

    if(document.getElementById(key + 'product_qty' + ln) != null && document.getElementById(key + 'product_qty' + ln).value == ''){
        document.getElementById(key + 'product_qty' + ln).value =1;
    }

    if(document.getElementById(key + 'product_list_price' + ln) != null && document.getElementById(key + 'product_discount' + ln) != null && document.getElementById(key + 'discount' + ln) != null){
        var listPrice = get_value(key + 'product_list_price' + ln);
        var discount = get_value(key + 'product_discount' + ln);
        var dis = document.getElementById(key + 'discount' + ln).value;

        if(dis == 'Amount')
        {
            if(discount > listPrice)
            {
                document.getElementById(key + 'product_discount' + ln).value = listPrice;
                discount = listPrice;
            }
            document.getElementById(key + 'product_unit_price' + ln).value = format2Number(listPrice - discount);
        }
        else if(dis == 'Percentage')
        {
            if(discount > 100)
            {
                document.getElementById(key + 'product_discount' + ln).value = 100;
                discount = 100;
            }
            discount = (discount/100) * listPrice;
            document.getElementById(key + 'product_unit_price' + ln).value = format2Number(listPrice - discount);
        }
        else
        {
            document.getElementById(key + 'product_unit_price' + ln).value = document.getElementById(key + 'product_list_price' + ln).value;
            document.getElementById(key + 'product_discount' + ln).value = '';
            discount = 0;
        }
        document.getElementById(key + 'product_list_price' + ln).value = format2Number(listPrice);
        //document.getElementById(key + 'product_discount' + ln).value = format2Number(unformat2Number(document.getElementById(key + 'product_discount' + ln).value));
        document.getElementById(key + 'product_discount_amount' + ln).value = format2Number(-discount);
    }

    var productQty = 1;
    if(document.getElementById(key + 'product_qty' + ln) != null){
        productQty = unformat2Number(document.getElementById(key + 'product_qty' + ln).value);
        Quantity_format2Number(ln);
    }

    var productUnitPrice = unformat2Number(document.getElementById(key + 'product_unit_price' + ln).value);
    var vat = unformat2Number(document.getElementById(key + 'vat' + ln).value);

    var productTotalPrice = productQty * productUnitPrice;


    var totalvat=(productTotalPrice * vat) /100;

    /* uncomment to have vat added to the line total */
    //productTotalPrice=productTotalPrice + totalvat;

    document.getElementById(key + 'vat_amt' + ln).value = format2Number(totalvat);

    document.getElementById(key + 'product_unit_price' + ln).value = format2Number(productUnitPrice);
    document.getElementById(key + 'product_total_price' + ln).value = format2Number(productTotalPrice);
    var groupid = 'group' + document.getElementById(key + 'group_number' + ln).value;

    calculateTotal(groupid);
    calculateTotal('lineItems');

}

/**
 * Calculate totals
 */
function calculateTotal(key)
{
    var row = document.getElementById(key).getElementsByTagName('tbody');
    if(key == 'lineItems') key = '';
	var length = row.length;
    var head = {};
	var tot_amt = 0;
    var subtotal = 0;
	var dis_tot = 0;
	var tax = 0;
	
	for (i=0; i < length; i++) {
		var qty = 1;
        var list = null;
		var unit = 0;
		var deleted = 0;
		var dis_amt = 0;
		var product_vat_amt = 0;

		var input = row[i].getElementsByTagName('input');
		for (j=0; j < input.length; j++) {
			if (input[j].id.indexOf('product_qty') != -1) {
				qty = unformat2Number(input[j].value);
			}
            if (input[j].id.indexOf('product_list_price') != -1)
            {
                list = unformat2Number(input[j].value);
            }
			if (input[j].id.indexOf('product_unit_price') != -1)
			{
				unit = unformat2Number(input[j].value);
			}
			if (input[j].id.indexOf('product_discount_amount') != -1)
			{
				dis_amt = unformat2Number(input[j].value);
			}
			if (input[j].id.indexOf('vat_amt') != -1)
			{
				product_vat_amt = unformat2Number(input[j].value);
			}
			/*if (input[j].id.indexOf('group_number') != -1)
			{
				input[j].value = '';
			}*/

			if (input[j].id.indexOf('deleted') != -1) {
				deleted = input[j].value;
			}
			
		}

        if(deleted != 1 && key != ''){
            head[row[i].parentNode.id] = 1;
        } else if(key != '' && head[row[i].parentNode.id] != 1){
            head[row[i].parentNode.id] = 0;
        }

        if (qty != 0 && list != null && deleted != 1) {
            tot_amt += list * qty;
        } else if (qty != 0 && unit != 0 && deleted != 1) {
            tot_amt += unit * qty;
        }

		if (qty != 0 && unit != 0 && deleted != 1) {
			subtotal += unit * qty;
		}
		if (dis_amt != 0 && deleted != 1) {
			dis_tot += dis_amt * qty;
		}
		if (product_vat_amt != 0 && deleted != 1) {
			tax += product_vat_amt;
		}
	}

    for(var h in head){
        if (head[h] != 1 && document.getElementById(h + '_head') != null) {
            document.getElementById(h + '_head').style.display = "none";
        }
    }

    set_value(key+'total_amt',tot_amt);
    set_value(key+'subtotal_amount',subtotal);
    set_value(key+'discount_amount',dis_tot);

    var shipping = get_value(key+'shipping_amount');

    var shippingtax = get_value(key+'shipping_tax');

    var shippingtax_amt = shipping * (shippingtax/100);

    set_value(key+'shipping_tax_amt',shippingtax_amt);

    tax += shippingtax_amt;

    set_value(key+'tax_amount',tax);

    set_value(key+'subtotal_tax_amount',subtotal + tax);
    set_value(key+'total_amount',subtotal + tax + shipping);
}

function set_value(id, value){
    if(document.getElementById(id) != null)
    {
        document.getElementById(id).value = format2Number(value);
    }
}

function get_value(id){
    if(document.getElementById(id) != null)
    {
        return unformat2Number(document.getElementById(id).value);
    }
    return 0;
}


function unformat2Number(num)
{
	return unformatNumber(num, num_grp_sep, dec_sep)
}

function format2Number(str)
{
	if(str != '' || str == 0){
		return formatNumber(str, num_grp_sep, dec_sep, sig_digits, sig_digits);
	}
	return str;
}

function Quantity_format2Number(ln)
{
	var qty=unformat2Number(document.getElementById('product_product_qty' + ln).value);
	if(qty == null){qty = 1;}

    if(qty == 0){
        str = '0';
    } else {
        var str = format2Number(qty);
        if(sig_digits){
            str = str.replace(/0*$/,'');
            str = str.replace(dec_sep,'~');
            str = str.replace(/~$/,'');
            str = str.replace('~',dec_sep);
        }
    }

	document.getElementById('product_product_qty' + ln).value=str;
}

function formatNumber(n, num_grp_sep, dec_sep, round, precision) {
    if (typeof num_grp_sep == "undefined" || typeof dec_sep == "undefined") {
        return n;
    }
    if(n == 0) n = '0';
    
    n = n ? n.toString() : "";
    if (n.split) {
        n = n.split(".");
    } else {
        return n;
    }
    if (n.length > 2) {
        return n.join(".");
    }
    if (typeof round != "undefined") {
        if (round > 0 && n.length > 1) {
            n[1] = parseFloat("0." + n[1]);
            n[1] = Math.round(n[1] * Math.pow(10, round)) / Math.pow(10, round);
            n[1] = n[1].toString().split(".")[1];
        }
        if (round <= 0) {
            n[0] = Math.round(parseInt(n[0], 10) * Math.pow(10, round)) / Math.pow(10, round);
            n[1] = "";
        }
    }
    if (typeof precision != "undefined" && precision >= 0) {
        if (n.length > 1 && typeof n[1] != "undefined") {
            n[1] = n[1].substring(0, precision);
        } else {
            n[1] = "";
        }
        if (n[1].length < precision) {
            for (var wp = n[1].length; wp < precision; wp++) {
                n[1] += "0";
            }
        }
    }
    regex = /(\d+)(\d{3})/;
    while (num_grp_sep != "" && regex.test(n[0])) {
        n[0] = n[0].toString().replace(regex, "$1" + num_grp_sep + "$2");
    }
    return n[0] + (n.length > 1 && n[1] != "" ? dec_sep + n[1] : "");
}

//function enableQS(noReload){YAHOO.util.Event.onDOMReady(function(){if(typeof sqs_objects=="undefined"){return}var Dom=YAHOO.util.Dom;var qsFields=Dom.getElementsByClassName("sqsEnabled");for(qsField in qsFields){if(typeof qsFields[qsField]=="function"||typeof qsFields[qsField].id=="undefined"){continue}form_id=qsFields[qsField].form.getAttribute("id");if(typeof form_id=="object"&&qsFields[qsField].form.getAttribute("real_id")){form_id=qsFields[qsField].form.getAttribute("real_id")}qs_index_id=form_id+"_"+qsFields[qsField].name;if(typeof sqs_objects[qs_index_id]=="undefined"){qs_index_id=qsFields[qsField].name;if(typeof sqs_objects[qs_index_id]=="undefined"){continue}}if(QSProcessedFieldsArray[qs_index_id]){continue}var qs_obj=sqs_objects[qs_index_id];var loaded=false;if(!document.forms[qs_obj.form]){continue}if(!document.forms[qs_obj.form].elements[qsFields[qsField].id].readOnly&&qs_obj["disable"]!=true){combo_id=qs_obj.form+"_"+qsFields[qsField].id;if(Dom.get(combo_id+"_results")){loaded=true}if(!loaded){QSProcessedFieldsArray[qs_index_id]=true;qsFields[qsField].form_id=form_id;var sqs=sqs_objects[qs_index_id];var resultDiv=document.createElement("div");resultDiv.id=combo_id+"_results";Dom.insertAfter(resultDiv,qsFields[qsField]);var fields=qs_obj.field_list.slice();fields[fields.length]="module";var ds=new YAHOO.util.DataSource("index.php?",{responseType:YAHOO.util.XHRDataSource.TYPE_JSON,responseSchema:{resultsList:"fields",total:"totalCount",fields:fields,metaNode:"fields",metaFields:{total:"totalCount",fields:"fields"}},connMethodPost:true});var forceSelect=!(qsFields[qsField].form&&typeof qsFields[qsField].form=="object"&&qsFields[qsField].form.name=="search_form");var search=new YAHOO.widget.AutoComplete(qsFields[qsField],resultDiv,ds,{typeAhead:forceSelect,forceSelection:forceSelect,fields:fields,sqs:sqs,animSpeed:.25,qs_obj:qs_obj,inputElement:qsFields[qsField],generateRequest:function(a){var b=SUGAR.util.paramsToUrl({to_pdf:"true",module:"Home",action:"quicksearchQuery",data:encodeURIComponent(YAHOO.lang.JSON.stringify(this.sqs)),query:a});return b},setFields:function(a,b){this.updateFields(a,b)},updateFields:function(a,b){for(var c in this.fields){for(var d in this.qs_obj.field_list){if(this.fields[c]==this.qs_obj.field_list[d]&&document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[d]]&&this.qs_obj.populate_list[d].match(b)){var e=a[c].replace(/&/gi,"&").replace(/</gi,"<").replace(/>/gi,">").replace(/&#039;/gi,"'").replace(/"/gi,'"');document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[d]].value=e}}}},clearFields:function(){for(var a in this.qs_obj.field_list){if(document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[a]]){document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[a]].value=""}}this.oldValue=""}});if(/^(billing_|shipping_)?account_name$/.exec(qsFields[qsField].name)){search.clearFields=function(){};search.setFields=function(a,b){var c="";var d="";var e="";var f=new Array;for(var g in this.fields){for(var h in this.qs_obj.field_list){if(this.fields[g]==this.qs_obj.field_list[h]&&document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[h]]&&document.getElementById(this.qs_obj.populate_list[h]+"_label")&&this.qs_obj.populate_list[h].match(b)){var i=a[g].replace(/&/gi,"&").replace(/</gi,"<").replace(/>/gi,">").replace(/&#039;/gi,"'").replace(/"/gi,'"');var j=document.getElementById(this.qs_obj.populate_list[h]+"_label").innerHTML.replace(/\n/gi,"");label_and_data=j+" "+i;if(document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[h]]&&!f[j]){c+=j+" \n";d+=label_and_data+"\n";f[j]=true;e+=j+" "+document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[h]].value+"\n"}}}}if(c!=e&&e!=d){module_key=typeof document.forms[form_id].elements["module"]!="undefined"?document.forms[form_id].elements["module"].value:"app_strings";warning_label=SUGAR.language.translate(module_key,"NTC_OVERWRITE_ADDRESS_PHONE_CONFIRM")+"\n\n"+d;if(!confirm(warning_label)){this.updateFields(a,/account_id/)}else{if(Dom.get("shipping_checkbox")){if(this.inputElement.id=="shipping_account_name"){b=Dom.get("shipping_checkbox").checked?/(account_id|office_phone)/:b}else if(this.inputElement.id=="billing_account_name"){b=Dom.get("shipping_checkbox").checked?b:/(account_id|office_phone|billing)/}}else if(Dom.get("alt_checkbox")){b=Dom.get("alt_checkbox").checked?b:/^(?!alt)/}this.updateFields(a,b)}}else{this.updateFields(a,b)}}}if(typeof SUGAR.config.quicksearch_querydelay!="undefined"){search.queryDelay=SUGAR.config.quicksearch_querydelay}search.itemSelectEvent.subscribe(function(e,args){var data=args[2];var fields=this.fields;this.setFields(data,/\S/);if(typeof this.qs_obj["post_onblur_function"]!="undefined"){collection_extended=new Array;for(var i in fields){for(var key in this.qs_obj.field_list){if(fields[i]==this.qs_obj.field_list[key]){collection_extended[this.qs_obj.field_list[key]]=data[i]}}}eval(this.qs_obj["post_onblur_function"]+"(collection_extended, this.qs_obj.id)")}});search.textboxFocusEvent.subscribe(function(){this.oldValue=this.getInputEl().value});search.selectionEnforceEvent.subscribe(function(a,b){if(this.oldValue!=b[1]){this.clearFields()}else{this.getInputEl().value=this.oldValue}});search.dataReturnEvent.subscribe(function(a,b){if(this.getInputEl().value.length==0&&b[2].length>0){var c=[];for(var d in this.qs_obj.field_list){c[c.length]=b[2][0][this.qs_obj.field_list[d]]}this.getInputEl().value=c[this.key];this.itemSelectEvent.fire(this,"",c)}});search.typeAheadEvent.subscribe(function(a,b){this.getInputEl().value=this.getInputEl().value.replace(/&/gi,"&").replace(/</gi,"<").replace(/>/gi,">").replace(/&#039;/gi,"'").replace(/"/gi,'"')});if(typeof QSFieldsArray[combo_id]=="undefined"&&qsFields[qsField].id){QSFieldsArray[combo_id]=search}}}}})}
