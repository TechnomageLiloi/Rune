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
    </head>
    <body>
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
    </body>
</html>