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
    <link rel="shortcut icon" href="src/icon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <link rel="icon" type="image/png" href="src/img/favicon.png">
    <title>Coozy Apparel.</title>
</head>
<style>
        .order-row:hover{
            background: rgba(0, 0, 0, 0.6);
            color: white;
            cursor: pointer;
        }
    </style>
<body class="bg-maroon">
    <?php include 'includes/nav.php';?>
    <main class="container">
        <div class="card mt-5" style="border:none; border-radius: 0; height: 80%;">
            <div class="card-header px-5 pt-4 pb-2" style="background: none; border: none; border-bottom: 2px solid black;">
                <p class="h4 mb-0" style="font-family: var(--sanchez);">ORDER HISTORY</p>
                <hr class="featurette-divider m-0 mb-2" style="opacity:1; width: 4vw; background: black; border: 1px solid gray;">
            </div>
            <div class="container p-5">
                <div class="row">
                <?php
                $get_order_history = "SELECT * FROM `user_orders` WHERE user_id = '$user_id' AND status = 'Delivered'";
                $query_order_history = mysqli_query($conn, $get_order_history) or die (mysqli_error($conn));
                if(mysqli_num_rows($query_order_history) > 0){
                    while($rows = mysqli_fetch_array($query_order_history)){
                ?>
                    <div class="col-lg-6 order-row py-4 order" data-id="<?php echo $rows['order_id'];?>" data-bs-toggle='modal' data-bs-target='#orders'>
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="../ecommerce/src/img/coozy.jpg" class="d-flex w-100" alt="Coozy">
                            </div>
                            <div class="col-lg-5">
                                <p class="h3"><?php echo $rows['order_id'];?></p>
                                <p class="m-0 small">DATE DELIVERED:</p>
                                <p class="m-0 small"><small><?php echo date("F d, Y", strtotime($rows['date_time_updated']));?></small></p>
                                <p class="m-0 h6 mt-2">STATUS: <span> <?php echo strtoupper($rows['status']);?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }else{
                ?>
                <h4>No Order Yet :(</h4>
                <?php }?>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="orders" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card" style="border-radius:0;">
                <div class="modal-header" style="border:none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="color:red; border-radius: 50%;" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.order').click(function(){
            var order = $(this).data('id');
            $.ajax({
                url: 'orderview.modal.php',
                type: 'post',
                data: {order: order},
                success: function(response){
                    $('.modal-body').html(response);
                    $('#orders').modal('show');
                }
            });
        });
    });
</script>
<?php include 'includes/footer.php';?>
