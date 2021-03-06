<!DOCTYPE html>
<html>
<head>
<style>
body{
	margin:0;
	padding:0;
	font-family: Calibri;
	background: #f7f7f7;
}
ul{ 
	list-style: none; 
}
.no-color{
	background:#9395d3;
}
.header{
	width: 100%;
	height: auto;
	padding: 1rem;
	background: #5558b4;
	display:grid;
	grid-template-columns:repeat(10, auto);
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
	top:0;
	color:white;
	font-family: sans-serif;
}
.header-item-searchBar{
	padding: 5px;
	font-size: 15px;
	width:120%;
	z-index: 1;
	margin-right: 5rem;
}
h1,h2,h3,h4,h5,h6{ 
	margin: 0; padding: 1em;
}
.grid-container{
	height:100vh;
	display: grid;
	grid-template-rows: auto 1fr 1fr;
}
.content{	
	display: grid;
	width:100%;
	color: black;
  	grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
	grid-template-rows: auto 1fr;
	justify-items: center;
	padding: 2rem;
}
.content-gallery{
	display: grid;
	padding:2rem;
	width:100%;
	border-radius: 0.4em;
	justify-items: space-between;
}
.content-gallery-img{
	min-width:50%;
	max-width:100%;
	max-height: 100%;
	justify-self: center;
}
.content-text{
	display: grid;
	justify-items: left;
	width: 100%;
}
.content-text li{
	font-size: 2vw;
	margin-top: 1rem;
	
}
.ml-auto{
	margin-left: auto;
}
.mr-auto{
	margin-right: auto;
}
.relatedContent {
    height: auto;
    display: grid;
	padding: 1rem;
    grid-gap: 1rem;
    grid-template-columns: repeat(3, 1fr);
  }
  .visual {
    height: 100px;
    width: 100%;
  }
  .card {
    display: flex;
    flex-direction: column;
    padding: 1rem;
    justify-content: space-between;
	background-color: white;
	border-radius: 5px;
	
  }
  .card:hover{
	  box-shadow: 0px 10px 5px #dddddd;
	  transition: all 250ms linear;
  }
  .related-content h3{
	  margin: 0;
	  padding: 0;
  }
</style>
</head>
<body>
<div class="grid-container">
	<nav class='header'>
		<li class="header-item"><input type="text" name="search" class="header-item-searchBar"/></li>
		<li class="header-item"><a href="#" class="search">Search</a></li>
		<li class="header-item logout"><a href="#">Logout</a></li>
	</nav>
	<div class="content">
		<div class="content-gallery">
			<img src="img/gravity-pistol-2.jpg" class="content-gallery-img" alt="picture of a gravity pistol">
		</div>
		<div class="content-text">
			<ul>
				<li class="text-align context-text-name"><strong>Gravity Launcher</strong></li>
				<li class="text-align context-text-qty">Stock: 14 pcs</li>
				<li class="text-align context-text-price">Price per stock: 150.00</li>
				<li class="text-align context-text-description">Location: Somewhere out there</li>
			</ul>
		</div>
	</div>
	<h2 class="relatedContent-title"> Related items</h2>
	<div class="relatedContent">
			<div class="card">
			  <h3 contenteditable>Item 1</h3>
			  <p contenteditable>Medium length description with a few more words here.</p>
			  <div class="visual"></div>
			</div>
			<div class="card">
			  <h3 contenteditable>Item 2</h3>
			  <p contenteditable>Long Description. Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
			  <div class="visual"></div>
			</div>
			<div class="card yellow">
			  <h3 contenteditable>Item 3</h3>
			  <p contenteditable>Short Description.</p>
			  <div class="visual"></div>
			</div>
	</div>
</div>
</body>
<script>
</script>
</html>
