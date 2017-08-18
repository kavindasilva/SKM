<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Purchase_Confirmation.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Tire.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class PC_Item {
	private $_pCNo;
	private $_tid;
	private $_qty;
	private $_unitPrice;
	/**
	 * @AssociationType groupproject.Purchase Confirmation
	 */
	public $_unnamed_Purchase_Confirmation_;
	/**
	 * @AssociationType groupproject.Tire
	 */
	public $_unnamed_Tire_;

	/**
	 * @access public
	 */
	public function addPCItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param groupproject.Purchase_Confirmation aUnnamed_Purchase_Confirmation_
	 * @return void
	 * @ParamType aUnnamed_Purchase_Confirmation_ groupproject.Purchase Confirmation
	 * @ReturnType void
	 */
	public function setUnnamed_Purchase_Confirmation_(Purchase_Confirmation $aUnnamed_Purchase_Confirmation_) {
		$this->_unnamed_Purchase_Confirmation_ = $aUnnamed_Purchase_Confirmation_;
	}

	/**
	 * @access public
	 * @return groupproject.Purchase_Confirmation
	 * @ReturnType groupproject.Purchase Confirmation
	 */
	public function getUnnamed_Purchase_Confirmation_() {
		return $this->_unnamed_Purchase_Confirmation_;
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