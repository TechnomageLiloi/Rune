<link href="<?php echo ROOT_URL; ?>/Modules/Maps/API/Inventory/Edit/Style.css" rel="stylesheet" />

<div id="maps-inventory-edit">
    <a href="javascript:void(0)" onclick="Rune.Maps.Inventory.save('<?php echo $entity->getKey(); ?>');" class="butn">Save</a>

    <hr/>
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
            <td><input name="title" type="text" value="<?php echo $entity->getTitle(); ?>"></td>
        </tr>

        <tr><td>Description</td><td><textarea name="description"><?php echo $entity->getDescription(); ?></textarea></td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>

    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Maps.Inventory.save('<?php echo $entity->getKey(); ?>');" class="butn">Save</a>

</div>