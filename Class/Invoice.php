<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Sales_Order.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Sales_Executive.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Invoice_item.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Invoice {
	private $_invoiceNo;
	private $_date;
	private $_subTotal;
	private $_discount;
	private $_netAmount;
	private $_invoiceNotice;
	private $_status;
	/**
	 * @AssociationType groupproject.Sales Order
	 */
	public $_has;
	/**
	 * @AssociationType groupproject.Sales Executive
	 */
	public $_genetate;
	/**
	 * @AssociationType groupproject.Invoice item
	 */
	public $_unnamed_Invoice_item_;

	/**
	 * @access public
	 */
	public function addNewInvoice() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function updateStatus() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteInvoice() {
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