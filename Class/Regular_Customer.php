<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Sales_Order.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/User.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Regular_Customer extends User {
	private $_rid;
	private $_companyName;
	private $_tel;
	/**
	 * @AssociationType groupproject.Sales Order
	 */
	public $_place;

	/**
	 * @access public
	 */
	public function register() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function quotationRequset() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function placeOrder() {
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