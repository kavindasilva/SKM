<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Invoice.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Employee.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Sales_Executive extends Employee {
	/**
	 * @AssociationType groupproject.Invoice
	 */
	public $_unnamed_Invoice_;

	/**
	 * @access public
	 */
	public function generateInvoice() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function placeCustomerOrders() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function viewReports() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function sendQuotations() {
		// Not yet implemented
	}
}
?>