<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">

    <script src="assets/vendors/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    

    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" >

    <style>
        
    </style>


    <script src="assets/js/scripts.js" ></script>

</head>
<body>
    <?php
        include_once './classes/robot.class.php';
        $faheem = new Robot(
            "فهيم",
            "متخصص في كل شيء",
            "faheem.png",
            array("ماهو اثقل حيوان؟","من أفضل روبوت؟"),
            array("الفيل","فهيم بلا منازع!")
        );

        $sportsman= new Robot("رياضي","متخصص في العلوم الرياضية","sportsman.png",
            array("كم عدد لاعبين فريق كره السله الاساسيين؟"),
            array("5"));

        $programmer=new Robot("مبرمج","متخصص في البرمجه","coder.png",
            array("ما هي الداله؟"),
            array("لا اعلم"));
            
        $chemist=new Robot("كيميائي","متخصص في العلوم علوم الكيمياء","chemist.png",
            array("مما يتكون الهواء الذي نتنفس منه؟"),
            array("اكسجين و نيتروجين و كربون"));

        $programmer2=new Robot("مبرمج","متخصص في البرمجه","coder.png",
            array("ما هي الداله؟"),
            array("لا اعلم"));
            
        $chemist2=new Robot("كيميائي","متخصص في العلوم علوم الكيمياء","chemist.png",
            array("مما يتكون الهواء الذي نتنفس منه؟"),
            array("اكسجين و نيتروجين و كربون"));

        $robots = [$faheem,$sportsman, $programmer, $chemist, $programmer2, $chemist2];

        $isLoggedIn = false;
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                أضف روبوتك
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">روبوت عام</a>
                <a class="dropdown-item" href="#">روبوت متخصص</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <table class="table table-dark text-center shadow">
                    <tr class="bg-warning">
                        <th>المجموعه الأولى</th>
                        <th>المجموعه الثانيه</th>
                    </tr>
                    <?php for($i=0; $i < sizeof($robots) ; $i++) { ?>
                        <?php if($i%2 == 0) echo "<tr>"; ?>
                        <td>
                            <img src=<?php echo "assets/images/".$robots[$i]->image ?> width="100px" />
                            <ul>
                                <li><?php echo $robots[$i]->name ?></li>
                                <li><?php echo $robots[$i]->spec ?></li>
                            </ul>
                        </td>
                        <?php if($i%2 == 1) echo "</tr>"; ?>
                    <?php } ?>
                </table>
            </div>
            <div class="col-sm-4 text-direction">
                <?php if(!$isLoggedIn){ ?>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                        <input name="email" type="email" class="form-control text-direction" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل البريد">
                        <small id="emailHelp" class="form-text">لن نقوم بمشاركه بريدك الالكتروني مع اي شخص ما</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">كلمه المرور</label>
                        <input name="password" type="password" class="form-control text-direction" id="exampleInputPassword1" placeholder="كلمه المرور">
                    </div>
                    <input type="submit" class="btn btn-outline-warning btn-sm btn-block" value="دخول" />
                </form>
                <?php }else{ echo " مرحبا بك مجددا "; } ?>
            </div>
        </div>
    </div>

    

</body>
</html>