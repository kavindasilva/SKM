<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Regular_Customer.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Quotation_item.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Quotation {
	private $_qNo;
	private $_date;
	private $_qty;
	/**
	 * @AssociationType groupproject.Regular Customer
	 */
	public $_place;
	/**
	 * @AssociationType groupproject.Quotation item
	 */
	public $_unnamed_Quotation item_;

	/**
	 * @access public
	 */
	public function addQuotation() {
		// Not yet implemented
	}
}
?>