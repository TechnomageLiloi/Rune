<link href="<?php echo ROOT_URL; ?>/Engine/API/Maps/Collection/Style.css" rel="stylesheet" />

<div id="modules-cards-collection" class="stylo window">
    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Rune.Cards.create();">Create</a>
        <a href="javascript:void(0)" class="butn" onclick="Rune.Maps.show();" style="float: right;">x</a>
    </div>

    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Cards.show('<?php echo $entity->getKey(); ?>');">Show</a> &diams;
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Cards.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>