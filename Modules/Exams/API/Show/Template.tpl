<link href="<?php echo ROOT_URL; ?>/Modules/Exams/API/Show/Style.css" rel="stylesheet" />

<div id="exams-show">
    <?php echo $entity->getTitle(); ?>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Opponents.battle('<?php echo $entity->getKey(); ?>');">Battle</a>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Opponents.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
</div>
