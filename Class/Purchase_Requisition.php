<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Import_Manager.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Supplier.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/PR_Item.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Purchase_Confirmation.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Purchase_Requisition {
	private $_pRNo;
	private $_date;
	private $_status;
	/**
	 * @AssociationType groupproject.Import Manager
	 */
	public $_makes;
	/**
	 * @AssociationType groupproject.Supplier
	 */
	public $_sent_to;
	/**
	 * @AssociationType groupproject.PR Item
	 */
	public $_unnamed_PR_Item_;
	/**
	 * @AssociationType groupproject.Purchase Confirmation
	 */
	public $_has;

	/**
	 * @access public
	 */
	public function newPurchaseRequisition() {
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