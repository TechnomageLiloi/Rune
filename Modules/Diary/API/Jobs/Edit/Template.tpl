<link href="<?php echo ROOT_URL; ?>/Engine/API/Jobs/Edit/Style.css" rel="stylesheet" />

<div id="application-diary-edit">
    <a href="javascript:void(0)" onclick="Rune.Diary.Jobs.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Diary.Road.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td>Statuses</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Types</td><td>
            <select name="type">
                <?php foreach($types as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Karma</td><td><input type="text" name="karma" value="<?php echo $entity->getKarma(); ?>"></td></tr>

        <tr><td>Title</td><td><textarea name="title"><?php echo $entity->getTitle(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Diary.Jobs.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Diary.Road.show();">Cancel</a>
</div>