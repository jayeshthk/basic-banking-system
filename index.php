<!DOCTYPE html>
<html>
<head>
	<title>SPARKS </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit="no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<style>
	body{
	background-color: black ;
	overflow: hidden;
}
.container{
	width: 100%;
	min-height: 100vh;
	padding-left: 8%;
	padding-right: 8%;
	box-sizing: border-box;
	overflow: hidden;
}
.navbar{
	width: 100%;
	display: flex;
	align-items: center;
}
.menu-icon{
	width: 25px;
	cursor: pointer;
	display: none;
}
nav{
	flex: 1;
	text-align: right;
}
nav ul li{
	list-style: none;
	display: inline-block;
	margin-right: 30px;
} 
nav ul li a{
	text-decoration: none;
	color: white;
	font-size: 20px;
}
.row{
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin: 100px 0;
}
.col-1{
	flex-basis: 40%;
	position: relative;
	margin-left: 50px;
}
.col-1 h2{
	font-size: 54px;
	color: white;
}
.col-1 h3{
	font-size: 30px;
	color: white;
	font-weight: 100;
	margin: 20px 0 10px;
}
button{
	width: 140px;
	border: 0;
	padding: 12px 10px;
	outline: none;
	cursor: pointer;
	border-radius: 6px;
}


@media only screen and (max-width:700px){
	
	.col-1 h2{
	font-size: 40px;
}
	nav ul{
		width: 100%;
		background-color: black;
		position: absolute;
		top: 75px;
		right: 0;
		z-index: 2;
	}
	nav ul li{
		display: block;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	nav ul li a{
		color: indigo;
		font-size: 10px;
	}
	.menu-icon{
		display: block;

	}
	#menulist{
		overflow: hidden;
		transition: 0.5s;
	}



}
</style>
	<div class="container">
		<div class="navbar">
			<nav>
				<ul id="menulist">
					<li><a href="index.php">HOME</a></li>
					<li><a href="viewnew.php">VIEW</a></li>
					<li><a href="inserting.php">TRANSACTION HISTORY</a></li>
				</ul>
			</nav>
			<img src="menu.png" class="menu-icon" onclick="togglemenu()">
		</div>
		
		<div class="row">
			<div class="col-1">
				<h2>BASIC BANKING SYSTEM</h2>
				<h3>SPARK FOUNDATION</h3>
				
			</div>
		</div>
	</div>

<script>
	var menuList = document.getElementById("menulist");
	menuList.style.maxHeight = "0px";
	function togglemenu(){
		if(menuList.style.maxHeight == "0px"){
			menuList.style.maxHeight = "130px";
		}
		else{
			menuList.style.maxHeight = "0px";
		}
	}
</script>	
</body>
</html>
