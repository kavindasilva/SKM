<!DOCTYPE html>
<html>

<head>
  <title>SKMM| Purchase Requisition| Pending</title>
  
  <link rel="stylesheet" href="../../css/mystyle.css">

    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pending Requisition</h1>
      <ol class="breadcrumb">
        <li><a href="navigation.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Perchase Requisition</li>
        <li class="active">Pending Requisition</li>
      </ol>
    </section>


    <!-- Main content -->
  <div class="container">
      <div class="col-xp-1" style="margin-left:50px;">Tire Brand1
      <div style="margin-left:550px;">Tire Brand</div></div>
    <div class="box">
    <div class="box-body">
      <table id="tire_pending" class="table-boadered table-hover" width="1050">
        <thead>
          <tr>
            <th>Tire Id</th>
            <th>Brand</th>
            <th>Country</th>
            <th>Size</th>
            <th>Requested qty</th>
            <th>Sent Date</th>
          </tr>
        </thead>
        <tbody id="pending_item">
        <?php
        require_once('../../php/dbcon.php');
        $tire_tbl_quary="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE status='pending'";
        $result = $conn->query($tire_tbl_quary);
        while($row=$result->fetch_assoc()){
            //$tbl_rw_id=$tbl_rw_id+1;
            $t_id=$row['t_id'];
            ?>

            <tr class="clickable-row" id="ava_tire_row">

                <td><?php echo $row['t_id']?></td>
                <td><?php echo $row['brand_name']?></td>
                <td><?php echo $row['country']?></td>
                <td><?php echo $row['tire_size']?></td>

            <?php
        }
        //requested quantity retrive
        $pr_itm_tbl_quary="SELECT qty,purchase_requisition_pr_no FROM pr_item WHERE tire_t_id=$t_id";
        $qty_exe=mysqli_query($conn,$pr_itm_tbl_quary);
        $qty_row=mysqli_fetch_row($qty_exe);

        ?>
        <td><?php echo $qty_row[0]?></td>
        <?php

        $pr_no=$qty_row[1];
        $pr_tbl_quary="SELECT date FROM purchase_requisition WHERE pr_no=$pr_no";
        $date_exe=mysqli_query($conn,$pr_tbl_quary);
        $date_row=mysqli_fetch_row($date_exe);

        $conn->close();
        ?>
        <td><?php echo $date_row[0]?></td>
        <td><button class="btn btn-danger delete_btn">Delete Requests</button></td>
        </tr>

        </tbody>
      </table>
      
    </div>
    </div> 
  </div>
<script>
    $(".delete_btn").click(function () {
        var tid= this.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML;
        alert(tid);
        $.ajax({
            type:"post";
            url:"delete_request_quary.php",
            data:{tire_id:tid},
            success:function (data) {
            alert(data);

        }
        })

        
    })
</script>


 


</body>



</html>
