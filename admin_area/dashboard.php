<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
		include("includes/db.php");
		$link=connect();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Dashboard </h1>
        
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard"></i> Dashboard
            
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div>
					  <?php
				        $sql="SELECT count(1) FROM product where p_available='1';";
						$res = mysqli_query($link, $sql);	
						$row = mysqli_fetch_array($res);
						$nb_pro = $row[0];
						
						if(!$res){
						echo "error sql in counting product".mysqli_error();
						}
					
				   ?>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $nb_pro; ?> </div>
                           
                        <div> Products </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_products">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div>
                     <?php
						$sql = "select  count(DISTINCT user.id_user)  from orders JOIN user ON user.id_user=orders.id_user;";
                      	$res = mysqli_query($link, $sql);	
						$row = mysqli_fetch_array($res);
						$nb_cus = $row[0];
						
						if(!$res){
						echo "error sql in counting customers".mysqli_error();
						}
					
				   ?>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $nb_cus; ?> </div>
                           
                        <div> Customers </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_customers">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div>
					  <?php
				        $sql="SELECT count(1) FROM categories;";
						$res = mysqli_query($link, $sql);	
						$row = mysqli_fetch_array($res);
						$nb_cat = $row[0];
						
						if(!$res){
						echo "error sql in counting categories".mysqli_error();
						}
					
				   ?>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $nb_cat; ?> </div>
                           
                        <div> Product Categories </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_p_cats">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div>
					 
					 <?php
				        $sql="SELECT count(1) FROM orders;";
						$res = mysqli_query($link, $sql);	
						$row = mysqli_fetch_array($res);
						$nb_ord = $row[0];
						
						if(!$res){
						echo "error sql in counting orders".mysqli_error();
						}
					
				   ?>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $nb_ord; ?> </div>
                           
                        <div> Orders </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_orders">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        View Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    
</div>

<div class="row">
   
    
    <div class="col-md-6">
       
                <div class="mb-md">
                    
                        <div id="piechart_cat" ></div>
                        
                  
                </div>
    </div>
	  
    
    <div class="col-md-6">
       
                <div class="mb-md">
                   
                        <div id="piechart_pay" ></div>
                        
                  
                </div>
    </div>
	
</div>
<br>
<div class="row">
  <div class="col-md-6">
  <div id="donutchart" style="width: 600px; height: 400px;"></div>
</div>
</div>

							<!--Chart for selling products per categories -->
                            <?php 
                                $sql = "select count(order_details.id_pro) as num,product.id_cat from order_details JOIN product ON order_details.id_pro=product.id_pro group by id_cat;";
                                $res = mysqli_query($link,$sql);	
                                 
                            ?>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sales', 'Selling products per Categorie'],
		  <?php
		  while($cat=mysqli_fetch_array($res)){
								
								$sql1 = "select cat_name  from  categories where id_cat='".$cat['id_cat']."';";
                                $res1 = mysqli_query($link,$sql1);
								$c=mysqli_fetch_array($res1);	
								$cat_name=$c['cat_name'];
								echo "['".$cat_name."',".$cat['num']."],";
		  }
		  ?>
         ]);

        var options = {
          title: 'Best selling product categories'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_cat'));

        chart.draw(data, options);
      }
    </script>	
	
	
							<!--Chart for most payment used -->
                            <?php 
          
                                $sql = "select count(pay_method) as num,pay_method  from orders group by pay_method;";
                                $res = mysqli_query($link,$sql);	
                                 
                            ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Payment', 'Most payment method used'],
		  <?php
		  while($pay=mysqli_fetch_array($res)){
								
								$pay_method=$pay['pay_method'];
								$pay_num=$pay['num'];
								echo "['".$pay_method."',".$pay_num."],";
		  }
		  ?>
         ]);

        var options = {
          title: 'Most payment method used'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_pay'));

        chart.draw(data, options);
      }
    </script>
	
									<!--Top 5 selling products-->
									 <?php 
          
                                $sql ="select sum(order_details.qte_pro) as num,product.p_name from order_details";
								$sql.=" JOIN product ON order_details.id_pro=product.id_pro  group by p_name order by num desc LIMIT 0 , 5;";
                                $res = mysqli_query($link,$sql);	
                                 
                            ?>
									
									
	<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		['Products', 'Quantity per Products'],
		<?php
		  while($pro=mysqli_fetch_array($res)){
								
								$p_name=$pro['p_name'];
								$num=$pro['num'];
								echo "['".$p_name."',".$num."],";
		  }
		  ?>
         
        ]);

        var options = {
          title: 'Top 5 Best-Selling Products',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
	
	