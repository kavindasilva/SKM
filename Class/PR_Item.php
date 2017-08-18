<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Purchase_Requisition.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Tire.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class PR_Item {
	private $_pRNo;
	private $_tid;
	private $_qty;
	/**
	 * @AssociationType groupproject.Purchase Requisition
	 */
	public $_unnamed_Purchase_Requisition_;
	/**
	 * @AssociationType groupproject.Tire
	 */
	public $_contatins;

	/**
	 * @access public
	 */
	public function addPRItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param groupproject.Purchase_Requisition aUnnamed_Purchase_Requisition_
	 * @return void
	 * @ParamType aUnnamed_Purchase_Requisition_ groupproject.Purchase Requisition
	 * @ReturnType void
	 */
	public function setUnnamed_Purchase_Requisition_(Purchase_Requisition $aUnnamed_Purchase_Requisition_) {
		$this->_unnamed_Purchase_Requisition_ = $aUnnamed_Purchase_Requisition_;
	}

	/**
	 * @access public
	 * @return groupproject.Purchase_Requisition
	 * @ReturnType groupproject.Purchase Requisition
	 */
	public function getUnnamed_Purchase_Requisition_() {
		return $this->_unnamed_Purchase_Requisition_;
	}

	/**
	 * @access public
	 * @param groupproject.Tire aContatins
	 * @return void
	 * @ParamType aContatins groupproject.Tire
	 * @ReturnType void
	 */
	public function setContatins(Tire $aContatins) {
		$this->_contatins = $aContatins;
	}

	/**
	 * @access public
	 * @return groupproject.Tire
	 * @ReturnType groupproject.Tire
	 */
	public function getContatins() {
		return $this->_contatins;
	}
}
?>