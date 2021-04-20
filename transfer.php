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
		.form-group{
			width: 300px;
		
			background-color: indigo;
			width: 500px;
			color: white;
			border-radius: 12px;
			margin-left: auto;
			margin-right:auto;
			margin-top: 250px;
			padding: 30px;
			font-size: 25px;
			height: 450px;	
		}
		@media only screen and (max-width:700px){
		.form-group{
		background-color: indigo;
		width: 200px;
		border-radius: 12px;
		color: white;
		margin-left: auto;
		margin-right:auto;
		margin-top: 50%;
		width: 300px;
		padding: 30px;
		font-size: 20px;
		height: 400px;	
	}
	</style>
	<?php
include 'conn.php';
session_start();




if (isset($_POST['submit'])){
$sender = $_SESSION['name'];
$receiver = $_POST['namess'];
$amount = $_POST['amount'];
$balance1 = $_SESSION['balance'];
if($amount==""){
	echo '<script> alert("enter something");</script>';

}

elseif($amount>$balance1 OR !is_numeric($amount)){ 
	
echo '
<script>

	alert("insufficient balance or enter valid amount");
</script>';

}
elseif($amount!="" AND $amount<=$balance1 ){
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


       <?php
	include 'conn.php';
	
	
		$name = $_GET['name'];
		$_SESSION['name'] = $name;
		
		
		?>
		<form method="POST"   >
  <div class="form-group">
    <label >SENDER</label><br>
    <label><?php echo $_SESSION['name'] ?></label>
    <br>
  
  
    <label for="receiver">RECEIVER</label>
    <select class="form-control" id="receiver" name="namess">
   <?php
    $sql = "SELECT name FROM db where name!='".$_SESSION['name']."' ";
	$result = mysqli_query($conn,$sql);
	while($rows = $result->fetch_assoc()){
		$names = $rows['name'];
		echo "<option value='$names'>$names</option>";
	}
    ?>
    </select>
  	<br>

  
    <label for="amount">AMOUNT</label>
    <input type="text" class="form-control" autocomplete=off id="amount" name="amount"  placeholder="Enter amount">
   <br>
  <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
  <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
  </div>
</form>
<?php 


?>
<?php 
		$query = "SELECT balance FROM db where name='".$_SESSION['name']."' ";
		$query_run = mysqli_query($conn,$query);

		if(mysqli_num_rows($query_run)>0){
			foreach($query_run as $row){
				
					
					$_SESSION['balance']=$row['balance'];
			}
		}
?>
 					
   
</body>
</html>
