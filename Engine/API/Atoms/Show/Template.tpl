<link href="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Show/Style.css" rel="stylesheet" />
<div id="atoms-show">
    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
    </div>

    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <?php if($admin): ?>
        <div class="wrap-buttons">
            <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.edit();">Edit</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.RID.edit();">Change RID</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.create();">Create child</a>
        </div>
    <?php endif; ?>

    <hr/>

    <?php echo $entity->parseProgram(); ?>

    <hr/>

    <?php if($children->count()): ?>
        <table>
            <tr>
                <th>Plate</th>
                <th>Type</th>
            </tr>
            <?php foreach($children as $child): ?>
            <tr>
                <td>
                    <?php echo $child->getTile(); ?>
                </td>
                <td>
                    <?php echo $child->getTypeTitle(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>