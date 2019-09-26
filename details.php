<?php 
session_start();
setcookie("robot",$_GET["robot"],time() - 3600, "/");
?>
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

    if (isset($_POST["question"])) {
        $robot->addQuestion($_POST["question"], $_POST["answer"]);
        $db->updateRobot($robot);
    }

    ?>

    <main>

        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card bg-dark  text-center ">
                        <img src=<?= "./assets/images/{$robot->image}"; ?> class="card-img-top w-25 mx-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $robot->name ?></h5>
                            <p class="card-text">
                                <?php foreach ($robot->questions as $question) {
                                    echo $question;
                                    echo "<br>";
                                } ?>
                            </p>
                            <div class="w-50 mx-auto">
                                <form method="POST" action="details.php?robot=<?= $_GET["robot"] ?>">
                                    <div class="form-group">
                                        <label for="question">أضف سؤالك</label>
                                        <input name="question" type="text" class="form-control text-direction" id="question" aria-describedby="questionHelp" placeholder="أدخل السؤال">
                                    </div>

                                    <div class="form-group">
                                        <label for="answer">أضف جوابك</label>
                                        <input name="answer" type="text" class="form-control text-direction" id="answer" aria-describedby="answerHelp" placeholder="أدخل جوابك">
                                    </div>
                                    <input type="submit" class="btn btn-outline-warning btn-sm btn-block" value="إضافه سؤال" />
                                </form>
                            </div>
                            <!-- <a href="#" class="btn btn-primary">إسألني</a> -->
                        </div>
                    </div>
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