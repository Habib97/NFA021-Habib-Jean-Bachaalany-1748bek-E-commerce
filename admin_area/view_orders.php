<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
		include("includes/db.php");
		$link=connect();
?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Orders
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Invoice No: </th>
                                <th> Customer Email: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th> Payment Method: </th>
								<th> Order Detail:</th>
                           </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
                                if(isset($_GET['view_orders']) && !empty($_GET['view_orders'])){
								$sql = "select * from orders where id_user='".$_GET['view_orders']."';";
									}
								elseif( isset($_GET['date']) ){
								$sql = "select * from orders where date_ord='".$_GET['date']."';";
									}
								else{
                                $sql = "select * from orders;";
								   }
                                $res = mysqli_query($link,$sql);
								$tot=0;
                                while($row_order=mysqli_fetch_array($res)){
                                    
                                    $id_order = $row_order['id_order'];
                                    $id_user = $row_order['id_user'];
									$date_ord=$row_order['date_ord'];
                                    $pay_method=$row_order['pay_method'];
                                    $amount=$row_order['amount'];
									$tot+=$amount;
									$sql1 = "select * from user where id_user='$id_user';";
                                    
                                    $res1 = mysqli_query($link,$sql1);
                                    $r = mysqli_fetch_array($res1);
                                    $email = $r['email'];
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $id_order; ?></td>
							    <td> <?php echo $email; ?> </td>
                                <td> <?php echo $date_ord; ?> </td>
                                <td> <?php echo $amount; ?> $</td>
								<td> <?php echo $pay_method	;?></td>
								<td> 
                                    <a href="index.php?ord_details=<?php echo $id_order; ?>">
                                        <i class="fa fa-info-circle"></i> Details
                                    </a>
                                </td>
                                
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
					</table><!-- table table-striped table-bordered table-hover finish -->
               </div><!-- table-responsive finish -->
				
           
		   </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
		<h1>Total sales: <?php echo $tot;?> $</h1>
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
