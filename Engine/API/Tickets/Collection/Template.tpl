<link href="<?php echo ROOT_URL; ?>/Engine/API/Tickets/Collection/Style.css" rel="stylesheet" />
<div id="degrees-collection">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Tickets.create();">Create</a>
    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Tickets.show('<?php echo $entity->getKey(); ?>');">Show</a>
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Tickets.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>