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
                    <table class="table table-dark text-center shadow">
                        <tr class="bg-warning">
                            <th>المجموعه الأولى</th>
                            <th>المجموعه الثانيه</th>
                        </tr>
                        <?php for ($i = 0; $i < sizeof($robots); $i++) { ?>
                            <?php if ($i % 2 == 0) echo "<tr>"; ?>
                            <td>
                                <img src=<?php echo "assets/images/" . $robots[$i]->image ?> width="100px" />
                                <ul>
                                    <li><?php echo $robots[$i]->name ?></li>
                                    <li><?php echo $robots[$i]->spec ?></li>
                                </ul> 
                                <a class="btn btn-outline-warning" href="details.php?robot=<?= $i ?>" >فحص</a>
                            </td>
                            <?php if ($i % 2 == 1) echo "</tr>"; ?>
                        <?php } ?>
                    </table>
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