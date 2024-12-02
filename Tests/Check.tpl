<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test coverage checker</title>
        <style>
            table
            {
                width: 100%;
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
        <hr>
        <table>
            <?php foreach($info as $inf): ?>
            <tr>
                <td class="<?php echo $inf['tested']; ?>"><?php echo $inf['part']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>