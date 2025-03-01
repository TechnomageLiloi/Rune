<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/png" href="/Signum.png">

        <!-- @todo: add function to link scripts and styles -->
        <script src="/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js"></script>
        <script src="/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js"></script>
        <script src="/vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js"></script>

        <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />

        <script src="/vendor/technomage-liloi/rune-api/Client/API.js"></script>
        <script src="/vendor/technomage-liloi/stylo/Source/Stylo.js"></script>

        <link href="/Engine/Style.css" rel="stylesheet" />

        <script src="/Engine/Bootstrap.js"></script>

        <script src="/Engine/API/Maps/Requests.js"></script>
        <script src="/Modules/Wiki/Requests.js"></script>

        <title>Rune</title>
    </head>
    <body>

    <div id="head">
        <a href="javascript:void(0)" class="butn" onclick="Rune.Maps.edit();">Edit</a>
    </div>

        <div id="page" class="stylo">
            <script>
                Rune.Wiki.show();
            </script>
        </div>
    </body>
</html>