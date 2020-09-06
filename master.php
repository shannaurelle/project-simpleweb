<!DOCTYPE html>
<html>
<head>

<script src="assets/js/jquery-3.5.1-min.js"></script>
<script src="assets/js/tableHTMLExport.js"></script>


<link href="assets/css/modal-styles.css" rel="stylesheet">
<link href="assets/css/master-styles.css" rel="stylesheet">
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
</head>

<body>

<div class="grid-container">

	<nav class='header'>

		<li class="header-item"><a href="search.html" class="search">Search</a></li>

		<li class="header-item">
			<form method="post" action="new_cart.php">
			<a href="#" class="new-cart" onclick="show()">New Cart</a>
			</form>
		</li>
		<li class="header-item"><a href="#" class="modal-link" data-id="myModal">Edit item</a></li>
		<li class="header-item"><a href="#" class="modal-link" data-id="add-modal">Add item</a></li>
		<li class="header-item"><a href="#" class="modal-link" data-id="finished-modal">Finished Carts</a></li>
		<li class="header-item"><a href="logout.php">Logout</a></li>
	</nav>

	<div class="col-left">
		<h3 class="col-left-title"> PENDING </h3>
		
		
		<ul>
		<?php
			$sql = "SELECT * FROM carts";
			$query = mysqli_query($con,$sql);
			while($result = mysqli_fetch_assoc($query)){
				echo '<li class="col-left-item"><a href="master.php?cart_id='.$result['id'].
				'" >'.$result['cart_name'].'</a></li>';
			}
		?>
		</ul>
	</div>
	<div class="col-center">
		<div class="col-center-item">
		<h1> Cart <?php if(isset($_GET['cart_id'])){ echo $_GET['cart_id'];} ?></h1>
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
					<input list="foods" name="food" class="food">
						<datalist id="foods">
						<?php
						$sql = "SELECT * FROM items";
						$query = mysqli_query($con,$sql);
						$result = mysqli_fetch_assoc($query);
						
						if(mysqli_num_rows($query) > 0){
							echo '<option value="'.$result['item_name'].'">'.$result['item_name'].'</option>';
						}
						else{
							echo '<option>'."no items found".'</option>';
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
					<input list="foods" name="food" class="food">
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

<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
	
	<div class="modal-content-results">

	    <img class="content-results-img" src="assets/img/Alphonso_570x520.png" width="88" height="96" />

		<div class="content-results-description">

			<h3 class="content-results-description-name">Product Name</h3>

			<p>This is a product description.</p>

			<div class="product-details">

					<span class="product-details-key">Location: 
						<span class="product-details-value">This House</span>
					</span>
					
					<span class="product-details-key">Supplier:
						<span class="product-details-value">Mango Trading</span>
					</span>
					
					<span class="product-details-key">Packaging:
						<span class="product-details-value">Box</span>
					</span>
					
					<span class="product-details-key">Stocks Available: 
						<span class="product-details-value">156</span>
					</span>
					
			</div>

		</div>

		<button class="close">CLOSE</button>

	</div>

</div>

</div>

</body>


<!--JQuery-->
<script src="assets/js/modal.js"></script>
<script type="text/javascript">
	function compute(){
		var total = Number(document.getElementById("total").innerHTML);
		var cash = Number(document.getElementById("cash").value);
		var change =  document.getElementById("change");
		var cash_left = parseFloat(cash - total);
		change.innerHTML = cash_left.toFixed(2);
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
