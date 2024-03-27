<link href="/vendor/technomage-liloi/rune/Engine/API/Atoms/Edit/Template.css" rel="stylesheet" />

<div id="game-maps-edit">
    <a href="javascript:void(0)" onclick="Rune.Atoms.RID.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Atoms.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td>RID</td><td><input type="text" name="rid_new" value="<?php echo $entity->getKey(); ?>" /></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Atoms.RID.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Atoms.show();">Cancel</a>
</div>