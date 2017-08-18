<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Tire.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Purchase_Requisition.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/User.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Supplier extends User {
	private $_s_Id;
	private $_brand;
	private $_country;
	/**
	 * @AssociationType groupproject.Tire
	 */
	public $_supplies;
	/**
	 * @AssociationType groupproject.Purchase Requisition
	 */
	public $_sent_to;

	/**
	 * @access public
	 */
	public function register() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function sendProof() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function sendShipmentDetails() {
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