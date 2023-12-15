<link href="<?php echo ROOT_URL; ?>/Engine/API/User/Search/Style.css" rel="stylesheet" />
<div id="user-search">
    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Title</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>