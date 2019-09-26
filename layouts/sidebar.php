<?php

    if( isset($_POST["email"] )){
        $result = $db->login($_POST["email"],$_POST["password"]);

        if($result){
            $message=$result;

            $_SESSION["user"]=$message["username"];
        }else{
            echo "المعلومات خاطئة";
        }
    }
    
    if(isset($_COOKIE["robot"])){
        $cookieRobotIndex=$_COOKIE["robot"];
        $cookieRobot=$robots[$cookieRobotIndex];
        echo "في المره الماضيه زرت الروبوت ".$cookieRobot->name;
        echo "<br>";
    }

    if (!isset($_SESSION["user"])) { ?>
    <form method="POST" action="index.php">
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
<?php } else { ?>
    <?php echo "مرحبا بك ". $_SESSION["user"] ?>
    <a class="btn btn-outline-warning btn-block" href="./logout.php">خروج</a> 
<?php } ?>