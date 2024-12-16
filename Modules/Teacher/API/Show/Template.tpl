<link href="<?php echo ROOT_URL; ?>/Modules/Teacher/API/Show/Style.css" rel="stylesheet" />
<div id="teacher-show">
    <table>
        <?php foreach($collection as $entity): ?>
            <tr>
                <td class="<?php echo $entity->getClass(); ?>">
                    <?php echo $entity->getDialog(); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>