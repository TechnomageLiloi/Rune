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
        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Wiki/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Teacher/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Quests/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Artifacts/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Lessons/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Questions/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Questions/Test/Testing.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Quarters/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Modules/Admin/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/API/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Security/Password/Requests.js"></script>

        <title>Rune - <?php echo date('Y-m-d H:i:s'); ?> - <?php echo date('Y-W'); ?></title>
    </head>
    <body>
        <div id="head">
            <?php if($admin): ?>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Teacher.show();">Teacher</a>
                &diams;
                <a href="/tardis/<?php echo date('Y/W/N'); ?>" class="butn" >Today</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Wiki.show();">Refresh</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.edit();">Edit</a>
                &diams;
                <a href="javascript:void(0)" onclick="Rune.Quests.search();" class="butn">Current quests</a>
                <a href="javascript:void(0)" onclick="Rune.Quests.create();" class="butn">Create new quest</a>
                &diams;
                <a href="javascript:void(0)" onclick="Rune.Artifacts.create();" class="butn">Create new artifact</a>
                &diams;
                <a href="javascript:void(0)" onclick="Rune.Lessons.schedule()" class="butn">Schedule</a>
                &diams;
                <a href="javascript:void(0)" onclick="Rune.Admin.dump();" class="butn">Sandbox</a>

                &diams;
                <a href="javascript:void(0)" onclick="Rune.Questions.collection();" class="butn">Questions</a>
                <a href="javascript:void(0)" onclick="Rune.Questions.create();" class="butn">Create</a>
                <input type="text" id="tags" value="">
                <a href="javascript:void(0)" onclick="Rune.Questions.suite();" class="butn">Suite-test</a>
                &diams;
                <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.logout();">Logout</a>
            <?php else: ?>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.show();">Login</a>
            <?php endif; ?>

        </div>

        <div id="page" class="stylo">
            <script>
                Rune.Wiki.show();
            </script>
        </div>
    </body>
</html>