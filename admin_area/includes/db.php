<?php 
function connect(){
		$link = mysqli_connect("localhost","root","","supertech") or die("error connect");
		return $link;
}
?>
