<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stylecv.css') ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style><?php echo file_get_contents('./assets/css/stylecv.css') ?></style>
    <?php
        
    ?>
</head>

<body>
    <div class="main">
        <div class="left">
            <br>
            <!-- <div class="profile-img"><img src="/assets/img/almet.jpg"></div> -->
            <div class="profile-img"><img src="http://portofolio_project.test/assets/img/almet.jpg"></div>
            

            <div class="box-1">
                <div class="heading">
                    <p>SOCIAL MEDIA</p>
                </div>
                <?php foreach ($social_medias as $sm) : ?>
                    <?= '<img src="' . base_url('assets/img/icons/' . $sm->icon) . '"width="10px" height="10px">'; ?>
                    <a style="text-decoration: none;" href="<?= $sm->url ?>">
                        <p class="p1"><?= $sm->name ?></p>
                    </a>
                <?php endforeach; ?>
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
</body>

</html>