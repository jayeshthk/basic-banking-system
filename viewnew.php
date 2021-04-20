<html>
<head>
	<title>SPARKS </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit=no>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<style>
	.container1{
	width: 100%;
	min-height: 7.5vh;
	padding-left: 8%;
	padding-right: 8%;
	box-sizing: border-box;
	
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
	color: indigo;
	font-size: 20px;
}

.m1{
	background-color: rgb(0,0,0,0.5);
	width: 400px;
	margin-left: auto;
	margin-right:auto;
	margin-top: 250px;
	padding: 30px;
	font-size: 25px;
	height: 300px;	
}

.viewbtns{
	margin-left: 90px;
	background-color:blue;
	border :1.5px solid #ccc;
	
	font-size: 16px;
	width: 150;
	height: 40;
	border-radius: 12px;
  text-align: center;
  cursor: pointer;
}


@media only screen and (max-width:700px){
	
	.m1{
	background-color: rgb(0,0,0,0.5);
	width: 200px;
	margin-left: auto;
	margin-right:auto;
	margin-bottom: 20px;
	width: 200px;
	padding: 30px;
	font-size: 20px;
	height: 240px;	
}
.viewbtns{
	margin-left: auto;
	background-color:blue;
	border :1.5px solid #ccc;
	
	font-size: 16px;
	margin-top: auto;
	height: 40;
	border-radius: 12px;
    text-align: center;
  	cursor: pointer;
}
	nav ul{
		width: 100%;
		background-color: indigo;
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
		color: white;
		font-size: 10px;
	}
	.menu-icon{
		display: block;
	}
	#menulist{
		overflow: hidden;
		transition: 0.5s;
	}
	.container1{
		width: 100%;
		min-height: 7.5vh;
	}



}




}
</style>
	<div class="container1">
		<div class="navbar">
			<nav>
				<ul id="menulist">
					<li><a href="index.php" style=' text-decoration: none;'>HOME</a></li>
					<li><a href="viewnew.php" style='text-decoration: none;'>VIEW</a></li>
					<li><a href="inserting.php" style=' text-decoration: none;'>TRANSACTION HISTORY</a></li>
				</ul>
			</nav>
			<img src="menu.png" class="menu-icon" onclick="togglemenu()">
		</div>
	</div>
	

	<div class="container">
	<div class="col-lg-12">
		<table class="table table-striped table-hover table-bordered">
			<tr style='background-color: indigo; color:white;'>
				<th>Sr no.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Balance</th>
				<th>Action</th>

			</tr>
	<?php
		include 'conn.php';

		$q = "select * from db";

		$query_run = mysqli_query($conn,$q);

		if(mysqli_num_rows($query_run)>0){
			foreach($query_run as $row){


	?>
			<tr>
				<td class="custid"><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['balance']; ?></td>
				
				<td ><button style='background-color: indigo; color:white;' class="viewbtn" name="checking_viewbtn"><a style='color:white; text-decoration: none;' href="viewdetailnew.php?id=<?php echo $row['id']; ?>"> View </a>  </button></td>
				
			</tr>
	<?php	
		}
	}
	?>
		</table>
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
