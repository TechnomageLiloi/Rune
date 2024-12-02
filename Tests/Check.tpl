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
            <tr>
                <th>Tested</th>
                <th>Directory</th>
                <th>Tests</th>
                <th>Asserts</th>
            </tr>
            <?php foreach($info as $inf): ?>
            <tr>
                <td class="<?php echo $inf['tested']; ?>"><?php echo ucfirst($inf['tested']); ?></td>
                <td><?php echo $inf['part']; ?></td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>