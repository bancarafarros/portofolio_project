<!DOCTYPE html>
<html>

<head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free6/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css"> -->
    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap"); */

        body {
            /* background-image: linear-gradient(#636162, #b1afaf); */
            height: 122vh;
            font-weight: bold;
            letter-spacing: 2px;
        }

        * {
            margin: 0px;
            padding: 0px;
            font-family: "Montserrat", sans-serif;
        }

        .main {
            background-color: white;
            height: 1010;
            /* auto */
            width: 650px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 87%;
            /* 80 */
        }

        .left {
            background-color: #424651;
            width: 200px;
            height: 100%;
            float: left;
        }

        .right {
            width: 450px;
            float: left;
        }

        .profile-img {
            height: 180px;
            width: 180px;
            background-color: #ddd;
            border-radius: 50%;
            margin-bottom: 20px;
            margin-left: 60px;
            border: 10px solid #424651;
            box-shadow: 6px 7px 9px 5px #42465173;
        }

        .profile-img img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
        }

        .box-1 {
            position: relative;
        }

        .heading {
            background-color: #adb5bd;
            padding: 10px;
            color: #424651;
            text-align: left;
            padding-left: 20px;
            margin-right: -15px;
        }

        .heading::after {
            content: "";
            position: absolute;
            width: 21px;
            height: 18px;
            background-color: #adb5bd;
            left: 191px;
            top: 26px;
            transform: rotate(56deg);
            z-index: -1;
        }

        .p1 {
            padding: 9px 10px;
            font-size: 11px;
            color: #ffffff;
        }

        .icons1 {
            font-size: 16px !important;
            padding-right: 10px !important;
            vertical-align: sub;
        }

        .skill-container {
            width: 90%;
            background-color: #070707;
            margin: 0px 10px;
        }

        .skill {
            text-align: right;
            padding-top: 2px;
            padding-bottom: 2px;
            color: #F1F2EB;
        }

        .html {
            width: 100%;
            background-color: #F1F2EB;
        }

        .css {
            width: 80%;
            background-color: #F1F2EB;
        }

        .js {
            width: 85%;
            background-color: #F1F2EB;
        }

        .jquery {
            width: 80%;
            background-color: #F1F2EB;
        }

        .web {
            width: 85%;
            background-color: #F1F2EB;
        }

        .gra {
            width: 70%;
            background-color: #F1F2EB;
        }

        .icons2 {
            padding: 18px 10px;
        }

        .name-div {
            padding: 86px 0px 60px 55px;
            text-align: center;
            letter-spacing: 3px;
        }

        .name-div h1 {
            margin-bottom: 10px;
        }

        .box-2 {
            padding: 0px 50px;
            margin-top: 30px;
        }

        .p2 {
            font-size: 10px;
            font-weight: 300;
            letter-spacing: 1px;
            word-spacing: 2px;
            line-height: 18px;
            margin-top: 5px;
        }

        h2 {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .icons3 {
            vertical-align: bottom;
            font-size: 21px !important;
            color: #adb5bd;
        }

        .p3 {
            font-size: 12px;
            word-spacing: 1px;
            letter-spacing: 0px;
            margin-top: 10px;
        }

        .p3 span {
            color: #ff6000;
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="left">
            <br>
            <div class="profile-img"><img src="<?= base_url('/assets/img/almet.jpg') ?>"></div>
            <!-- <div class="profile-img"><img src="http://portofolio_project.test/assets/img/almet.jpg"></div> -->

            <div class="box-1">
                <div class="heading">
                    <p>SOCIAL MEDIA</p>
                </div>
                <?php foreach ($social_medias as $sm) : ?>
                    <i class="<?= $sm->icon ?>"></i>
                    <a style="text-decoration: none;" href="<?= $sm->url ?>">
                        <p class="p1"><?= $sm->name ?></p>
                    </a>
                <?php endforeach; ?>

                <!-- <?php foreach ($social_medias as $sm) : ?>
                    <?= '<img src="' . base_url('assets/img/icons/' . $sm->icon) . '"width="10px" height="10px">'; ?>
                    <a style="text-decoration: none;" href="<?= $sm->url ?>">
                        <p class="p1"><?= $sm->name ?></p>
                    </a>
                <?php endforeach; ?> -->
            </div>

            <div class="box-1">
                <div class="heading">
                    <p>LANGUAGES</p>
                </div>
                <?php foreach ($languages as $lng) : ?>
                    <p class="p1"><?= $lng->name ?>
                    <div class="skill-container">
                        <?php
                        if ($lng->level == 5) {
                            echo '<div class="skill html"></div>';
                        } else if ($lng->level == 4) {
                            echo '<div class="skill js"></div>';
                        } else if ($lng->level == 3) {
                            echo '<div class="skill css"></div>';
                        } else if ($lng->level == 2) {
                            echo '<div class="skill gra"></div>';
                        } else {
                            echo '<div class="skill gra"></div>';
                        }
                        ?>
                    </div>
                    </p>
                <?php endforeach; ?>
            </div>
            <br>

            <div class="box-1">
                <div class="heading">
                    <p>SKILLS</p>
                </div>
                <?php foreach ($skills as $skl) : ?>
                    <p class="p1"><?= $skl->name ?>
                    <div class="skill-container">
                        <?php
                        if ($skl->level == 5) {
                            echo '<div class="skill html"></div>';
                        } else if ($skl->level == 4) {
                            echo '<div class="skill js"></div>';
                        } else if ($skl->level == 3) {
                            echo '<div class="skill css"></div>';
                        } else if ($skl->level == 2) {
                            echo '<div class="skill gra"></div>';
                        } else {
                            echo '<div class="skill gra"></div>';
                        }
                        ?>
                    </div>
                    </p>
                <?php endforeach; ?>
            </div>
            <br>
            <div class="box-1">
                <div class="heading">
                    <p>HOBBIES</p>
                </div>
                <?php foreach ($hobbies as $hobby) : ?>
                    <p class="p1">* <?= $hobby->hobby ?></p>
                <?php endforeach ?>
            </div>
        </div>

        <div class="right">
            <div class="name-div">
                <?php foreach (array_slice($cv_data, 0, 1) as $dt) : ?>
                    <h1><?= $dt['value'] ?></h1>
                <?php endforeach; ?>

                <?php foreach (array_slice($cv_data, 1, 1) as $dt) : ?>
                    <p><?= $dt['value'] ?></p>
                <?php endforeach; ?>
            </div>

            <div class="box-2">
                <h2>ABOUT ME <i class="material-icons icons3" style="font-size: 28px!important; "></i></h2>
                <?php foreach (array_slice($cv_data, 2, 1) as $dt) : ?>
                    <p class="p2">
                        <?= $dt['value'] ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="box-2">
                <h2>EDUCATION</h2>
                <?php foreach (array_slice($educations, 0, 1) as $edu) : ?>
                    <p class="p3"><?= $edu['start_date'][0] . $edu['start_date'][1] . $edu['start_date'][2] . $edu['start_date'][3] .
                                        ' - ' . $edu['graduated_date'][0] . $edu['graduated_date'][1] . $edu['graduated_date'][2] . $edu['graduated_date'][3] ?>
                        <span><?= $edu['name'] ?></span>
                    </p>
                    <p class="p2">
                        <?= $edu['description'] ?>
                    </p>
                <?php endforeach; ?>

                <?php foreach (array_slice($educations, 1, 1) as $edu) : ?>
                    <p class="p3"><?= $edu['start_date'][0] . $edu['start_date'][1] . $edu['start_date'][2] . $edu['start_date'][3] . ' - PRESENT' ?>
                        <span><?= $edu['name'] ?></span>
                    </p>
                    <p class="p2">
                        <?= $edu['description'] ?>
                    </p>
                <?php endforeach; ?>

                <!-- <?php foreach ($educations as $edu) : ?>
                    <p class="p3"><?= $edu->start_date ?> - <?= $edu->graduated_date ?><span><?= $edu->name ?></span></p>
                    <p class="p2">
                        <?= $edu->description ?>
                    </p>
                <?php endforeach; ?> -->
            </div>

            <div class="box-2">
                <h2>WORK EXPERIENCE</h2>
                <?php foreach (array_slice($experiences, 0, 1) as $exp) : ?>
                    <p class="p3">
                        <?= $exp['start_date'][0] . $exp['start_date'][1] . $exp['start_date'][2] . $exp['start_date'][3] .
                            ' - ' . $exp['resignated_date'][0] . $exp['resignated_date'][1] . $exp['resignated_date'][2] . $exp['resignated_date'][3] ?>
                        <span><?= $exp['name'] ?></span>
                    </p>
                    <p class="p2">
                        <?= $exp['description'] ?>
                    </p>
                <?php endforeach; ?>

                <?php foreach (array_slice($experiences, 1, 1) as $exp) : ?>
                    <p class="p3">
                        <?= $exp['start_date'][0] . $exp['start_date'][1] . $exp['start_date'][2] . $exp['start_date'][3] . ' - PRESENT' ?>
                        <span><?= $exp['name'] ?></span>
                    </p>
                    <p class="p2">
                        <?= $exp['description'] ?>
                    </p>
                <?php endforeach; ?>

                <!-- <?php foreach ($experiences as $exp) : ?>
                    <p class="p3"><?= $exp->start_date ?> - <?= $exp->resignated_date ?><span><?= $exp->name ?></span></p>
                    <p class="p2">
                        <?= $exp->description ?>
                    </p>
                <?php endforeach ?> -->
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        window.print();
    </script> -->
    <script src="https://kit.fontawesome.com/37b001f455.js" crossorigin="anonymous"></script>
</body>

</html>

<!DOCTYPE html>
<html>

<!-- <head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- <link href="<?php echo file_get_contents('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo file_get_contents('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo file_get_contents('assets/vendor/fontawesome-free/css/all.css') ?>" rel="stylesheet" type="text/css">
    <style><?php echo file_get_contents('./assets/css/stylecv.css') ?></style> -->
</head>

<body style="height: 122vh; font-weight:bold; letter-spacing: 2px;">
    <div class="main" style="background-color: white;
	height: 1010; /* auto */
	width: 650px;
	position: absolute;
	transform: translate(-50%, -50%);
	left: 50%;
	top: 87%; /* 80 */">
        <div class="left" style="background-color: #424651;
	width: 200px;
	height: 100%;
	float: left;">
            <br>
            <div class="profile-img" style="height: 180px;
	width: 180px;
	background-color: #ddd;
	border-radius: 50%;
	margin-bottom: 20px;
	margin-left: 60px;
	border: 10px solid #424651;
	box-shadow: 6px 7px 9px 5px #42465173;"><img style="height: 100%;
	width: 100%;
	border-radius: 50%;" src="<?= base_url('/assets/img/almet.jpg') ?>"></div>
            <!-- <div class="profile-img"><img src="http://portofolio_project.test/assets/img/almet.jpg"></div> -->

            <div class="box-1" style="position: relative;">
                <div class="heading" style="background-color: #adb5bd;
	padding: 10px;
	color: #424651;
	text-align: left;
	padding-left: 20px;
	margin-right: -15px;">
                    <p>SOCIAL MEDIA</p>
                </div>
                <?php foreach ($social_medias as $sm) : ?>
                    <i class="<?= $sm->icon ?>"></i>
                    <a style="text-decoration: none;" href="<?= $sm->url ?>">
                        <p class="p1" style="padding: 9px 10px;
	font-size: 11px;
	color: #ffffff;"><?= $sm->name ?></p>
                    </a>
                <?php endforeach; ?>

                <!-- <?php foreach ($social_medias as $sm) : ?>
                    <?= '<img src="' . base_url('assets/img/icons/' . $sm->icon) . '"width="10px" height="10px">'; ?>
                    <a style="text-decoration: none;" href="<?= $sm->url ?>">
                        <p class="p1" style="padding: 9px 10px;
	font-size: 11px;
	color: #ffffff;"><?= $sm->name ?></p>
                    </a>
                <?php endforeach; ?> -->
            </div>

            <div class="box-1" style="position: relative;">
                <div class="heading" style="background-color: #adb5bd;
	padding: 10px;
	color: #424651;
	text-align: left;
	padding-left: 20px;
	margin-right: -15px;">
                    <p>LANGUAGES</p>
                </div>
                <?php foreach ($languages as $lng) : ?>
                    <p class="p1" style="padding: 9px 10px;
	font-size: 11px;
	color: #ffffff;"><?= $lng->name ?>
                    <div class="skill-container" style="width: 90%;
	background-color: #070707;
	margin: 0px 10px;">
                        <?php
                        if ($lng->level == 5) {
                            echo '<div class="skill html" style="text-align: right;
	padding-top: 2px;
	padding-bottom: 2px;
	color: #F1F2EB; width: 100%;
	background-color: #F1F2EB;"></div>';
                        } else if ($lng->level == 4) {
                            echo '<div class="skill js" style="text-align: right;
	padding-top: 2px;
	padding-bottom: 2px;
	color: #F1F2EB; width: 85%;
	background-color: #F1F2EB;"></div>';
                        } else if ($lng->level == 3) {
                            echo '<div class="skill css" style="text-align: right;
	padding-top: 2px;
	padding-bottom: 2px;
	color: #F1F2EB; width: 80%;
	background-color: #F1F2EB;"></div>';
                        } else if ($lng->level == 2) {
                            echo '<div class="skill gra" style="text-align: right;
	padding-top: 2px;
	padding-bottom: 2px;
	color: #F1F2EB; width: 70%;
	background-color: #F1F2EB;"></div>';
                        } else {
                            echo '<div class="skill gra" style="text-align: right;
	padding-top: 2px;
	padding-bottom: 2px;
	color: #F1F2EB; width: 70%;
	background-color: #F1F2EB;"></div>';
                        }
                        ?>
                    </div>
                    </p>
                <?php endforeach; ?>
            </div>
            <br>

            <div class="box-1" style="position: relative;">
                <div class="heading" style="background-color: #adb5bd;
	padding: 10px;
	color: #424651;
	text-align: left;
	padding-left: 20px;
	margin-right: -15px;">
                    <p>SKILLS</p>
                </div>
                <?php foreach ($skills as $skl) : ?>
                    <p class="p1" style="padding: 9px 10px;
	font-size: 11px;
	color: #ffffff;"><?= $skl->name ?>
                    <div class="skill-container" style="width: 90%;
	background-color: #070707;
	margin: 0px 10px;">
                        <?php
                        if ($skl->level == 5) {
                            echo '<div class="skill html" style="text-align: right;
                            padding-top: 2px;
                            padding-bottom: 2px;
                            color: #F1F2EB; width: 100%;
                            background-color: #F1F2EB;"></div>';
                        } else if ($skl->level == 4) {
                            echo '<div class="skill js" style="text-align: right;
                            padding-top: 2px;
                            padding-bottom: 2px;
                            color: #F1F2EB; width: 85%;
                            background-color: #F1F2EB;"></div>';
                        } else if ($skl->level == 3) {
                            echo '<div class="skill css" style="text-align: right;
                            padding-top: 2px;
                            padding-bottom: 2px;
                            color: #F1F2EB; width: 80%;
                            background-color: #F1F2EB;"></div>';
                        } else if ($skl->level == 2) {
                            echo '<div class="skill gra" style="text-align: right;
                            padding-top: 2px;
                            padding-bottom: 2px;
                            color: #F1F2EB; width: 70%;
                            background-color: #F1F2EB;"></div>';
                        } else {
                            echo '<div class="skill gra" style="text-align: right;
                            padding-top: 2px;
                            padding-bottom: 2px;
                            color: #F1F2EB; width: 70%;
                            background-color: #F1F2EB;"></div>';
                        }
                        ?>
                    </div>
                    </p>
                <?php endforeach; ?>
            </div>
            <br>
            <div class="box-1" style="position: relative;">
                <div class="heading" style="background-color: #adb5bd;
	padding: 10px;
	color: #424651;
	text-align: left;
	padding-left: 20px;
	margin-right: -15px;">
                    <p>HOBBIES</p>
                </div>
                <?php foreach ($hobbies as $hobby) : ?>
                    <p class="p1" style="padding: 9px 10px;
	font-size: 11px;
	color: #ffffff;">* <?= $hobby->hobby ?></p>
                <?php endforeach ?>
            </div>
        </div>

        <div class="right" style="width: 450px;
	float: left;">
            <div class="name-div" style="padding: 86px 0px 60px 55px;
	text-align: center;
	letter-spacing: 3px;">
                <?php foreach (array_slice($cv_data, 0, 1) as $dt) : ?>
                    <h1 style="margin-bottom: 10px;"><?= $dt['value'] ?></h1>
                <?php endforeach; ?>

                <?php foreach (array_slice($cv_data, 1, 1) as $dt) : ?>
                    <p><?= $dt['value'] ?></p>
                <?php endforeach; ?>
            </div>

            <div class="box-2" style="padding: 0px 50px;
	margin-top: 30px;">
                <h2 style="font-size: 16px;
	margin-bottom: 15px;">ABOUT ME</h2>
                <?php foreach (array_slice($cv_data, 2, 1) as $dt) : ?>
                    <p class="p2" style="font-size: 10px;
	font-weight: 300;
	letter-spacing: 1px;
	word-spacing: 2px;
	line-height: 18px;
	margin-top: 5px;">
                        <?= $dt['value'] ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="box-2" style="padding: 0px 50px;
	margin-top: 30px;">
                <h2 style="font-size: 16px;
	margin-bottom: 15px;">EDUCATION</h2>
                <?php foreach (array_slice($educations, 0, 1) as $edu) : ?>
                    <p class="p3" style="font-size: 12px;
	word-spacing: 1px;
	letter-spacing: 0px;
	margin-top: 10px;"><?= $edu['start_date'][0] . $edu['start_date'][1] . $edu['start_date'][2] . $edu['start_date'][3] .
                                        ' - ' . $edu['graduated_date'][0] . $edu['graduated_date'][1] . $edu['graduated_date'][2] . $edu['graduated_date'][3] ?>
                        <span style="color: #ff6000;
	padding-left: 10px;"><?= $edu['name'] ?></span>
                    </p>
                    <p class="p2" style="font-size: 10px;
	font-weight: 300;
	letter-spacing: 1px;
	word-spacing: 2px;
	line-height: 18px;
	margin-top: 5px;">
                        <?= $edu['description'] ?>
                    </p>
                <?php endforeach; ?>

                <?php foreach (array_slice($educations, 1, 1) as $edu) : ?>
                    <p class="p3" style="font-size: 12px;
	word-spacing: 1px;
	letter-spacing: 0px;
	margin-top: 10px;"><?= $edu['start_date'][0] . $edu['start_date'][1] . $edu['start_date'][2] . $edu['start_date'][3] . ' - PRESENT' ?>
                        <span style="color: #ff6000;
	padding-left: 10px;"><?= $edu['name'] ?></span>
                    </p>
                    <p class="p2" style="font-size: 10px;
	font-weight: 300;
	letter-spacing: 1px;
	word-spacing: 2px;
	line-height: 18px;
	margin-top: 5px;">
                        <?= $edu['description'] ?>
                    </p>
                <?php endforeach; ?>

                <!-- <?php foreach ($educations as $edu) : ?>
                    <p class="p3"><?= $edu->start_date ?> - <?= $edu->graduated_date ?><span><?= $edu->name ?></span></p>
                    <p class="p2">
                        <?= $edu->description ?>
                    </p>
                <?php endforeach; ?> -->
            </div>

            <div class="box-2" style="padding: 0px 50px;
	margin-top: 30px;">
                <h2 style="font-size: 16px;
	margin-bottom: 15px;">WORK EXPERIENCE</h2>
                <?php foreach (array_slice($experiences, 0, 1) as $exp) : ?>
                    <p class="p3" style="font-size: 12px;
	word-spacing: 1px;
	letter-spacing: 0px;
	margin-top: 10px;">
                        <?= $exp['start_date'][0] . $exp['start_date'][1] . $exp['start_date'][2] . $exp['start_date'][3] .
                            ' - ' . $exp['resignated_date'][0] . $exp['resignated_date'][1] . $exp['resignated_date'][2] . $exp['resignated_date'][3] ?>
                        <span><?= $exp['name'] ?></span>
                    </p>
                    <p class="p2" style="font-size: 10px;
	font-weight: 300;
	letter-spacing: 1px;
	word-spacing: 2px;
	line-height: 18px;
	margin-top: 5px;">
                        <?= $exp['description'] ?>
                    </p>
                <?php endforeach; ?>

                <?php foreach (array_slice($experiences, 1, 1) as $exp) : ?>
                    <p class="p3" style="font-size: 12px;
	word-spacing: 1px;
	letter-spacing: 0px;
	margin-top: 10px;">
                        <?= $exp['start_date'][0] . $exp['start_date'][1] . $exp['start_date'][2] . $exp['start_date'][3] . ' - PRESENT' ?>
                        <span style="color: #ff6000;
	padding-left: 10px;"><?= $exp['name'] ?></span>
                    </p>
                    <p class="p2" style="font-size: 10px;
	font-weight: 300;
	letter-spacing: 1px;
	word-spacing: 2px;
	line-height: 18px;
	margin-top: 5px;">
                        <?= $exp['description'] ?>
                    </p>
                <?php endforeach; ?>

                <!-- <?php foreach ($experiences as $exp) : ?>
                    <p class="p3"><?= $exp->start_date ?> - <?= $exp->resignated_date ?><span><?= $exp->name ?></span></p>
                    <p class="p2">
                        <?= $exp->description ?>
                    </p>
                <?php endforeach ?> -->
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        window.print();
    </script> -->
</body>

</html> -->