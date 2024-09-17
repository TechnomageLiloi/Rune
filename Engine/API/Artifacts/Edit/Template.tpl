<link href="<?php echo ROOT_URL; ?>/Engine/API/Artifacts/Edit/Style.css" rel="stylesheet" />

<div id="engine-artifacts-edit">
    <a href="javascript:void(0)" onclick="Rune.Artifacts.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Wiki.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td>Types</td><td>
            <select name="type">
                <?php foreach($types as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>" /></td></tr>

        <tr><td>Global</td><td><input type="text" name="global" value="<?php echo $entity->getGlobal(); ?>" /></td></tr>

        <tr><td>Local</td><td><input type="text" name="local" value="<?php echo $entity->getLocal(); ?>" /></td></tr>

        <tr><td>Description</td><td><textarea name="description"><?php echo $entity->getDescription(); ?></textarea></td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Artifacts.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Wiki.show();">Cancel</a>
</div>