<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Regular_Customer.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Invoice.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Order_item.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Sales_Order {
	private $_sOrdNo;
	private $_date;
	private $_totalAmount;
	private $_status;
	/**
	 * @AssociationType groupproject.Regular Customer
	 */
	public $_place;
	/**
	 * @AssociationType groupproject.Invoice
	 */
	public $_unnamed_Invoice_;
	/**
	 * @AssociationType groupproject.Order item
	 */
	public $_unnamed_Order_item_;

	/**
	 * @access public
	 */
	public function addNewOrder() {
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
	public function cancleOrder() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function updateOrder() {
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