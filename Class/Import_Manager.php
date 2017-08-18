<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Purchase_Requisition.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Employee.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Import_Manager extends Employee {
	/**
	 * @AssociationType groupproject.Purchase Requisition
	 */
	public $_makes;

	/**
	 * @access public
	 */
	public function viewReports() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function sendPRequisition() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function handlePConfimation() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function sendGRN() {
		// Not yet implemented
	}
}
?>