<link href="<?php echo ROOT_URL; ?>/Engine/API/Wiki/Show/Style.css" rel="stylesheet" />
<?php echo $entity->getScripts(); ?>
<div id="wiki-show">
    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
    </div>
    <h1 class="header">
        <?php echo $entity->getTitle(); ?>
    </h1>
    <hr/>
    <?php echo $entity->parseProgram(); ?>

    <?php if($inventory->count()): ?>
        <hr/>
        <h3>There are several items you see:</h3>
        <?php foreach($inventory as $key => $entity): ?>
            <a href="javascript:void(0)" onclick="Rune.Exams.Inventory.show('<?php echo $entity->getKey(); ?>');"><?php echo $entity->getTitle(); ?></a> <?php echo mb_strtolower($entity->getProgram()); ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if($artifacts->count()): ?>
        <hr/>
        <h3>Artifact(s)</h3>
        <?php foreach($artifacts as $key => $entity): ?>
        <div class="block-quest">
            <a href="javascript:void(0)" onclick="Rune.Artifacts.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
            <?php echo $entity->getTitle(); ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

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