<!DOCTYPE html>
<html>
<head>

<script src="js/jquery-3.5.1-min.js"></script>
<script src="js/tableHTMLExport.js"></script>
<style>
body{
	margin:0;
	padding:0;
	font-family: Calibri;
}
h1,h2,h3,h4,h5,h6{ 
	margin: 0; padding: 0.25em;
}
ul{ 
	list-style: none; 
}
.no-color{
	background:#9395d3;
}
.header{
	position:fixed;
	top: 0;
	width: 100%;
	height: 10vh;
	grid-area: 1 / 1 / 2 / 11;
	background: #5558b4;
	display:grid;
	grid-template-columns:auto auto auto auto auto auto auto auto auto auto;
	grid-template-rows: auto;
	justify-items:center;
	align-items:center;
}
.header-item {
	border: 3px 0 0 0 solid white;
	background:transparent;
	list-style:none;
}
.header-item a {
	position: relative;
  	display: block;
  	text-transform: uppercase;
  	padding: 10px 20px;
  	text-decoration: none;
  	color: #fbf9ff;
  	font-family: sans-serif;
  	font-size: 18px;
  	font-weight: 600;
  	transition: .5s;
	z-index:1;
}
.header-item a:before {
	content: '';
  	position: absolute;
  	top: 0;
  	left: 0;
  	width: 100%;
  	height: 100%;
  	border-top: 2px solid #fbf9ff;
  	border-bottom: 2px solid #fbf9ff;
  	transform: scaleY(2);
  	opacity: 0;
  	transition: .3s;
	
}
.header-item a:after {
	content: '';
  	position: absolute;
  	top: 2px;
  	left: 0;
  	width: 100%;
  	height: 100%;
  	background-color: #fbf9ff;
  	transform: scale(0);
 	opacity: 0;
  	transition: .3s;
  	z-index: -1;
}
.header-item a:hover {
	color: #5558b4;
}
.header-item a:hover:before {
	transform: scaleY(1);
  	opacity: 1;
}
.header-item a:hover:after {
	transform: scaleY(1);
  	opacity: 1;
}
.header-logo{
	position:relative;
	left:250%;
	top:0;
	color:white;
	font-family: sans-serif;
}
.col-left{
	grid-area: 1 / 1 / 11 / 2;
	background: #fbf9ff;
	margin:0;
	padding:0;
}
.col-left ul{
	padding: 0;
	list-style-type: none;
}
.col-left-title{
	color: #5558b4;
	margin-left:10%;
	margin-top:10%;
	
}
.col-left-item{
	width:100%;
}
.col-left-item a{
	display:block;
	padding: 10px 0px;
	color:black;
	text-align: center;
	background: linear-gradient(to right, #fbf9ff 50%, #9395d3 50%);
    	background-size: 200% 100%;
    	background-position:left bottom;
    	transition:all 2s ease;
	font-size: 1.5em;
	font-weight: 600;
	text-decoration: none;
	transition: .25s;
	z-index: -1;
}
.col-left-item a:hover{
	color: #fbf9ff;
	background-position:right bottom;
}
.col-center{
	height:100%;
	grid-area: 1 / 2 / 11 / 9;
	background: #9395d3;
	text-align: center;
	color: #fbf9ff;
}
.col-center-item{
	margin:1em;
}
.col-right{
	grid-area: 1 / 9 / 11 / 11;
}
.grid-container{
	padding:0;
	display: grid;
	margin-top: 10vh;
	grid-template-rows: 1fr fit-content(20%);
	grid-template-columns:repeat(auto-fit, minmax(100px, 1fr));
	height: 90vh;
	width: 100vw;
}
.totals, .totals-price{
	text-transform: uppercase;
	font-size: 1.5em;
}
.btn-gradient-green{
	background: #FBF33C;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(45deg, #119DA4, #04B46D ,  #FBF33C);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(45deg, #119DA4, #04B46D ,  #FBF33C);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	 padding: 0.5em;
            border-radius: 10px;
            border: none;
            color: white;
	font-size: 1em;
	font-weight: 600;
}
.btn-gradient-orange{
            background: #FFC700;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(45deg, #FF1F01,#FD5D1B , #FFC700);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(45deg, #FF1F01,#FD5D1B ,  #FFC700);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            padding: 0.5em;
            border-radius: 10px;
            border: none;
            color: white;
	font-size: 1em;
	font-weight: 600;
}
.btn-tertiary{
	background: transparent;
	border: 3px solid white;
	color: white;
	border-radius: 10px;
	font-size:1em;
	font-weight:600;
	padding:0.5em;
}
.btn-wrapper{
	padding: 5px;
	margin-right:0px;
}
.btn-wrapper button{
	width: 180px;
}
.btn-wrapper-green button:hover{
	box-shadow: 0px 0px 0px 3px #04B46D;
	background: white;
	color: #04B46D;
	transition: all 250ms linear;
}
.btn-wrapper-orange button:hover{
	background: white;
	color: #FD5D1B;
	transition: all 250ms linear;
}
.btn-wrapper-tertiary button:hover{
	background: white;
	color: #5558b4;
	transition: all 250ms linear;
}
.btn-wrapper button:hover{
	transform: scale(1.08);
}
.btn-wrapper button:active{
	outline: none;
	transform: scale(0.92);
	transition: all 100ms linear;
}
.btn-wrapper button:focus{
	outline: none;
}

.table-striped{
	border-collapse: collapse;
	width:100%;
}
.table-striped td{
	padding: 10px;
}
.table-striped tr:nth-child(odd){
	background: white;
	color: #5558b4;
}
.table-striped tr:nth-child(even){
	background: #ADAFED;
	color: #fbf9ff;
}
.table {
	width: 70%;
	position: relative;
	margin:auto;
	border-collapse:collapse;
}
.tbody {
  height: 200px;
  overflow: scroll;
}

.row {
  display: grid;
  grid-auto-rows: min-content;
  grid-auto-columns: min-content;
  grid-template-columns: repeat(auto-fit, minmax(1px, 1fr));
  font: Verdana;
  font-size: 20px;
  margin-right:1px;
}

.tbody > .row {
	padding: 5px;
}

.thead > .row > div {
  font-weight: bold;
  background: #6062a0;
  padding: 10px;
}
input{
	text-align: center;
	margin:auto;
	font-weight: 600;
	font-size: 1em;
	border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden;
    border-bottom-style: hidden;
	border-radius: 0.1em;
}
.number{
	width:20%;
}
.tbody > .row:nth-child(odd) > div > input {
  background:transparent;
  color:white;
  
}
.tbody > .row:nth-child(odd) > div > input:active {
  background:transparent;
  color:white;
  outline:none;
  box-shadow: -1px 0px white;
}
.thead > .row{
	margin-top: 0px;
	margin-bottom: 0px;
}
.tbody .row:nth-child(even){
	background: white;
	color: #5558b4;
}
.finished-title{
	padding: 20px; 
	color: white; 
	background: #FBF33C;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(45deg, #119DA4, #04B46D ,  #FBF33C);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(45deg, #119DA4, #04B46D ,  #FBF33C);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
#cash{
	text-align: center;
	padding: 5px;
	font-size:15px;
}
<?php
	$con = mysqli_connect("localhost","root","","projectSimple");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s \n", mysqli_connect_error());
        exit();
	}
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
	session_start();
