<?php
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
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
 * @author Salesagility Ltd <support@salesagility.com>
 */
require_once('modules/AOS_Quotes/AOS_Quotes_sugar.php');
class AOS_Quotes extends AOS_Quotes_sugar {
	
	function AOS_Quotes(){	
		parent::AOS_Quotes_sugar();
	}
	
	function save($check_notify = FALSE){
        if (empty($this->id)){
            unset($_POST['group_id']);
            unset($_POST['product_id']);
            unset($_POST['service_id']);
        }

		parent::save($check_notify);
		
		require_once('modules/AOS_Line_Item_Groups/AOS_Line_Item_Groups.php');
		$productQuoteGroup = new AOS_Line_Item_Groups();
		$productQuoteGroup->save_groups($_POST, $this, 'group_');
	}
	
	function mark_deleted($id)
	{
		$productQuote = new AOS_Products_Quotes();
		$productQuote->mark_lines_deleted($this);
		parent::mark_deleted($id);
	}	
}
?>
