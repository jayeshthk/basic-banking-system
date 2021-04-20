<html>
<head>
	<title>SPARKS </title>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit=no>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php
include 'conn.php';
session_start();
if (isset($_POST['submit'])){
$sender = $_SESSION['name'];
$receiver = $_POST['namess'];
$amount = $_POST['amount'];
$balance = $_SESSION['balance'];
if($amount>$balance){ 
?>
<script>

	alert('insufficient balance');
</script>
<?php
}
else{
$reg = "INSERT INTO transfer(sender,receiver,amount) values('$sender','$receiver',$amount  )";
mysqli_query($conn,$reg);
$up1 = "UPDATE views SET balance = balance-$amount WHERE name='$sender'";
mysqli_query($conn,$up1);
$up1 = "UPDATE views SET balance = balance+$amount WHERE name='$receiver'";
mysqli_query($conn,$up1);
?>
<script>
alert("registration successfull");

</script>
<?php

}

}



if (isset($_POST['cancel'])){

	header('location:viewnew.php');
}
?>




<body>
	<style>
		#error{
	margin-right: auto;
	margin-left: auto;
	width: 50%;
	padding: 0px;
	background: red;
	text-align: center;
	font-size: 14px;
	
	color: white;
}
.alert alert-primary{
	text-align: center;
}
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
	background-color:red;
	border :1.5px solid #ccc;
	margin-top: 40px;
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
	width: 300px;
	padding: 30px;
	font-size: 20px;
	height: 250px;	
}
.viewbtns{
	margin-left: auto;
	background-color:black;
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

</style>
	<div class="container1">
		<div class="navbar">
			<nav>
				<ul id="menulist">
					<li><a href="index.php" style='text-decoration: none;'>HOME</a></li>
					<li><a href="viewnew.php" style='text-decoration: none;'>VIEW</a></li>
					<li><a href="" style=' text-decoration: none;'>TRANSACTION HISTORY</a></li>
				</ul>
			</nav>
			<img src="menu.png" class="menu-icon" onclick="togglemenu()">
		</div>
	</div>
	
	<?php
		include 'conn.php';

		$q = "select * from transfer";

		$query_run = mysqli_query($conn,$q);

		if(mysqli_num_rows($query_run)>0){
			 echo '<div class="container">
	<div class="col-lg-12">
		<table class="table table-striped table-hover table-bordered">
			<tr style="background-color: indigo; color:white;">
				
				<th>Name</th>
				<th>Email</th>
				<th>Balance</th>
				

			</tr>';
			foreach($query_run as $row){


	?>
			<tr>
				
				<td><?php echo $row['sender']; ?></td>
				<td><?php echo $row['receiver']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				
				
				
			</tr>
	<?php	
		}
	}
	else{
		echo '<div class="alert alert-primary" role="alert">
  THERE IS NO TRANSACTION DONE YET!!!
</div>';
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

