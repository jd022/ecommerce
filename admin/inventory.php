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
    <main class="container justify-content-center">
        <div class="card-wrapper mt-4 d-flex flex-column align-items-center" style="height: 600px; overflow: none;">
            <div class="card mb-3 mt-5" style="width: 80%; border: none; border-radius: 0;">
                <div class="row">
                    <div class="col-md-4 p-0 m-0 bg-secondary">
                        <div class="py-5 d-flex flex-column align-items-center">
                            <p class="h3" style="color: rgba(0,0,0,0.4);">DASHBOARD</p>
                            <span class="d-flex justify-content-center flex-column align-items-center">
                                    <a class="text-dark mt-3 fs-4 text-center" href="orders.php" style="text-decoration: none;">ORDERS</a>
                                    <a class="text-dark mt-3 fs-4" href="products.php" style="text-decoration: none;">PRODUCTS</a>
                                    <a class="text-dark mt-3 fs-4" href="" style="text-decoration: none;">INVENTORY</a>
                                    <a class="text-dark mt-3 fs-4" href="" style="text-decoration: none;">USERS</a>
                                </span>
                        </div>
                    </div>
                    <div class="col-md-8 py-4 px-3">
                        <h3 class="text-muted px-3">INVENTORY</h3>
                        <span class="fs-5 fw-normal d-flex justify-content-end mt-2  px-2">
                            <button class="btn btn-success px" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#add">ADD NEW ITEM</button>
                            <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="border-radius:0;">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <!-- content goes here -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </span>
                        <hr>
                        <table class="table text-center table-hover">
                        <span class="mb-4 d-flex align-items-center justify-content-end w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="black" class="bi bi-search" viewBox="0 0 15 15">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                            <input type="text" name="" class="py-1 mx-2"placeholder="Search...">
                        </span>
                            <thead>
                                <th style="font-weight: 500;">ITEM ID</th>
                                <th style="font-weight: 500;">NAME</th> 
                                <th style="font-weight: 500;">DATE ADDED</th>
                                <th style="font-weight: 500;">OPERATION</th>
                            </thead>
                            <tbody>
                                <tr style="cursor:pointer;" class="inventory" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#inventory">
                                    <td>84562983</td>
                                    <td>Melt Tee</td>
                                    <td>November 30, -0001 12:00:00 AM</td>
                                    <td style="z-index: 11111;">
                                        <button class="btn btn-success btn-sm inventory" href="#" style="border-radius: 0;" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#inventory">EDIT</button>
                                        <button class="btn btn-danger btn-sm" href="#" style="border-radius: 0;">REMOVE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="inventory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            $('.inventory').click(function(){
                var inventory = $(this).data('id');
                // eto yung ipapasa sa inventory.modal.php 
                $.ajax({
                    url: 'inventory.modal.php',
                    type: 'post',
                    data: {inventory: inventory},
                    success: function(response){
                        $('.modal-body').html(response);
                        $('#inventory').modal('show');
                    }
                })
            });
        });
    </script>
</body>
</html>

<!-- Note: gawa ka ng file na inventory.modal.php para sa query nung modal isama mo agad yung $_POST['inventory'] // see line 138 -->
