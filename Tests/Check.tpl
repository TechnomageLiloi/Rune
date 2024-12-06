<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test coverage checker</title>
        <style>
            table
            {
                width: 100%;
            }
            th {
                text-align: left;
            }
            td {
                border-bottom: silver 1px dashed;
            }
            td.tested {
                background-color: #bfffb6;
            }
            td.untested {
                background-color: #ffdada;
            }
        </style>

        <link rel="shortcut icon" type="image/png" href="/Tests/Jasmine/jasmine_favicon.png">
        <link rel="stylesheet" href="/Tests/Jasmine/jasmine.css">

        <script src="/Tests/Jasmine/jasmine.js"></script>
        <script src="/Tests/Jasmine/jasmine-html.js"></script>
        <script src="/Tests/Jasmine/boot0.js"></script>
        <script src="/Tests/Jasmine/boot1.js"></script>
        <script src="/Tests/Jasmine/Jquery.min.js"></script>
        <script src="/Tests/Jasmine/Underscore.min.js"></script>

        <!-- Rune JS source -->
        <script src="/Tests/Helper.js"></script>

        <!-- Test JS source -->
        <script src="/Engine/API/Requests.js"></script> <script src="/Engine/API/Test.js"></script>

    </head>
    <body>
        <img src="/Signum.png" width="100">

        <h3><?php echo $title; ?></h3>
        Tested: <?php echo $countTested; ?> - Untested: <?php echo $countUntested; ?> - Total tests: <?php echo $globalTests; ?> - Total asserts: <?php echo $globalAsserts; ?>
        <hr>
        <table>
            <tr>
                <th>Tested</th>
                <th>Directory</th>
                <th>Files</th>
                <th>Tests</th>
                <th>Asserts</th>
            </tr>
            <?php foreach($info as $inf): ?>
            <tr>
                <td class="<?php echo $inf['tested']; ?>"><?php echo ucfirst($inf['tested']); ?></td>
                <td><?php echo $inf['part']; ?></td>
                <td><?php echo $inf['countFiles']; ?></td>
                <td><?php echo $inf['countTests']; ?></td>
                <td><?php echo $inf['countAsserts']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <hr/>

        <div style="background-color: black; color: white;padding: 5px;margin: 0px;">
            <?php echo str_replace("\n", "<br/>", shell_exec('phpunit')); ?>
        </div>

        <hr/>

    </body>
</html>