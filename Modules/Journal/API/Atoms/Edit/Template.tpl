<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Atoms/Edit/Style.css" rel="stylesheet" />

<div id="journal-atoms-edit" class="stylo">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Atoms.save('<?php echo $atom->getKeyDay(); ?>', '<?php echo $atom->getKeyAtom(); ?>');">Save</a>
    <table>
        <tr>
            <td>Goal</td>
            <td><input name="goal" type="text" value="<?php echo $atom->getGoal(); ?>"></td>
        </tr>

        <tr>
            <td>XP</td>
            <td><input name="xp" type="text" value="<?php echo $atom->getXp(); ?>"></td>
        </tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($atom->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr>
            <td>Start</td>
            <td><input name="start" type="text" value="<?php echo $atom->getStart(); ?>"></td>
        </tr>

        <tr>
            <td>Finish</td>
            <td><input name="finish" type="text" value="<?php echo $atom->getFinish(); ?>"></td>
        </tr>

    </table>

</div>