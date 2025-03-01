<link href="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Edit/Template.css" rel="stylesheet" />

<div id="game-maps-edit">
    <a href="javascript:void(0)" onclick="Rune.Maps.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Wiki.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td style="width: 10%;">Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>" /></td></tr>

        <tr><td style="width: 10%;">Timestamp</td><td><input type="text" name="dt" value="<?php echo $entity->getDt(); ?>" /></td></tr>

        <tr><td>Map</td><td><textarea name="map"><?php echo $entity->getMap(); ?></textarea></td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Maps.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Wiki.show();">Cancel</a>
</div>