<?php
include ("connection.php");
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
    <link rel="shortcut icon" href="src/icon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Coozy Apparel.</title>
</head>
<style>
    .row-divider{
        border: 1px solid black;
        background: black;
        height: 100%;
    }
</style>
<body class="bg-maroon">
<?php include 'includes/nav.php';?>
    <div class="container d-flex justify-content-center">
        <div class="card px-2 mt-5 d-flex flex-row justify-content-evenly" style="border-radius: 0; width: 65em;">
            <div class="row py-4 px-3 w-50">
                <div class="col-12 justify-content-center">
                    <h3 class="p-3 m-2">ACCOUNT SETTINGS<br><hr class="featurette-divider my-0 p-0 mt-1 text-center" style="width:4.5vw; opacity: 1; background: black;border: 1px solid black;"></hr></h3>
                    <div class="row px-5">
                        <div class="col-12 mt-3 py-1 px-5">
                            <a href="settings.php" class="p-0 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">GENERAL SETTINGS</a>
                            <a href="settings.php?p" class="p-1 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">PRIVACY</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-divider"></div>
                <div class="row mt-2 py-4 w-75 px-5">
                    <?php 
                    if(isset($_GET['p'])){
                    ?>
                    <h5 class="p-3 m-0">ACCOUNT PRIVACY</h5>
                    <?php
                    $user_info = "SELECT * FROM user WHERE email = '$email'";
                    $query_user_info = mysqli_query($conn, $user_info);
                    $rows = mysqli_fetch_array($query_user_info);
                    ?>
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">PASSWORD</label>
                        <h4 style="font-size: 1.3em;">******</h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="#" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#password">EDIT</a>

                        <!-- Modal for name -->
                        <div class="modal fade" id="password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <p class="mt-3 mb-0">Current Password</p>
                                    <input type="password" name="" class="form-control">

                                    <p class="mt-3 mb-0">New Password</p>
                                    <input type="password" name="" class="form-control">

                                    <p class="mt-3 mb-0">Re-enter Password</p>
                                    <input type="password" name="" class="form-control">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </span>
                    <?php
                    }else{
                    ?>
                    <h5 class="p-3 m-0">GENERAL SETTINGS</h5>
                    <?php
                    $user_info = "SELECT * FROM user WHERE email = '$email'";
                    $query_user_info = mysqli_query($conn, $user_info);
                    $rows = mysqli_fetch_array($query_user_info);
                    ?>
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">NAME</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['first_name'] . " " . $rows['last_name'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="#" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#nameModal">EDIT</a>

                        <!-- Modal for name -->
                        <div class="modal fade" id="nameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <p class="mb-0">First Name</p>
                                    <input type="text" name="" class="form-control" value="<?= $rows['first_name']; ?>">
                                    
                                    <p class="mb-0">Last Name</p>
                                    <input type="text" name="" class="form-control" value="<?= $rows['last_name']; ?>">
                                    
                                    <p class="mt-3 mb-0">Confirm Password</p>
                                    <input type="password" name="" class="form-control">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </span>

                </div>
                <div class="col-12 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">EMAIL</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['email'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#emailModal">EDIT</a>
                        <!-- Modal for email -->
                        <div class="modal fade" id="emailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <p class="mb-0">Email</p>
                                    <input type="email" name="" class="form-control" value="<?= $rows['email']?>">
                                    <p class="mt-3 mb-0">Confirm Password</p>
                                    <input type="password" name="" class="form-control">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </span>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">HOME ADDRESS</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['address'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#addressModal">EDIT</a>
                        <!-- Modal for address -->
                        <div class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body my-5">
                                <form action="">
                                    <p class="mb-0">Address</p>
                                    <textarea name="" id="" rows="5" class="form-control" style="resize:none;"><?= $rows['address']?></textarea>
                                    <p class="mt-3 mb-0">Confirm Password</p>
                                    <input type="password" name="" class="form-control">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </span>
                </div>
                <div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    </div>
<?php include 'includes/footer.php';?>