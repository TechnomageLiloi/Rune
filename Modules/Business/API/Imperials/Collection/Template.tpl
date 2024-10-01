<link href="<?php echo ROOT_URL; ?>/Engine/API/Maps/Collection/Style.css" rel="stylesheet" />
<a href="javascript:void(0)" class="butn" onclick="API.Imperials.create();">Create</a>
<?php if($collection->count()): ?>
    <hr/>
    <table>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Credits</th>
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
                    <?php echo $entity->getCredits(); ?>
                </td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="API.Imperials.show('<?php echo $entity->getKey(); ?>');">Show</a> &diams;
                    <a href="javascript:void(0)" class="butn" onclick="API.Imperials.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>