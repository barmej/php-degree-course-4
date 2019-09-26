<?php
    include_once './classes/robot.class.php';
    // $faheem = new Robot(
    //     "فهيم",
    //     "متخصص في كل شيء",
    //     "faheem.png",
    //     array("ماهو اثقل حيوان؟", "من أفضل روبوت؟"),
    //     array("الفيل", "فهيم بلا منازع!")
    // );

    // $sportsman = new Robot(
    //     "رياضي",
    //     "متخصص في العلوم الرياضية",
    //     "sportsman.png",
    //     array("كم عدد لاعبين فريق كره السله الاساسيين؟"),
    //     array("5")
    // );

    // $programmer = new Robot(
    //     "مبرمج",
    //     "متخصص في البرمجه",
    //     "coder.png",
    //     array("ما هي الداله؟"),
    //     array("لا اعلم")
    // );

    // $chemist = new Robot(
    //     "كيميائي",
    //     "متخصص في العلوم علوم الكيمياء",
    //     "chemist.png",
    //     array("مما يتكون الهواء الذي نتنفس منه؟"),
    //     array("اكسجين و نيتروجين و كربون")
    // );

    // $robots = [$faheem, $sportsman, $programmer, $chemist];

    
    $robots = $db->allRobots();
    
    if(isset($_GET["robot"])){
        $robot=$robots[$_GET["robot"]];
    }else{
        $robot = $robots[2];
    }
?>