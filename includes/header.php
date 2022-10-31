<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="src/icon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.carousel.css">
    <!-- <link rel="stylesheet" href="OwlCarousel/dist/assets/owl-customnav.css"> -->
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.theme.default.min.css">
    <link rel="icon" type="image/png" href="src/img/favicon.png">
    <title>Coozy Apparel.</title>
</head>
<style>
    body{
        font-family: var(--sanchez);
    }
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
    .owl-carousel{
        position: relative;
    }
    .owl-nav{
        position: absolute;
        top: 30%;
        width: 100%;
        
    }
    .owl-nav .owl-prev, .owl-nav .owl-next{
        position: absolute;
        z-index: 111111;
        padding: .5em !important;
        background: rgba(0, 0, 0, 0.4) !important;
        border: 2px solid green;
        font-size: 1.5em !important;
        color: white !important;
        width: 60px !important;
        border-radius: 40px !important;
    }
    .owl-prev{
        left: -40px;
    }
    .owl-next{
        right: -40px;
        float:right;
    }
</style>
<body class="bg-maroon">