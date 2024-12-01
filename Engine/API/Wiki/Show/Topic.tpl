<link href="<?php echo ROOT_URL; ?>/Engine/API/Wiki/Show/Style.css" rel="stylesheet" />
<?php echo $entity->getScripts(); ?>
<div id="wiki-show">
    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
    </div>
    <hr/>
    <?php echo $entity->parseWiki(); ?>

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