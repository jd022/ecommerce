<?php
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
<?php
$sql = "SELECT * FROM `user_orders` WHERE user_id = '$user_id' AND status != 'Cart'";
$result = mysqli_query($conn, $sql) or die (mysqli_error($con));
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_array($result)){
?>
<div class="container px-5 mx-5 mb-4">
    <div class="row">
        <span class="col-lg-6">
            <p class="h3 m-0 p-0"><?php echo $rows['order_id'];?></p>
            <p class="text-muted small p-0 m-0" style="font-size: 12px;">ESTIMATED DELIVERY</p>
            <p class="text-muted small p-0 m-0">DAYS: 1-2 DAYS</p>
        </span>
        <span class="col-lg-6 d-flex align-items-end justify-content-center">
            <?php 
            if($rows['status'] == 'Pending'){
                ?>
                <span class="h2 text-warning"><?php echo $rows['status'];?></span>
                <?php
            }else{
                ?>
                <span class="h2 text-success"><?php echo $rows['status'];?></span>
                <?php
            }
            ?>
        </span>
    </div>
</div>

<?php
    }
}else{
?>
<div class="container my-5 text-center">
<svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-emoji-frown mb-3" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
</svg>
<p class="display-5 my-5">NO ORDER YET</p>
</div>
<?php }?>