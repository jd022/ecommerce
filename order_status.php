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
            
            <div id="status" class="my-5"></div>
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
		// setInterval(orderStatus, 5000);
	</script>
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
