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

    if (isset($_POST["name"])) {
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        '/tmp/test/greatrobot.png';
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);

        if ($check !== false) {

            //التاكد من وجود الملف مسبقا
            if (file_exists('assets/images/' . $_FILES["image"]["name"])) {
                $message = "نأسف الملف موجود مسبقا";
                $uploadOk = 0;
            }

            //فحص حجم الملف
            if ($_FILES["image"]["size"] > 500000) {
                $message = "يرجى منك رفع ملف بحجم اقل من 500 كيلوبايت";
                $uploadOk = 0;
            }

            //فحص صيغه الملف
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $message = "نأسف صيغه الملف المرفوع غير مدعومة";
                $uploadOk = 0;
            }

            if ($uploadOk != 0) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = $_FILES["image"]["name"];

                    $questions = [$_POST["questions"]];
                    $answers = [$_POST["answers"]];

                    $robot = new Robot(null, $_POST["name"], $_POST["spec"], $image, $questions, $answers);
                    $db->createRobot($robot);

                    $message = "لقد تمت عمليه رفع الملف";
                } else {
                    $uploadOk = 0;
                    $message = "نأسف حصل خطب ما, يرجى المحاوله مره اخرى";
                }
            }
        } else {
            $message = "الملف المرفوع ليس بصوره";
        }
    }
    ?>

    <main>

        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card bg-dark  text-center ">
                        <div class="card-body">
                            <?php if(isset($_SESSION["user"])){ ?>
                                <h5 class="card-title">نموذج إضافه الروبوت</h5>
                                <p><?php echo isset($message) ? $message : "" ?></p>
                                <p class="card-text">
                                    يرجى تعبأه بيانات روبوتك الجديد
                                </p>
                                <div class="w-50 mx-auto">
                                    <form method="POST" action="createRobot.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">إسم الروبوت</label>
                                            <input name="name" type="text" class="form-control text-direction" id="name" aria-describedby="nameHelp" placeholder="الإسم">

                                            <label for="spec">التخصص</label>
                                            <input name="spec" type="text" class="form-control text-direction" id="spec" aria-describedby="specHelp" placeholder="التخصص">

                                            <label for="image">الصوره</label>
                                            <input name="image" type="file" class="form-control-file" id="image">

                                            <label for="questions">الأساله</label>
                                            <input name="questions" type="text" class="form-control text-direction" id="questions" aria-describedby="questionsHelp" placeholder="الأساله">

                                            <label for="answers">الأجوبه</label>
                                            <input name="answers" type="text" class="form-control text-direction" id="answers" aria-describedby="answersHelp" placeholder="الأجوبه">
                                        </div>
                                        <input type="submit" class="btn btn-outline-warning btn-sm btn-block" value="إضافه روبوت" />
                                    </form>
                                </div>
                            <?php }else{  ?>
                                يجب عليك تسجيل الدخول قبل التمكن من اضافه روبوتات جديده
                            <?php } ?>
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