?>
</style>
</head>
<body>
<div class="grid-container">
	<nav class='header'>
		<li class="header-item"><a href="#" class="search">Search</a></li>
		<li class="header-item">
			<form method="post" action="new_cart.php">
			<a href="#" class="new-cart" onclick="show()">New Cart</a>
		</li>
		<li class="header-item"><a href="#">Finished</a></li>
		<li class="header-item header-logo"><a href="logout.php"><h4>Logout</h4></a></li>
	</nav>

	<div class="col-left">
		<h3 class="col-left-title"> PENDING </h3>
		
		
		<ul>
		<?php
			$sql = "SELECT * FROM carts";
			$query = mysqli_query($con,$sql);
			while($result = mysqli_fetch_assoc($query)){
				echo '<li class="col-left-item"><a href="master.php?ci='.$result['id'].
				'" >'.$result['cart_name'].'</a></li>';
			}
		?>
		</ul>
	</div>
	<div class="col-center">
		<div class="col-center-item">
		<h1> Cart <?php if(isset($_GET['ci'])){ echo $_GET['ci'];} ?></h1>
		</ul>
		<label for="name">Name of Buyer: </label>
		<h3 style="display: inline;">Juan Dela C. Cruz</h3>
		</div>
		<div class="col-center-item table">
		
  			<div class="thead">
   			 	<div class="row">
     			 	<div>Particulars</div>
      				<div>Quantity</div>
      				<div class="amount">Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
   			 	</div>
  			</div>
  			<div class="tbody">
    				<div class="row">
					<div>
					<input list="foods" name="food" id="food">
						<datalist id="foods">
						<?php
						$sql = "SELECT * FROM items";
						$query = mysqli_query($con,$sql);
						$result = mysqli_fetch_assoc($query);
						
						if(mysqli_num_rows($query) > 0){
							echo '<option value="'.$result['item_name'].'">'.$result['item_name'].'</option>';
						}
						else{
						}
						?>
						</datalist>
					</li>
				</div>
      				<div><input type="number" class="number"></div>
      				<div>150.00</div>
    				</div>

    				<div class="row">
      				<div>
					<input list="foods" name="food" id="food">
					<datalist id="foods">
					<option value="Fried Chicken"> Fried Chicken </option>
					<option value="Halo-halo"> Halo-halo </option>
					<option value="Kare-kare"> Kare-kare </option>
					<option value="Rice"> Rice </option>
					</datalist>
				</div>
      				<div>14</div>
      				<div>150.00</div>
    				</div>

  				
  			</div>
			<div class="thead">
				<div class="row">
     			 	<div>Total</div>
				<div id="total">650.50</div>
      				<div class="btn-wrapper btn-wrapper-tertiary"><button class="btn btn-tertiary" onclick=addChild()>Add item</button></div>
   			 	</div>

				<div class="row">
     			 	<div>Cash on hand</div>
				<div ><input type="number" id="cash" value="0.00"/></div>
      				<div class="btn-wrapper btn-wrapper-orange"><button class="btn btn-gradient-orange" onclick=compute()>Compute</button></div>
   			 	</div>

				<div class="row">
     			 	<div>Change</div>
				<div id="change"></div>
      				<div class="btn-wrapper btn-wrapper-green"><button type="submit" class="btn btn-gradient-green">Submit</button></div>
   			 	</div>
			</div>
			
		</div>
			
	</div>
	<div class="col-right">
		<h3 class="finished-title"> Finished Carts</h3>
		<table class='table-striped'>
			<tbody>
				<tr>
					<td> Cart 1 </td>
					<td> March 3, 2020 </td>
					<td> 12:30 PM </td>
				</tr>
				<tr>
					<td> Cart 2 </td>
					<td> March 3, 2020 </td>
					<td> 12:35 PM </td>
				</tr>
				<tr>
					<td> Cart 3 </td>
					<td> March 3, 2020 </td>
					<td> 12:45 PM </td>
				</tr>
			</tbody>
		<table>
		<div class="btn-wrapper btn-wrapper-green"><button type="submit" class="btn btn-gradient-green" id="exportBtn">Export to Excel</button></div>
	</div>
</div>

</body>
<!--JQuery-->
<script>
	function compute(){
		var total = Number(document.getElementById("total").innerHTML);
		var cash = Number(document.getElementById("cash").value);
		var change =  document.getElementById("change");
		var cash_left = parseFloat(cash - total);
		change.innerHTML = cash_left.toFixed(2);
	}
	function show(){
		var x = document.getElementById("myModal").showModal();
		var body = document.getElementByClass("grid-container");
		body.blur();
	}
	function addChild(){
		var template = "<div class='row'><div><input list='foods' name='food' id='food'/><datalist id='foods'><option value='Fried Chicken'> Fried Chicken </option><option value='Halo-halo'> Halo-halo </option><option value='Kare-kare'> Kare-kare </option><option value='Rice'> Rice </option></datalist></div><div><input type='number' class='number'></div><div>150.00</div></div>";
		document.getElementsByClassName("tbody").innerHTML = tbody.innerHTML + template.innerHTML;
	}

	$(document).ready(function(){
   $("#exportBtn").click(function(){  
     $(".table-striped").tableHTMLExport({
      type:'csv',
      filename:'finished_carts.csv',
    });
  });
});
</script>
</html>
