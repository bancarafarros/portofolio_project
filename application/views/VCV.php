<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stylecv.css') ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="left">
            <br>
            <div class="profile-img"><img src="<?php echo base_url('/bootstrap/img1.svg') ?>" class="img-fluid" alt="..." /></div>

            <div class="box-1">
                <div class="heading">
                    <p>SOCIAL MEDIA</p>
                </div>
                <?php foreach ($social_medias as $sm) : ?>
                    <p class="p1"><i class="material-icons icons1">call</i><?= $sm->name ?></p>
                <?php endforeach; ?>
            </div>

            <div class="box-1">
                <div class="heading">
                    <p>LANGUAGES</p>
                </div>
                <?php foreach ($languages as $lng) : ?>
                    <p class="p1"><?= $lng->name ?>
                    <div class="skill-container">
                        <div class="skill html"></div>
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
                        <div class="skill web"></div>
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
                <h2>ABOUT ME <i class="material-icons icons3" style="font-size: 28px!important; ">perm_identity</i></h2>
                <?php foreach (array_slice($cv_data, 2, 1) as $dt) : ?>
                    <p class="p2">
                        <?= $dt['value'] ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="box-2">
                <h2>EDUCATION <i class="material-icons icons3">border_color</i></h2>

                <?php foreach ($educations as $edu) : ?>
                    <p class="p3"><?= $edu->start_date ?><span><?= $edu->name ?></span></p>
                    <p class="p2">
                        <?= $edu->description ?>
                    </p>
                <?php endforeach; ?>
            </div>


            <div class="box-2">
                <h2>WORK EXPERIENCE <i class="material-icons icons3">folder</i></h2>
                <?php foreach ($experiences as $exp) : ?>
                    <p class="p3"><?= $exp->start_date ?><span><?= $exp->name ?></span></p>
                    <p class="p2">
                        <?= $exp->description ?>
                    </p>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        window.print();
    </script> -->
</body>

</html>