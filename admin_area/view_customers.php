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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Customers
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> ID: </th>
                                <th> Name: </th>
                                <th> E-Mail: </th>
                                <th> Country: </th>
                                <th> City: </th>
                                <th> Address: </th>
                                <th> Contact: </th>
								<th> Orders: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $sql = "select distinct user.id_user from orders JOIN user ON user.id_user=orders.id_user";
                                $res_user = mysqli_query($link,$sql);
								
								while($row_id=mysqli_fetch_array($res_user)){
								
								$sql = "select *  from  user where id_user='".$row_id['id_user']."';";
                                $res = mysqli_query($link,$sql);
									
                                while($row_c=mysqli_fetch_array($res)){
                                    
                                    $id_user = $row_c['id_user'];
                                    $f_name = $row_c['f_name'];
                                    $l_name = $row_c['l_name'];
                                    $email = $row_c['email'];
                                    $country = $row_c['country'];
                                    $city = $row_c['city'];
                                    $adress = $row_c['adress'];
                                    $contact = $row_c['contact'];
                                 
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $id_user; ?> </td>
                                <td> <?php echo $f_name." ".$l_name; ?> </td>
                                <td> <?php echo $email; ?> </td>
                                <td> <?php echo $country; ?></td>
                                <td> <?php echo $city; ?> </td>
                                <td> <?php echo $adress ?> </td>
                                <td> <?php echo $contact ?> </td>
								<td> 
                                    <a href="index.php?view_orders=<?php echo $id_user; ?>">
                                        <i class="fa fa-info-circle"></i> Details
                                    </a>
                                </td>
                                
                            </tr><!-- tr finish -->
                            
								<?php } } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
