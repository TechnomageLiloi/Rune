<link href="<?php echo ROOT_URL; ?>/Modules/Exams/API/Edit/Style.css" rel="stylesheet" />

<div id="exams-edit">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Quests.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <table>
        <tr><td>Type</td><td>
            <select name="type">
                <?php foreach($types as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="title" value="<?php echo $entity->getTitle(); ?>">
            </td>
        </tr>
        <tr><td>Program</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>
        <tr><td>Theory</td><td><textarea name="theory"><?php echo $entity->getTheory(); ?></textarea></td></tr>
    </table>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Quests.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>
