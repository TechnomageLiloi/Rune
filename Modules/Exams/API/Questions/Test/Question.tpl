<div>
    Make:
    <a href="javascript:void(0)" onclick="Rune.Exams.Questions.done('<?php echo $entity->getKey(); ?>', '1');">Done</a>
    <a href="javascript:void(0)" onclick="Rune.Exams.Questions.done('<?php echo $entity->getKey(); ?>', '0');">Undone</a>
    <?php echo $inner; ?>
</div>