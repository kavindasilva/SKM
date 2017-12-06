
<?php

/**
	This file contains the codes to maintain the sessions
	It prevents unauthorized access, and unproviledged access
*/

//session_start();


if(!isset($_SESSION['currentuser'])){
	echo "user not set";
	header('Location:../../invalidlogin.html');
}
elseif ($_SESSION['usertype']!="suppl") {
	echo "not an admin";
	header('Location:../../invalidlogin.html');
}

?>