<center><!--  center Begin  -->
    
    <h1> My Orders </h1>
    
    <p class="lead"> Your orders on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
        
    </p>
    
</center><!--  center Finish  -->


<hr>


			   
<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> ON: </th>
                <th> Due Amount: </th>
                <th> Invoice No: </th>
                <th> Order Date:</th>
                <th> Details: </th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
		  
						<?php
					   $idu=$_COOKIE['idu'];
					   $link=connect();
					   $sql="SELECT * from orders where id_user='$idu';"; 
					   $res = mysqli_query($link, $sql);	
					   $ord = mysqli_num_rows($res);
						if(!$res){
						echo "error sql in select orders".mysqli_error();
						}
						elseif($ord>0){
							$i=1;
							while($pro = mysqli_fetch_assoc($res)){
												
							echo "<tbody> <tr>";
							echo "<th> #$i </th>";	
							echo "<td>".$pro['amount']." $</td>";
							echo "<td>".$pro['id_order']."</td>";
							echo "<td>".$pro['date_ord']."</td>";
							echo "<td>";
							echo "<a href='my_account.php?id_details=".$pro['id_order']."' target='_blank' class='btn btn-primary btn-sm'> Order Details </a> ";
							echo "</td>";
							echo "</tr></tbody>";
							$i++;
							}
						}
					   ?>
      
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->