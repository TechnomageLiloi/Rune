<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Jobs/Edit/Style.css" rel="stylesheet" />

<div id="journal-jobs-edit" class="stylo">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Jobs.save(<?php echo $job->getHour(); ?>, <?php echo $job->getQuarter(); ?>);">Save</a>
    <table>
        <tr>
            <td>Goal</td>
            <td><input name="goal" type="text" value="<?php echo $job->getGoal(); ?>"></td>
        </tr>
        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($job->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

    </table>

</div>