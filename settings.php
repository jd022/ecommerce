<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}else{
    $email = $_SESSION['email'];
}
 include 'includes/header.php';
 include 'includes/nav.php';?>
    <div class="container d-flex justify-content-center">
        <div class="card px-2 mt-5 d-flex flex-row justify-content-evenly" style="border-radius: 0; width: 65em;">
            <div class="row py-4 px-3 w-50">
                <div class="col-12 justify-content-center">
                    <h3 class="p-3 m-2">ACCOUNT SETTINGS<br><hr class="featurette-divider my-0 p-0 mt-1 text-center" style="width:4.5vw; opacity: 1; background: black;border: 1px solid black;"></hr></h3>
                    <div class="row px-5">
                        <div class="col-12 mt-3 py-1 px-4">
                            <a href="settings.php" class="p-0 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">GENERAL SETTINGS</a>
                            <a href="settings.php?p" class="p-0 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">PRIVACY</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-divider"></div>
                <div class="row mt-2 py-4 w-75 px-5">
                    <?php 
                    if(isset($_GET['p'])){
                    ?>
                    <h5 class="p-3 px-0 m-0">ACCOUNT PRIVACY</h5>
                    <?php
                    $user_info = "SELECT * FROM user WHERE email = '$email'";
                    $query_user_info = mysqli_query($conn, $user_info);
                    $rows = mysqli_fetch_array($query_user_info);
                    $password = preg_replace("|.|","*",$rows['password']);
                    ?>
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">PASSWORD</label>
                        <h4 style="font-size: 1.3em;"><?php echo substr($password, 0,15)?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="#" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#password">EDIT</a>

                        <!-- Modal for password -->
                        <div class="modal fade" id="password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <p class="mt-3 mb-0">Current Password</p>
                                    <input type="password" name="c_password" class="form-control">

                                    <p class="mt-3 mb-0">New Password</p>
                                    <input type="password" name="password" class="form-control">

                                    <p class="mt-3 mb-0">Re-enter Password</p>
                                    <input type="password" name="r_password" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="uPassword" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </span>
                    <?php
                    }else{
                    ?>
                    <h5 class="p-3 px-0 m-0">GENERAL SETTINGS</h5>
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
                                    
                                    <p class="mt-3 mb-0">Last Name</p>
                                    <input type="text" name="" class="form-control" value="<?= $rows['last_name']; ?>">
                                    
                                    <p class="mt-3 mb-0">Confirm Password</p>
                                    <input type="password" name="" class="form-control">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                                </form>
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                                </form>
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                                </form>
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
<?php
    if(isset($_POST['uPassword'])){
        date_default_timezone_set('Asia/Manila');
		$date_time_updated = date("Y-m-d H:i:s");

        $c_password = $_POST['c_password'];
        $password = $_POST['password'];
        $r_password = $_POST['r_password'];

        // hashed password
        $password = password_hash($password,PASSWORD_DEFAULT);
        

        if(empty($c_password) && empty($_POST['password']) && empty($r_password)){
            echo '<script>alert("Please input the required info")</script>';
            exit();
        }
        if(empty($c_password)){
            echo '<script>alert("Please input your current password")</script>';
            exit();
        }
        if(empty($_POST['password'])){
            echo '<script>alert("Please input your new password")</script>';
            exit();
        }
        if(empty($r_password)){
            echo '<script>alert("Please re-type your password")</script>';
            exit();
        }
        if(strlen($c_password) < 8 || strlen($password) < 8 || strlen($r_password) < 8){
            echo '<script>alert("Password must be greater than 8 characters")</script>';
            exit();
        }
        if($_POST['password'] != $r_password){
            echo '<script>alert("Password do not match")</script>';
            exit();
        }

        $validate_password = "SELECT * FROM `user` WHERE `email` = '$email'";
        $query_password = mysqli_query($conn, $validate_password);
        if(mysqli_num_rows($query_password) > 0){
            $row = mysqli_fetch_array($query_password);
            if(password_verify($password, $row['password'])){
            $update_password = "UPDATE `user` SET password = '$password' WHERE email = '$email'";
            $query_update_password = mysqli_query($conn, $update_password);
                if($query_update_password == true){
                echo '<script>alert("New password updated")</script>';
                exit();
                }else{
                    echo '<script>alert("Something went wrong")</script>';
                    exit();
                }
            }else{
            echo '<script>alert("Incorrect Password")</script>';
            exit();
            }
    }else{
        echo '<script>alert("Email does not exist")</script>';
        exit();
    }
}
?>