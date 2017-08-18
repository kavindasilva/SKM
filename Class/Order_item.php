<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Sales_Order.php');
require_once(realpath(dirname(__FILE__)) . '/../groupproject/Tire.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Order_item {
	private $_sOrdNo;
	private $_tId;
	private $_qty;
	private $_status;
	/**
	 * @AssociationType groupproject.Sales Order
	 */
	public $_unnamed_Sales_Order_;
	/**
	 * @AssociationType groupproject.Tire
	 */
	public $_unnamed_Tire_;

	/**
	 * @access public
	 */
	public function addOrderItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function deleteOrderItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function updateOrderItem() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param groupproject.Sales_Order aUnnamed_Sales_Order_
	 * @return void
	 * @ParamType aUnnamed_Sales_Order_ groupproject.Sales Order
	 * @ReturnType void
	 */
	public function setUnnamed_Sales_Order_(Sales_Order $aUnnamed_Sales_Order_) {
		$this->_unnamed_Sales_Order_ = $aUnnamed_Sales_Order_;
	}

	/**
	 * @access public
	 * @return groupproject.Sales_Order
	 * @ReturnType groupproject.Sales Order
	 */
	public function getUnnamed_Sales_Order_() {
		return $this->_unnamed_Sales_Order_;
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