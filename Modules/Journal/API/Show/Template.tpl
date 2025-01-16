<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Road.edit('<?php echo $day->getKey(); ?>');">Edit</a>
    <input type="date" id="key_day" value="<?php echo $day->getKey(); ?>" />
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.show($('#key_day').val());">Select</a>
    <?php echo date('Y-m-d H:i:s'); ?>
    <hr/>
    <h3>Day goal: <?php echo $day->getGoal(); ?></h3>
    <?php echo $day->getProgramParse(); ?>
    <hr/>
    <h3>Jobs</h3>
</div>