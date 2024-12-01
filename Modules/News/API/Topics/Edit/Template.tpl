<link href="<?php echo ROOT_URL; ?>/Engine/API/Road/Edit/Style.css" rel="stylesheet" />

<div id="application-diary-edit">
    <a href="javascript:void(0)" onclick="Rune.News.Topics.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"></td></tr>

        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>

        <tr><td>Tags</td><td><input type="text" name="tags" value="<?php echo $entity->getTags(); ?>"></td></tr>

        <tr><td>Timestamp</td><td><input type="text" name="dt" value="<?php echo $entity->getDt(); ?>"></td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.News.Topics.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>