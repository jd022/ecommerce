<?php
ob_implicit_flush(true);
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:login.php");
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
    <title>Coozy Apparel.</title>
</head>
<style>
    p{
        font-family: var(--sanchez);
    }
</style>
<body class="bg-maroon">

    <?php include 'includes/nav.php';?>
    <main class="container">
        <div class="card mt-5" style="border:none; border-radius: 0; height: 80%;">
            <div class="card-header px-5 pt-4 pb-2" style="background: none; border: none; border-bottom: 2px solid black;">
                <p class="h4 mb-0" style="font-family: var(--sanchez);">ORDER DETAILS</p>
                <hr class="featurette-divider m-0 mb-2" style="opacity:1; width: 4vw; background: black; border: 1px solid gray;">
            </div>
            <div class="container mx-5 px-5 pt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <span class="d-flex flex-column">
                            <span class="h4 m-0 p-0" style="font-family: var(--sanchez);"><?php echo strtoupper($rows['first_name']) . " " . strtoupper($rows['last_name']);?></span>
                            <span><?php echo $rows['email'];?></span>
                        </span>
                    </div>
                    <div class="col-lg-6 text-center">
                        <span><?php echo ucwords($rows['address']);?></span>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider mb-2" style="background: black; border: 1px solid gray;">
            
            <div id="status" class="my-5"></div>
        </div>
    </main>
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
<?php include 'includes/footer.php';?>
