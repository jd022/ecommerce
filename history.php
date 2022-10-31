<?php
ob_implicit_flush(true);
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}
    $email = $_SESSION['email'];
    $select_userid = "SELECT * FROM `user` WHERE email = '$email'";
    $query_userid = mysqli_query($conn, $select_userid);
    $rows = mysqli_fetch_array($query_userid);
    $user_id = $rows['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <link rel="icon" type="image/png" href="src/img/favicon.png">
    <title>Coozy Apparel.</title>
</head>
<script>
		function orderStatus(){
	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("status").innerHTML = xhttp.responseText;
					}
				};
			xhttp.open("GET", "status.php", true);
			xhttp.send();
		}
		orderStatus();
		setInterval(orderStatus, 5000);
	</script>
<body class="bg-maroon">
    <?php include 'includes/nav.php';?>
    <main class="container">
    <div class="card mt-5 p-5 d-flex align-items-center" style="border:none; border-radius: 0; height: 80%;">
            <h1>ORDER HISTORY</h1>
            <?php
            $get_order_history = "SELECT * FROM `user_orders` WHERE user_id = '$user_id' AND status = 'Delivered'";
            $query_order_history = mysqli_query($conn, $get_order_history) or die (mysqli_error($conn));
            if(mysqli_num_rows($query_order_history) > 0){
                while($rows = mysqli_fetch_array($query_order_history)){
            ?>
            <h2><?php echo $rows['order_id'];?></h2>
            <p>DATE DELIVERED</p>
            <small><?php echo date("F d, Y", strtotime($rows['date_time_updated']));?></small><br>
            <span>STATUS: <?php echo strtoupper($rows['status']);?></span><br><br>
            <?php
                }
            }else{
            ?>
            <h4>No Order Yet :(</h4>
            <?php }?>
        </div>
    </main>
<?php include 'includes/footer.php';?>
