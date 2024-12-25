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

        <tr><td style="width: 10%;">Drive</td><td><input type="text" name="drive" value="<?php echo $entity->getDrive(); ?>" /></td></tr>

        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>

        <tr><td>Map</td><td><textarea name="map"><?php echo $entity->getMap(); ?></textarea></td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Databank.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>