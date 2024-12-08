<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">
    <h3>Day goal: <?php echo $day->getGoal(); ?></h3>
    <?php echo $day->getProgramParse(); ?>
    <hr/>
</div>