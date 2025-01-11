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

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Databank/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/Journal/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/Maps/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/Menu/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/Teacher/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/Levels/API/Levels/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/Levels/API/Requests.js"></script>

        <?php if(file_exists(ROOT_URL . "/Pool/Sandbox.js")): ?>
            <script src="<?php echo ROOT_URL; ?>/Pool/Sandbox.js"></script>
        <?php endif; ?>

        <script src="<?php echo ROOT_URL; ?>/Modules/Exams/Client/Opponent.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Modules/Exams/API/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Modules/Exams/API/Battle/Testing.js"></script>

        <title>Rune</title>
    </head>
    <body>
        <div id="head">
            <a href="javascript:void(0)" onclick="Rune.Maps.show();" class="butn">Play</a>
            <a href="javascript:void(0)" onclick="Rune.Databank.edit('');" class="butn">Edit</a>
            &diams;
            <a href="javascript:void(0)" onclick="Rune.Teacher.show();" class="butn">Teacher</a>
            <a href="javascript:void(0)" onclick="Rune.Databank.search('*');" class="butn">Databank</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.show('<?php echo date("Y-m-d"); ?>');">Journal</a>
            &diams;
            <a href="javascript:void(0)" onclick="Rune.Levels.characterShow();" class="butn">Character</a>
            <a href="javascript:void(0)" onclick="Rune.Levels.getCollection();" class="butn">Levels</a>
            <a href="javascript:void(0)" onclick="Rune.Levels.Quest.show(2);" class="butn">Quests</a>
            &diams;
            <a href="javascript:void(0)" onclick="Rune.Menu.save();" class="butn">Save game</a>
        </div>

        <div id="page" class="stylo">
            <script>
                <?php if($_SERVER['REQUEST_URI']==='/'): ?>
                    Rune.Menu.show();
                <?php else: ?>
                    Rune.Maps.show();
                <?php endif; ?>
            </script>
        </div>
    </body>
</html>