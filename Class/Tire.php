<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Order_item.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/PR_Item.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/PC_Item.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Supplier.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Quotation_item.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Invoice_item.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Tire {
	private $_tid;
	private $_country;
	private $_tireSize;
	private $_brandName;
	private $_quantity;
	private $_unitPrice;
	private $_status;
	/**
	 * @AssociationType groupproject.Order item
	 */
	public $_unnamed_Order_item_;
	/**
	 * @AssociationType groupproject.PR Item
	 */
	public $_unnamed_PR_Item_;
	/**
	 * @AssociationType groupproject.PC Item
	 */
	public $_unnamed_PC_Item_;
	/**
	 * @AssociationType groupproject.Supplier
	 */
	public $_supplies;
	/**
	 * @AssociationType groupproject.Quotation item
	 */
	public $_unnamed_Quotation_item_;
	/**
	 * @AssociationType groupproject.Invoice item
	 */
	public $_unnamed_Invoice_item_;

	/**
	 * @access public
	 */
	public function addItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function updateItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewitem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getDetails() {
		// Not yet implemented
	}
}
?>