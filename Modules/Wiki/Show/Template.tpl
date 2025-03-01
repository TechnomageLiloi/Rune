<link href="<?php echo ROOT_URL; ?>/Modules/Wiki/Show/Style.css" rel="stylesheet" />
<?php echo $entity->getScripts(); ?>
<div id="wiki-show">
    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
        <?php $drive = $entity->getDataElement('drive'); ?>
        <?php if($access && $drive): ?>
            <br/>
            Drive: <a target="_blank" href="<?php echo $drive; ?>"><?php echo $drive; ?></a>
        <?php endif; ?>
    </div>
    <h1 class="header">
        <?php echo $entity->getTitle(); ?>
    </h1>
    <hr/>
    <?php echo $entity->parseMap(); ?>
    <?php if($children->count()): ?>
        <hr/>
        <h3>Wiki Links</h3>
        <table class="tree">
            <?php foreach($children as $child): ?>
            &diams; <a href="<?php echo $child->getPath(); ?>"><?php echo $child->getTitle(); ?></a>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>