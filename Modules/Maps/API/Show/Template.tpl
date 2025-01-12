<link href="<?php echo ROOT_URL; ?>/Modules/Maps/API/Show/Style.css" rel="stylesheet" />

<div id="modules-maps-show">
    <div class="local-buttons">
        <a href="<?php echo $entity->getDrive(); ?>" target="_blank" class="butn">Drive</a>
    </div>
    <?php echo $entity->parseMap(); ?>
</div>

<script>
    Rune.Trigger.initialize();
</script>