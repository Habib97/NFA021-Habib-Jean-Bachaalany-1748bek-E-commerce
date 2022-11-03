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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Sales
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Sales
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Date: </th>
                                <th> Total Amount: </th>
								<th> Sales Detail:</th>
                           </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
                              
                                $sql = "SELECT SUM(amount)as sum,date_ord FROM orders group by date_ord;";
								$res = mysqli_query($link,$sql);
								$tot=0;
                                while($row_sale=mysqli_fetch_array($res)){
                                    
                                   $date_ord=$row_sale['date_ord'];
                                   $amount=$row_sale['sum'];
								   $tot+=$amount;
									
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $date_ord; ?> </td>
                                <td> <?php echo $amount; ?> $</td>
								<td> 
                                    <a href="index.php?date=<?php echo $date_ord; ?>">
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
	