<!DOCTYPE html>
<html>
<head>
<style>
.body{
	margin: 0;
	padding: 0;
}
.header{
	display: grid;
	height: 100%;
}
.header-content{
	grid-area: header;
	font-weight: bold;
	align-self: end;
	justify-self: start;
	margin: 0;
}
.content{
	display: grid;
	height: 100%;
	grid-template-areas: 'username username' 'password password';
	justify-items: center;
	align-items: center;
	grid-area: content;
	background: #9395D3;
	color: #ffffff;
}
.form-row{
	padding: 1em;
}
label {
	margin-right: 1em;
	font-size: 2em;
}
input,select {
	font-size: 2em;
	border-radius: 0.4em;
	padding: 0.2em;
}
input:focus, select:focus{
	outline: none;
	box-shadow: 0px 0px 0px 3px #7de8bd;
	transition: all 250ms linear;
}
.username{
	grid-area: username;
}
.password{
	grid-area: password;
}
td{
	padding: 0.5em;
}
.form-button{
	display: block;
	margin-right: auto;
	padding: 0.5em;
	width: 40%;
	background: #9ea0d7;
  	border: 1px solid #8587cd;
	border-radius: 0.4em;
  	box-shadow: 0px 2px 0 #8183cc, 2px 4px 6px #8c8ed0;
	color: white;
  	font-weight: 900;
	font-size: 1.5em;
  	letter-spacing: 1px;
	-moz-transition: all 150ms linear;
	-o-transition: all 150ms linear;
	-webkit-transition: all 150ms linear;
  	transition: all 150ms linear;
}
.form-button:hover{
	 background: #8e90d1;
  	border: 1px solid rgba(0, 0, 0, 0.05);
  	box-shadow: 1px 1px 2px rgba(255, 255, 255, 0.2);
  	color: #d4d5ee;
  	text-decoration: none;
  	text-shadow: -1px -1px 0 #7173c5;
	-moz-transition: all 250ms linear;
	-o-transition: all 250ms linear;
	-webkit-transition: all 250ms linear;
  	transition: all 250ms linear;
}
.form-button:active{
	transform: scale(0.99);
}
.footer{
	grid-area: footer;
	background: #f0f0f0f0;
}
.grid-container {
  display: grid;
  height: 100vh;
  width: 100vw;
  grid-template-areas:
    'header header header header header'
    'content content content content content'
    'footer footer footer footer footer';
 margin: 0;
 font-family: Calibri;
}
.grid-item{
	margin: 0;	
}
.form-notifications{
	opacity: 0.7;
	color: #ededf8;
	width: 2vw;
	margin: auto;
	text-align: left;
}
.empty{
	visibility: hidden;
}
.success{
	color: #b7e1c8;
}
.warning{
	color: #e1b7b7;
}
</style>
<?php
	$con = mysqli_connect("localhost","root","","projectSimple");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s \n", mysqli_connect_error());
        exit();
    }
	session_start();
	$msg = "This is a sample text";
	$status = "hidden";
	$notif_style = "";
	if(isset($_GET['rs'])){
		if($_GET['rs']==1){	
			$msg = "Username not found";
			$notif_style = "warning";
		}
		else if($_GET['rs']==2){
			$msg = "Invalid password";
			$notif_style = "warning";
		}
		else if($_GET['rs']==3){
			$msg = "Invalid user credentials";
			$notif_style = "warning";
		}
		else if($_GET['rs']==4){
			$msg = "Logged out successfully";
			$notif_style = "success";
		}
		else if($_GET['rs']==5){
			$msg = "User successfully created";
			$notif_style = "success";
		}
		else{}
		$status = "";
	}
?>
</head>
<body>
<div class="grid-container">
  <div class="grid-item header">
		<h2 class="header-content"> SIGN UP </h2>
</div>
  <form class="grid-item content" method="post" action="create_accnt.php">
			<table>
			<tr class="form-row">
			<td><label for="username">Username</label></td>
			<td><input type="text" name="username" /></td>
			</tr>
			<tr class="form-row">
			<td><label for="password">Password</label></td>
			<td><input type="password" name="password" /></td>
			</tr>
			<tr class="form-row">
			<td><label for="access">Access</label></td>
			<td>
				<select name="access">
					<option name="master" value="Master">Master</option>
					<option name="normal" value="Normal">Normal</option>
				</select>
			</td>
			</tr>
			<tr class="form-row">
				<td class="empty"></td>
				<td class="form-notifications <?php echo $notif_style?>" colspan='2' <?php echo $status?>>
					<?php echo $msg ?>
				</td>
			</tr>
			<tr class="form-row">
			<td class="empty"></td>
			<td colspan='2'><button type="submit" class='form-button'>Sign Up</button></td>
			</tr>
			
			</table>
</form>
  <div class="grid-item footer"> </div>
</div>
</body>
</html>