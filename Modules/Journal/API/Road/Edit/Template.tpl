<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Road/Edit/Style.css" rel="stylesheet" />

<div id="journal-road-edit" class="stylo">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Road.save('<?php echo $day->getKey(); ?>');">Save</a>
    <table>
        <tr>
            <td>Goal</td>
            <td><input name="goal" type="text" value="<?php echo $day->getGoal(); ?>"></td>
        </tr>
        <tr>
            <td>Program</td>
            <td>
                <textarea name="program"><?php echo $day->getProgram(); ?></textarea>
            </td>
        </tr>

    </table>

</div>