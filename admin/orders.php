<?php
include ("../connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:login.php");
    exit();
}else{
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../src/icon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="stylesheet" href="../bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Coozy Apparel</title>
</head> 
<style>
    @media screen and (width: 992) {
        .card-wrapper{
            width: 100%;
        }
    }
    .row-divider{
        border: 1px solid black;
        background: black;
        height: 100%;
    }
</style>
<body class="bg-maroon">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../src/img/logo.png" width="150" alt="" sizes="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 20px;">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SALES</a>
                    </li>
                    <li class="nav-item dropdown align-items-center d-flex">
                        <a class="nav-link py-0" href="#" id="navbarDropdown" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../logout.php">Logout</a>
                        </div>
                        <!-- Temporary nav item -->
                    </li>
                </ul>   
            </div>
        </div>
    </nav>
    <main class="container">
        <div class="card-wrapper mt-4 d-flex flex-column align-items-center" style="height: 600px; overflow: none;">
            <div class="card mb-2 mt-5 w-75" style="border: none; border-radius: 0;">
                <div class="row g-0">
                    <div class="col-md-4 p-0 m-0 bg-secondary">
                        <div class="py-5 d-flex flex-column align-items-center">
                            <p class="h3" style="color: rgba(0,0,0,0.4);">DASHBOARD</p>
                                <span class="d-flex justify-content-center flex-column align-items-center">
                                    <a class="text-dark mt-3 fs-4 text-center" href="" style="text-decoration: none;">ORDERS</a>
                                    <a class="text-dark mt-3 fs-4" href="products.php" style="text-decoration: none;">PRODUCTS</a>
                                    <a class="text-dark mt-3 fs-4" href="inventory.php" style="text-decoration: none;">INVENTORY</a>
                                    <a class="text-dark mt-3 fs-4" href="" style="text-decoration: none;">USERS</a>
                                </span>
                        </div>
                    </div>
                    <div class="col-md-8 py-4 px-3">
                        <h5 class="text-muted px-3">CUSTOMER ORDERS</h5>
                        <span class="fs-5 fw-normal d-flex justify-content-evenly mt-4">
                            <a href="orders.php?p" class="text-dark" style="text-decoration: none;">PENDING</a>
                            <a href="orders.php?c" class="text-dark" style="text-decoration: none;">CONFIRMED</a>
                            <a href="orders.php?td" class="text-dark" style="text-decoration: none;">TO DELIVER</a>
                            <a href="orders.php?h"class="text-dark" style="text-decoration: none;">HISTORY</a>
                        </span>
                        <hr>
                        <span class="mb-4 d-flex align-items-center justify-content-end w-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="black" class="bi bi-search" viewBox="0 0 15 15">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                                    <input type="text" name="" class="py-1 mx-2"placeholder="Search...">
                                </span>
                        <table class="table text-center overflow-y">
                                    <?php
                                    if(isset($_GET['h'])){
                                        $get_order_history = "SELECT * FROM user_orders WHERE status = 'Done' ORDER BY date_time_created DESC";
                                        $query_order_history = mysqli_query($conn, $get_order_history);
                                        if(mysqli_num_rows($query_order_history) > 0){
                                    ?>
                                    <thead>
                                        <th style="font-weight: 500;">NO.</th>
                                        <th style="font-weight: 500;">ORDER ID</th> 
                                        <th style="font-weight: 500;">DATE OF ORDER</th>
                                    </thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                while($rows = mysqli_fetch_array($query_order_history)){
                                            ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    echo $i;
                                                    $i++;
                                                ?>
                                            </td>
                                            <td><a class="text-decoration-none color: text-black">
                                                <?php echo $rows['order_id'];?></a></td>
                                            <td>10/22/2022 10:30:31 AM</td>
                                        </tr>
                                            <?php
                                                }
                                            ?>
                                    </tbody>
                                    <?php
                                        }else{
                                            echo "<td>There is no data in table </td>";
                                        }
                                    ?>
                                    <?php 
                                    }else if(isset($_GET['td'])){
                                        $get_order_deliver = "SELECT * FROM user_orders WHERE status = 'To deliver' ORDER BY date_time_created DESC";
                                        $query_order_deliver = mysqli_query($conn, $get_order_deliver);
                                        if(mysqli_num_rows($query_order_deliver) > 0){
                                        ?>
                                    <thead>
                                        <th style="font-weight: 500;">NO.</th>
                                        <th style="font-weight: 500;">ORDER ID</th> 
                                        <th style="font-weight: 500;">DATE OF ORDER</th>
                                        <th style="font-weight: 500;">OPERATION</th>
                                    </thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                while($rows = mysqli_fetch_array($query_order_deliver)){
                                            ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    echo $i;
                                                    $i++;
                                                ?>
                                            </td>
                                            <td><a class="text-decoration-none color: text-black">
                                                <?php echo $rows['order_id'];?></a></td>
                                            <td>10/22/2022 10:30:31 AM</td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-sm" style="border-radius: 0;">ACCEPT</a>
                                                <button class="btn btn-danger btn-sm" style="border-radius: 0;">REJECT</button>
                                            </td>
                                        </tr>
                                            <?php
                                                }
                                            ?>
                                    </tbody>
                                    <?php
                                        }else{
                                            echo "<td>There is no data in table </td>";
                                        }
                                    ?>

                                    <?php 
                                    }else if(isset($_GET['c'])){
                                        $get_order_confirm = "SELECT * FROM user_orders WHERE status = 'Confirm' ORDER BY date_time_created DESC";
                                        $query_order_confirm = mysqli_query($conn, $get_order_confirm);
                                        if(mysqli_num_rows($query_order_confirm) > 0){
                                        ?>
                                    <thead>
                                        <th style="font-weight: 500;">NO.</th>
                                        <th style="font-weight: 500;">ORDER ID</th> 
                                        <th style="font-weight: 500;">DATE OF ORDER</th>
                                        <th style="font-weight: 500;">OPERATION</th>
                                    </thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                while($rows = mysqli_fetch_array($query_order_confirm)){
                                            ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    echo $i;
                                                    $i++;
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $rows['order_id'];?></a></td>
                                            <td>10/22/2022 10:30:31 AM</td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-sm" style="border-radius: 0;">ACCEPT</a>
                                                <button class="btn btn-danger btn-sm" style="border-radius: 0;">REJECT</button>
                                            </td>
                                        </tr>
                                            <?php
                                                }
                                            ?>
                                    </tbody>
                                    <?php
                                        }else{
                                            echo "<td>There is no data in table </td>";
                                        }
                                    ?>

                                    <?php }else{
                                        $get_order_pending = "SELECT * FROM user_orders WHERE status = 'Pending' ORDER BY date_time_created DESC";
                                        $query_order_pending = mysqli_query($conn, $get_order_pending);
                                        if(mysqli_num_rows($query_order_pending) > 0){?>
                                        <thead>
                                        <th style="font-weight: 500;">NO.</th>
                                        <th style="font-weight: 500;">ORDER ID</th> 
                                        <th style="font-weight: 500;">DATE OF ORDER</th>
                                        <th style="font-weight: 500;">OPERATION</th>
                                    </thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                while($rows = mysqli_fetch_array($query_order_pending)){
                                            ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    echo $i;
                                                    $i++;
                                                ?>
                                            </td>
                                            <td class="orders" data-id="<?php echo $rows['order_id'];?>" data-bs-toggle="modal" data-bs-target="#orders"><?php echo $rows['order_id'];?></td>
                                            <td>10/22/2022 10:30:31 AM</td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-sm" style="border-radius: 0;">ACCEPT</a>
                                                <button class="btn btn-danger btn-sm" style="border-radius: 0;">REJECT</button>
                                            </td>
                                        </tr>
                                            <?php
                                                }
                                            ?>
                                    </tbody>
                                    <?php
                                        }else{
                                            echo "<td>There is no data in table </td>";
                                        }
                                    ?>
                                    <?php }?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal for ORDER ID -->
    <div class="modal fade" id="orders" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius:0;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.orders').click(function(){
                var order = $(this).data('id');
                $.ajax({
                    url: 'order.modal.php',
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
</body>
</html>