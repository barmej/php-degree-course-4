<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">

    <script src="assets/vendors/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

    <style>

    </style>


    <script src="assets/js/scripts.js"></script>

</head>

<body class="d-flex flex-column h-100">

    <?php
    include_once "./layouts/header.php";
    include_once "./robotInit.php";
    ?>

    <main>

        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                </div>
                <div class="col-sm-4 text-direction">
                    <?php include_once "./layouts/sidebar.php"; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "./layouts/footer.php"; ?>

</body>

</html>