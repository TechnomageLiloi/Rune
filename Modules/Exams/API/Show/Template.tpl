<link href="<?php echo ROOT_URL; ?>/Modules/Exams/API/Show/Style.css" rel="stylesheet" />

<div id="exams-show">
    <strong><?php echo $entity->getTitle(); ?></strong>
    <br/>
    <?php echo $entity->getSpecieStart(); ?> <?php echo $text; ?>
    <br/>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Quests.battle('<?php echo $entity->getKey(); ?>');">Battle</a>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Quests.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Quests.search('<?php echo $entity->getKey(); ?>');">Crystals</a>
</div>
