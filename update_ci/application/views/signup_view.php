<!DOCTYPE html>
<html lang="en">
<head>
<script src="assests/js/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="assests/js/global.js" type="text/javascript"></script>

</head>
<body>
<?php if(!empty($msg)) echo $msg;?>
<?php echo validation_errors(); ?>
<form method="POST" action="signup">
REGISTER HERE:<BR>
<label>First Name:</label><input type="text" name="first_name"  value="<?php echo set_value('first_name'); ?>" ><br>
Last Name: <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>"><br>
Passoword: <input type="password" name="pass" value=""><br>
Confirm Password: <input type="password" name="cpass" value=""><br>
email: <input type="email" id="username" name="email" value=""><br>
<input type="submit" name="sign_up" value="Signup">
</form>

LOGIN HERE :
<form method="POST" action="welcome">
email: <input type="email" name="cemail" value=""><br>
Passoword: <input type="password" name="pass" value=""><br>
<input type="submit" name="login" value="Login">
</form>

<a href="<?php echo $url; ?>">Click here to login</a>
</body>
</html>