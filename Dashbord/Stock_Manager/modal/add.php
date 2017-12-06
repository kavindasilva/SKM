<?php require_once('../../../php/dbcon.php');
$country=$_POST['country'];
$tyresize=$_POST['tyresize'];
$brandname=$_POST['brandname'];
$qty=$_POST['qty'];
$unitprize=$_POST['unitprize'];
$tid=$_POST['tid'];
$supid="SELECT s_id FROM supplier WHERE brand='$brandname',country='$country';";
$add="INSERT INTO tire (t_id, country, tire_size, brand_name, quantity, unit_price, status, supplier_s_id, t_type) VALUES (NULL, '$country', '$tyresize', '$brandname', '$qty', '$unitprize','Available', '$supid')where t_id=$tid;";
if(mysqli_query($conn,$add)){

}
else{
    echo (mysqli_error($conn));
}



?>