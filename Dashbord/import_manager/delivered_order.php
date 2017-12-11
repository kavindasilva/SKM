<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/12/2017
 * Time: 12:06 AM
 */
?>
 <section class="content-header">
<!--      <input type="hidden" id="sup_id" value="--><?php //echo $sup_id; ?><!--">-->
   <h1>
       Delivering orders
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li class="active"><a href="index.php"><i class="fa"></i>Delivering orders</a></li>
      </ol>
</section></br>
<div class="col-md-3" id="sup_dashbord_div">
<ul id="quotation">


<?php
    require_once('../../php/dbcon.php');
    $pr_no_quary="SELECT pr_no,`supplier_s_id`,`date` FROM purchase_requisition WHERE status='delivering'";
    $pr_no_result=mysqli_query($conn,$pr_no_quary);

    while ($pr_no_row=mysqli_fetch_row($pr_no_result)){
        $pr_no=$pr_no_row[0];
        $sup_id=$pr_no_row[1];
        $sup_name_quary="SELECT `user_user_name` FROM `supplier` WHERE `s_id`=$sup_id";
        $sup_name=mysqli_fetch_row(mysqli_query($conn,$sup_name_quary));
        echo ("
            <a href=\"#\"><li id='pr_no_li' value=\"".$pr_no_row[0]."\">
            <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i>  request from ".$sup_name[0]." (".$pr_no_row[2].")
                    </li></a>
            ");
    }


               ?>

</ul>