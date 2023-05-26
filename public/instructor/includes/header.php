<?php
session_start();
(!isset($_SESSION['users_data'])) ? header('location: '.$_SESSION['url']) : ($_SESSION['users_data']['role'] == 'student') && header('location: ' . $_SESSION['url'] . '/');
// echo json_encode($_SESSION['users_data']);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berdin's Final Project</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= $_SESSION['url'] ?>/public/assets/uploads/favicon.ico" /> 

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/hope-ui.min.css?v=1.2.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/custom.min.css?v=1.2.0" /> 

    <!-- Customizer Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/customizer.min.css" /> 

    <!-- data table -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"> -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/responsive.dataTables.min.css">
    <style>
        @media only screen and (max-width: 429px) {
            div.dataTables_wrapper div.dataTables_filter input {
                width: 75%;
            }
        }
    </style>
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <?php require('./includes/aside.php'); ?>

    <main class="main-content">
        <div class="position-relative iq-banner"> 
            <?php require('./includes/nav.php'); ?>
            <?php require('./includes/banner.php'); ?> 
        </div>
        <div class="container-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">