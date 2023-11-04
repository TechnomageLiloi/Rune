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

        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>

        <title>Rune</title>
    </head>
    <body>
        <?php if($admin): ?>
            <div id="head">
                <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.show();">Atoms</a>
                <a href="javascript:void(0)" class="butn" onclick="Tardis.Application.Diary.show();">Diary</a>
                <a href="javascript:void(0)" class="butn" onclick="Tardis.Degrees.getCollection();">Degrees</a>
                <a href="javascript:void(0)" class="butn" onclick="Tardis.Lessons.schedule('<?php echo gmdate('Y-m-d'); ?>');">Schedule</a>
                <a href="javascript:void(0)" class="butn" onclick="Tardis.Lessons.timetable();">Timetable</a>
            </div>
        <?php endif; ?>
        <div id="page">
            <script>
                Rune.Atoms.show();
            </script>
        </div>
    </body>
</html>