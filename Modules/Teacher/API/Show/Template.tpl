<link href="<?php echo ROOT_URL; ?>/Modules/Teacher/API/Show/Style.css" rel="stylesheet" />
<div id="teacher-show">
    <table>
        <tr>
            <td>
                <a href="javascript:void(0)" onclick="Rune.Teacher.save(1, $('#teacher').val());">Add</a>
                <input type="text" id="teacher">
            </td>
            <td class="apprentice">
                <input type="text" id="apprentice">
                <a href="javascript:void(0)" onclick="Rune.Teacher.save(0, $('#apprentice').val());">Add</a>
            </td>
        </tr>
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