<link href="<?php echo ROOT_URL; ?>/Engine/API/Databank/Edit/Template.css" rel="stylesheet" />

<div id="game-maps-edit">
    <a href="javascript:void(0)" onclick="Rune.Databank.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table>
        <tr><td>Status</td><td>
            <select name="type">
                <?php foreach($types as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td style="width: 10%;">Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>" /></td></tr>

        <tr><td style="width: 10%;">Tags</td><td><input type="text" name="tags" value="<?php echo $entity->getTags(); ?>" /></td></tr>

        <tr><td style="width: 10%;">Timestamp</td><td><input type="text" name="ts" value="<?php echo $entity->getTs(); ?>" /></td></tr>

        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Databank.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>