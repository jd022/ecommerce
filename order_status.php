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
    include 'includes/header.php';
    ?>
    <style>
        .order-row:hover{
            background: rgba(0, 0, 0, 0.2);
            color: black;
            cursor: pointer;
        }
    </style>
    <?php
    include 'includes/nav.php';?>
    <main class="container">
        <div class="card mt-5" style="border:none; border-radius: 0;">
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
            <hr class="featurette-divider mb-1" style="background: black; border: 1px solid gray;">
            
            <div id="status" class="my-5">
            <?php
            $email = $_SESSION['email'];
            $select_userid = "SELECT * FROM `user` WHERE email = '$email'";
            $query_userid = mysqli_query($conn, $select_userid);
            $rows = mysqli_fetch_array($query_userid);
            $user_id = $rows['user_id'];

            $sql = "SELECT distinct user_orders.order_id, user_orders.status 
            FROM user_orders WHERE user_orders.user_id = '$user_id' 
            AND NOT status = 'Cart' AND NOT status ='Done'";
            $result = mysqli_query($conn, $sql) or die (mysqli_error($con));
            if(mysqli_num_rows($result) > 0){
                while($rows = mysqli_fetch_array($result)){
            ?>

            <div class="container mb-1">
                <div class="row order-row py-2 px-3 mx-5 align-items-center order" data-id="<?php echo $rows['order_id'];?>" data-bs-toggle='modal' data-bs-target='#orders'>
                    <span class="col-lg-6 d-flex align-items-center">
                        <img src="src/img/coozy.jpg" alt="" height="100">
                        <span class="px-4">
                            <p class="h3 m-0 p-0"><?php echo $rows['order_id'];?></p>
                            <p class="text-muted small p-0 m-0" style="font-size: 12px;">ESTIMATED DELIVERY</p>
                            <p class="text-muted small p-0 m-0">DAYS: 1-2 DAYS</p>
                        </span>
                    </span>
                    <span class="col-lg-6 d-flex align-items-end justify-content-center">
                        <?php 
                        if($rows['status'] == 'Pending'){
                            ?>
                            <span class="h2 text-warning"><?php echo strtoupper($rows['status']);?></span>
                            <?php
                        }else{
                            ?>
                            <span class="h2 text-success"><?php echo strtoupper($rows['status']);?></span>
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
            </div>
        </div>
    </main>
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
            })
        });
    });
</script>
<?php include 'includes/footer.php';?>
