<link href="<?php echo ROOT_URL; ?>/Engine/API/Wiki/Show/Style.css" rel="stylesheet" />

<div id="wiki-show">

    <h1 class="header">News</h1>

    <?php foreach($topics as $topic): ?>

        <div class="topic">
            <h3>
                <a href="<?php echo $topic->getLink(); ?>"><?php echo $topic->getTitle(); ?></a>
            </h3>
            <div class="tech">
                <?php echo $topic->getDt(); ?> - <?php echo $topic->getTags(); ?>
            </div>
            <?php echo $topic->parse(); ?>
        </div>

    </tr>
    <?php endforeach; ?>

</div>