<link href="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Edit/Template.css" rel="stylesheet" />

<div id="game-maps-edit">
    <a href="javascript:void(0)" onclick="Rune.Atoms.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Atoms.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td style="width: 10%;">Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>" /></td></tr>

        <tr><td>Status</td><td>
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

        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>

        <tr><td>Program</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>

        <tr><td>Tags</td><td><input type="text" name="tags" value="<?php echo $entity->getTags(); ?>" /></td></tr>

        <tr>
            <td>Timestamp (used in sort)</td>
            <td>
                <input type="text" name="ts" value="<?php echo $entity->getTs(); ?>" />
                <a href="javascript:void(0)" onclick="$('#game-maps-edit [name=ts]').val('<?php echo gmdate("Y-m-d H:i:s"); ?>');">Now</a>
            </td>
        </tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Atoms.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Atoms.show();">Cancel</a>
</div>