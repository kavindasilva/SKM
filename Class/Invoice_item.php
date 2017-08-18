<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Invoice.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Tire.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Invoice_item {
	private $_invoiceNo;
	private $_tid;
	/**
	 * @AssociationType groupproject.Invoice
	 */
	public $_unnamed_Invoice_;
	/**
	 * @AssociationType groupproject.Tire
	 */
	public $_unnamed_Tire_;

	/**
	 * @access public
	 */
	public function addInvoiceItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param groupproject.Invoice aUnnamed_Invoice_
	 * @return void
	 * @ParamType aUnnamed_Invoice_ groupproject.Invoice
	 * @ReturnType void
	 */
	public function setUnnamed_Invoice_(Invoice $aUnnamed_Invoice_) {
		$this->_unnamed_Invoice_ = $aUnnamed_Invoice_;
	}

	/**
	 * @access public
	 * @return groupproject.Invoice
	 * @ReturnType groupproject.Invoice
	 */
	public function getUnnamed_Invoice_() {
		return $this->_unnamed_Invoice_;
	}

	/**
	 * @access public
	 * @param groupproject.Tire aUnnamed_Tire_
	 * @return void
	 * @ParamType aUnnamed_Tire_ groupproject.Tire
	 * @ReturnType void
	 */
	public function setUnnamed_Tire_(Tire $aUnnamed_Tire_) {
		$this->_unnamed_Tire_ = $aUnnamed_Tire_;
	}

	/**
	 * @access public
	 * @return groupproject.Tire
	 * @ReturnType groupproject.Tire
	 */
	public function getUnnamed_Tire_() {
		return $this->_unnamed_Tire_;
	}
}
?>