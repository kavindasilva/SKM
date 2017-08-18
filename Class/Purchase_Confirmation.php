<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Purchase_Requisition.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/PC_Item.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Purchase_Confirmation {
	private $_pCNo;
	private $_date;
	/**
	 * @AssociationType groupproject.Purchase Requisition
	 */
	public $_has;
	/**
	 * @AssociationType groupproject.PC Item
	 */
	public $_unnamed_PC Item_;

	/**
	 * @access public
	 */
	public function newPC() {
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