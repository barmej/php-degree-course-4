<?php
    $isLoggedIn = false;

    if( isset($_POST["email"] )){
        if($_POST["email"] == "php@barmej.com" && $_POST["password"] == "php"){
            $message = "تعرفنا عليك انت مستر بي اتش بي";
            $isLoggedIn=true;
        }else{
            $message = "المعلومات خاطئه";
        }
    }

    if( isset($message) )
        echo $message;
    

    if (!$isLoggedIn) { ?>
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
    <a class="btn btn-outline-warning btn-block" href="./">خروج</a> 
<?php } ?>