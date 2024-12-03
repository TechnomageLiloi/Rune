<link href="<?php echo ROOT_URL; ?>/Engine/API/Wiki/Show/Style.css" rel="stylesheet" />
<?php echo $entity->getScripts(); ?>
<div id="wiki-show">
    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
    </div>
    <hr/>

    <h1><?php echo $scroll->getTitle(); ?></h1>

    <?php echo $scroll->parseScroll(); ?>

    <?php if($children->count()): ?>
    <hr/>
    <h3>Sub-nodes</h3>
    <table class="tree">
        <?php foreach($children as $child): ?>
        &diams; <a href="<?php echo $child->getPath(); ?>"><?php echo $child->getTitle(); ?></a><br/>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <script>
        Rune.Trigger.initialize();
    </script>
</div>