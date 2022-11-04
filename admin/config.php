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
<?php

    // accept to deliver script
    if(isset($_GET['a']) && isset($_GET['td']) && isset($_GET['oid'])){
        date_default_timezone_set('Asia/Manila');
        $date_time_updated = date('Y-m-d H:i:s');
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        $options = 0;
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';

        // Store the decryption key
        $decryption_key = "TeamAgnat";

        // Use openssl_decrypt() function to decrypt the data
        $decryption_oid = openssl_decrypt ($_GET['oid'], $ciphering,
        $decryption_key, $options, $decryption_iv);

        $status = 'Done';

        $sql_pending_stat = "UPDATE `user_orders` SET status = '$status', date_time_updated = '$date_time_updated'
        WHERE order_id = '$decryption_oid'";
        $query_pending_stat = mysqli_query($conn, $sql_pending_stat);
        if($query_pending_stat == true){
            echo "<script>alert('You confirmed the ORDER ID: $decryption_oid');
            window.location.href='orders.php'</script>";
            exit();
        }else{
            echo "<script>alert('Something went wrong');
            window.location.href='orders.php'</script>";
            exit();
        }
    }

    // accept confirm script
    if(isset($_GET['a']) && isset($_GET['c']) && isset($_GET['oid'])){
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        $options = 0;
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';

        // Store the decryption key
        $decryption_key = "TeamAgnat";

        // Use openssl_decrypt() function to decrypt the data
        $decryption_oid = openssl_decrypt ($_GET['oid'], $ciphering,
        $decryption_key, $options, $decryption_iv);

        $status = 'To Deliver';

        $sql_pending_stat = "UPDATE `user_orders` SET status = '$status'
        WHERE order_id = '$decryption_oid'";
        $query_pending_stat = mysqli_query($conn, $sql_pending_stat);
        if($query_pending_stat == true){
            echo "<script>alert('You confirmed the ORDER ID: $decryption_oid');
            window.location.href='orders.php'</script>";
            exit();
        }else{
            echo "<script>alert('Something went wrong');
            window.location.href='orders.php'</script>";
            exit();
        }
    }

    // accept pending script
    if(isset($_GET['a']) && isset($_GET['p']) && isset($_GET['oid'])){
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        $options = 0;
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';

        // Store the decryption key
        $decryption_key = "TeamAgnat";

        // Use openssl_decrypt() function to decrypt the data
        $decryption_oid = openssl_decrypt ($_GET['oid'], $ciphering,
        $decryption_key, $options, $decryption_iv);

        $status = 'Confirm';

        $sql_pending_stat = "UPDATE `user_orders` SET status = '$status'
        WHERE order_id = '$decryption_oid'";
        $query_pending_stat = mysqli_query($conn, $sql_pending_stat);
        if($query_pending_stat == true){
            echo "<script>alert('You confirmed the ORDER ID: $decryption_oid');
            window.location.href='orders.php'</script>";
            exit();
        }else{
            echo "<script>alert('Something went wrong');
            window.location.href='orders.php'</script>";
            exit();
        }
    }
    
    // reject script
    if(isset($_GET['r']) && isset($_GET['oid'])){
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        $options = 0;
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';

        // Store the decryption key
        $decryption_key = "TeamAgnat";

        // Use openssl_decrypt() function to decrypt the data
        $decryption_oid = openssl_decrypt ($_GET['oid'], $ciphering,
        $decryption_key, $options, $decryption_iv);

        $delete_order_id = "DELETE FROM `user_orders` WHERE order_id = '$decryption_oid'";
        $query_delete_order = mysqli_query($conn, $delete_order_id);
        if($query_delete_order == true){
            echo "<script>alert('You reject the ORDER ID: $decryption_oid');
            window.location.href='orders.php'</script>";
            exit();
        }else{
            echo "<script>alert('Something went wrong');
            window.location.href='orders.php'</script>";
            exit();
        }
    }
?>