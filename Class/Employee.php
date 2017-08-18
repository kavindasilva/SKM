<?php
require_once(realpath(dirname(__FILE__)) . '/../groupproject/User.php');

/**
 * @access public
 * @author Dula
 * @package groupproject
 */
class Employee extends User {
	private $_eId;
	private $_name;
	private $_tel;
	private $_type;

	/**
	 * @access public
	 */
	public function getDetails() {
		// Not yet implemented
	}
}
?>