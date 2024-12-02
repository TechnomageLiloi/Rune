<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test coverage checker</title>
    </head>
    <body>
        <h3><?php echo $title; ?></h3>
        <hr>
        <table>
            <?php foreach($info as $inf): ?>
            <tr>
                <td><?php echo $inf['part']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>