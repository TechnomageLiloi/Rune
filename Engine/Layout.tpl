<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/png" href="/Signum.png">

        <!-- @todo: add function to link scripts and styles -->
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-api/Client/API.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/stylo/Source/Stylo.js"></script>

        <link href="<?php echo ROOT_URL; ?>/Engine/Style.css" rel="stylesheet" />
        <link href="<?php echo ROOT_URL; ?>/Engine/API/Style.css" rel="stylesheet" />

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Security/Password/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Application/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Degrees/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Problems/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Lessons/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Exams/Questions/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Plan/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Projects/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Tickets/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/User/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Exams/Questions/Test/Testing.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>

        <title>Rune</title>
    </head>
    <body>
        <div id="head">
            <?php if($admin): ?>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Plan.show();">Plan</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.show();">Map</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Application.Diary.show('<?php echo date('Y-m-d'); ?>');">Journal</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Degrees.getCollection();">Degrees</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Lessons.schedule('<?php echo gmdate('Y-m-d'); ?>');">Schedule</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Lessons.timetable();">Timetable</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.edit(true);">Article</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Lessons.edit(0)">Task</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.dump();">Dump</a>
                &diams;
                <a href="javascript:void(0)" class="butn" onclick="API.Questions.collection();">Questions</a>
                <input type="text" id="tags" value="">
                <a href="javascript:void(0)" class="butn" onclick="API.Questions.suite();">Run</a>
                &diams;
                <a href="javascript:void(0)" class="butn" onclick="Stones.API.Projects.getCollection();">Artifacts</a>
                &diams;
                <a href="javascript:void(0)" class="butn" onclick="Rune.User.search();">Search</a>
                &diams;
                Karma: <?php echo $karma; ?>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.logout();">Logout</a>
            <?php else: ?>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.show();">Login</a>
            <?php endif; ?>
        </div>
        <div id="page">
            <script>
                <?php if($admin): ?>
                    Rune.Atoms.show();
                <?php else: ?>
                    Rune.User.search();
                <?php endif; ?>
            </script>
        </div>
    </body>
</html>