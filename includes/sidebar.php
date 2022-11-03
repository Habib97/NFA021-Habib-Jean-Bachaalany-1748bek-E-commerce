<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Products Categories</h3>
    </div><!-- panel-heading Finish --> 
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
            <?php
				
			$link=connect();
			$c = mysqli_query($link, "select * from categories where c_available='1';");
			while ($cat = mysqli_fetch_assoc($c) ) {
				echo "<li> <a href='shop?id_cat=".$cat['id_cat']."'>".$cat['cat_name']."</a></li>";
				}
				mysqli_close($link);
			?>
                        
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->


<div>
    <div class="panel-heading">     
    </div>
</div><!-- ta tzebat ldesign-->