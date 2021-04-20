
<html>
<head>
	<title>SPARKS </title>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit=no>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<?php
	session_start();
	include 'conn.php';
?>
<style>
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
	color: indigo;
	font-size: 20px;
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


.m1{
	background-color: indigo;
	width: 400px;
	margin-left: auto;
	margin-right:auto;
	margin-top: 250px;
	padding: 30px;
	font-size: 25px;
	height: 300px;	
	color: white;
	border-radius: 12px;
}

.viewbtns{
	margin-left: 90px;
	background-color:white;
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
	background-color: black;
	width: 200px;
	color: white;
	border-radius: 12px;
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
	background-color:white;
	border :1.5px solid #ccc;
	color: indigo;
	font-size: 16px;
	margin-top: auto;
	height: 40;
	border-radius: 12px;
    text-align: center;
  	cursor: pointer;
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
		color: green;
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
					<li><a href="index.php">HOME</a></li>
					<li><a href="viewnew.php">VIEW</a></li>
					<li><a href="">TRANSACTION HISTORY</a></li>
				</ul>
			</nav>
			<img src="menu.png" class="menu-icon" onclick="togglemenu()">
		</div>
	</div>
<?php
	
	
		$id = $_GET['id'];
		$_SESSION['id'] = $id;
		$query = "SELECT * FROM db  where id='$id' ";
		$query_run = mysqli_query($conn,$query);

		if(mysqli_num_rows($query_run)>0){
			foreach($query_run as $row){
				

  				
  echo '<div class="m1" >';

  

					echo '<h5> ID: '.$row['id'].' </h5>
					<h5> NAME: '.$row['name'].' </h5>
					<h5> EMAIL: '.$row['email'].' </h5>
					<h5> BALANCE: '.$row['balance'].' </h5>

				';


			}
			
			
			
		}
		else{
			echo "<h5>no record found</h5";
		}
	

?>


<td ><button  class="viewbtns"><a style='color:indigo; text-decoration: none;' href="transfer.php?name=<?php echo $row['name']; ?>"> transfer </a>  </button></td>

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


