<?php
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
<?php
$sql = "SELECT * FROM `user_orders` WHERE user_id = '$user_id' AND status != 'Cart'";
$result = mysqli_query($conn, $sql) or die (mysqli_error($con));
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_array($result)){
?>
<h2><?php echo $rows['order_id'];?></h2>
<p>ESTIMATED DELIVERY</p>
<small>DAYS: 1-2 DAYS</small><br>
<span><?php echo $rows['status'];?></span><br><br>
<?php
    }
}else{
?>
<h4>No Order Yet :(</h4>
<?php }?>