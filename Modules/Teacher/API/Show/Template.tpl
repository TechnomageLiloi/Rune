<link href="<?php echo ROOT_URL; ?>/Modules/Teacher/API/Show/Style.css" rel="stylesheet" />
<div id="teacher-show">
    <table>
        <tr>
            <th class="teacher">Teacher</th>
            <th class="apprentice">Apprentice</th>
        </tr>
        <?php foreach($collection as $entity): ?>
            <tr>
                <?php if($entity->getTeacher()): ?>
                    <td class="<?php echo $entity->getClass(); ?>">
                        <?php echo $entity->getDialog(); ?>
                    </td>
                    <td></td>
                <?php else: ?>
                    <td></td>
                    <td class="<?php echo $entity->getClass(); ?>">
                        <?php echo $entity->getDialog(); ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>