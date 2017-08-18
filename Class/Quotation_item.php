<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Quotation.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Tire.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Quotation_item {
	private $_qNo;
	private $_tid;
	/**
	 * @AssociationType groupproject.Quotation
	 */
	public $_unnamed_Quotation_;
	/**
	 * @AssociationType groupproject.Tire
	 */
	public $_unnamed_Tire_;

	/**
	 * @access public
	 */
	public function addQuotationItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param groupproject.Quotation aUnnamed_Quotation_
	 * @return void
	 * @ParamType aUnnamed_Quotation_ groupproject.Quotation
	 * @ReturnType void
	 */
	public function setUnnamed_Quotation_(Quotation $aUnnamed_Quotation_) {
		$this->_unnamed_Quotation_ = $aUnnamed_Quotation_;
	}

	/**
	 * @access public
	 * @return groupproject.Quotation
	 * @ReturnType groupproject.Quotation
	 */
	public function getUnnamed_Quotation_() {
		return $this->_unnamed_Quotation_;
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