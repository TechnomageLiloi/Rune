<link href="<?php echo ROOT_URL; ?>/Engine/API/User/Search/Style.css" rel="stylesheet" />
<div id="user-search">
    <?php foreach($collection as $entity): ?>
        <div class="atom">
            <h2>
                <?php echo $entity->getTitle(); ?>
            </h2>
            <?php echo $entity->parseSummary(); ?>
        </div>
    <?php endforeach; ?>
</div>