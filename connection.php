<?php
$conn = new mysqli('localhost', 'root' , '' , 'ecommerce');

if($conn == false) {
    echo "error" . $conn->error;
}
?>