<!DOCTYPE html>
<html lang="en">
<head>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript" src="assests/js/global.js"></script>
</head>
<body><?php echo site_url();?>
 
<div id="container">
	<h1>Welcome </h1>
	<h4>Brand<h4>
	<div id="my-div">
	<?php 
	echo $val;
	foreach ($result as $row) {
	  
		 echo '<a href="#" onclick="load_data_ajax('."'$row->brand_name'".')">'.$row->brand_name.'&nbsp</a>';
		 
		  echo '<br>';
	   }
   ?>
   </div>
<?php
   foreach ($result as $row) {
   echo $row->id."&nbsp";
    echo $row->product_name."&nbsp";
	 echo $row->brand_name."&nbsp";
	  echo $row->category."&nbsp";
	  echo '<br>';
   }
?>
  <div id="container1"></div>
</body>
</html>









 

