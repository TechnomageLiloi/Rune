<link href="<?php echo ROOT_URL; ?>/Modules/Levels/API/Character/Style.css" rel="stylesheet" />
<div id="levels-character">
    <table>
        <tr>
            <td>Full name</td>
            <td><?php echo $fullname; ?></td>
        </tr>
        <tr>
            <td>Nick name</td>
            <td><?php echo $nickname; ?></td>
        </tr>
        <tr>
            <td>Current level</td>
            <td>#<?php echo $level; ?></td>
        </tr>
        <tr>
            <td>Concentration level</td>
            <td>#<?php echo $concentration->getKey(); ?> - <?php echo $concentration->getTitle(); ?></td>
        </tr>
    </table>
</div>