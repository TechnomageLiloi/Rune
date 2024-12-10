<link href="<?php echo ROOT_URL; ?>/Engine/API/Databank/Show/Style.css" rel="stylesheet" />

<div id="wiki-show">

    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
    </div>

    <hr/>

    <h1><?php echo $entity->getTitle(); ?></h1>

    <?php echo $entity->parseSummary(); ?>

    <hr/>

    <?php foreach($children as $child): ?>
    &diams; <a href="<?php echo $child->getPath(); ?>"><?php echo $child->getTitle(); ?></a><br/>
    <?php endforeach; ?>

    <script>
        Rune.Trigger.initialize();
    </script>
</div>