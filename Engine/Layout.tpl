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

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Security/Password/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Wiki/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Requests.js"></script>

        <?php if($admin): ?>

            <script src="<?php echo ROOT_URL; ?>/Engine/API/Artifacts/Requests.js"></script>

            <script src="<?php echo ROOT_URL; ?>/Modules/Admin/API/Requests.js"></script>
            <script src="<?php echo ROOT_URL; ?>/Modules/Diary/API/Requests.js"></script>
            <script src="<?php echo ROOT_URL; ?>/Modules/Quests/API/Requests.js"></script>
            <script src="<?php echo ROOT_URL; ?>/Modules/Exams/API/Inventory/Requests.js"></script>
            <script src="<?php echo ROOT_URL; ?>/Modules/Exams/API/Questions/Requests.js"></script>
            <script src="<?php echo ROOT_URL; ?>/Modules/Exams/API/Questions/Test/Testing.js"></script>
            <script src="<?php echo ROOT_URL; ?>/Modules/Cards/API/Cards/Requests.js"></script>

        <?php endif; ?>

        <title>Rune</title>
    </head>
    <body>
        <div id="head">
            <?php if($admin): ?>
                <?php if(!$locked): ?>
                    <a href="javascript:void(0)" onclick="Rune.Diary.Road.show();" class="butn">Road</a>
                    <a href="javascript:void(0)" onclick="Rune.Admin.menu();" class="butn">Menu</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Rune.Atoms.show();" class="butn">Game</a>
                    <a href="javascript:void(0)" onclick="Rune.Atoms.edit();" class="butn">Edit</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Rune.Wiki.show();" class="butn">Wiki</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Rune.Artifacts.create();" class="butn">Create new artifact</a>
                    <a href="javascript:void(0)" onclick="Rune.Exams.Inventory.collection();" class="butn">Items</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Rune.Diary.Road.show();" class="butn">Diary</a>
                    <a href="javascript:void(0)" onclick="Rune.Quests.Quest.show();" class="butn">Quest</a>
                    &diams;
                    &diams;
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.logout();">Logout</a>
                <?php else: ?>
                    <h1 style="color: orange;">Ship is locked. Access to others is denied. There are no others. You are alone. You are in peace.</h1>
                    <a href="javascript:void(0)" onclick="Rune.Admin.lock('');" class="butn">Unlock</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.show();">Login</a>
            <?php endif; ?>
        </div>

        <div id="page" class="stylo">
            <?php if(!$locked): ?>
                <script>
                    <?php if($admin): ?>
                        Rune.Atoms.show();
                    <?php else: ?>
                        Rune.Wiki.show();
                    <?php endif; ?>
                </script>
            <?php endif; ?>
        </div>
    </body>
</html>