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
            <script src="<?php echo ROOT_URL; ?>/Engine/API/Databank/Requests.js"></script>
            <script src="<?php echo ROOT_URL; ?>/Modules/Journal/API/Requests.js"></script>
        <?php endif; ?>

        <title>Rune</title>
    </head>
    <body>
        <div id="head">
            <?php if($admin): ?>
                <?php if(!$locked): ?>
                    <a href="javascript:void(0)" onclick="Rune.Databank.show();" class="butn">Databank</a>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.show('<?php echo date("Y-m-d"); ?>');">Journal</a>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.logout();">Save game</a>
                <?php else: ?>
                    <h1 style="color: orange;">Ship is locked. Access to others is denied. There are no others. You are alone. You are in peace.</h1>
                    <a href="javascript:void(0)" onclick="Rune.Admin.lock('');" class="butn">Unlock</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="/" class="butn">News</a>
                <a href="/rune" class="butn">Root</a>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.show();">Login</a>
            <?php endif; ?>
        </div>

        <div id="page" class="stylo">
            <?php if(!$locked): ?>
                <script>
                    <?php if($admin): ?>
                        Rune.Journal.show('<?php echo date("Y-m-d"); ?>');
                    <?php else: ?>
                        Rune.Wiki.show();
                    <?php endif; ?>
                </script>
            <?php endif; ?>
        </div>
    </body>
</html>