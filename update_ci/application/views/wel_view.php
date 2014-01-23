<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>

<div id="container">
<?php if(!empty($invalid)) echo $invalid; ?>
	<h1>Welcome <?php if(!empty($first_name)) echo $first_name; ?></h1>
  <a href="<?php if(empty($logout)) echo $logout='signup/logout'; else echo $logout; ?>">Logout</a>

</body>
</html>