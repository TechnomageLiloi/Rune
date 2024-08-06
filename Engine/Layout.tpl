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

        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Wiki/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Teacher/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Requests.js"></script>

        <title>Rune - <?php echo date('Y-m-d H:i:s'); ?> - <?php echo date('Y-W'); ?></title>
    </head>
    <body>
        <div id="head">
            <a href="javascript:void(0)" class="butn" onclick="Rune.Teacher.show();">Teacher</a>
            &diams;
            <a href="/" class="butn" >Root</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Wiki.show();">Refresh</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.edit();">Edit</a>
        </div>

        <div id="page">
            <script>
                Rune.Wiki.show();
            </script>
        </div>
    </body>
</html>