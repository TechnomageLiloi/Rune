<link href="<?php echo ROOT_URL; ?>/Engine/API/Plan/Show/Style.css" rel="stylesheet" />

<div id="plan-show" class="stylo">
    <h1 class="wrap-title">
        Plan
    </h1>

    <h2>
        1. Degree Goals
    </h2>

    <div>
        <?php echo $degree->getParse(); ?>
    </div>

    <h2>
        2. Subjects
    </h2>
    <?php foreach($problems as $id_type => $collection): ?>
        <h3>
            2.<?php echo $id_type; ?>. <?php echo $types[$id_type]; ?>
        </h3>

        <?php foreach($collection as $id => $entity): ?>
            <h4>
                2.<?php echo $id_type; ?>.<?php echo $id; ?>. [<?php echo $entity->getStatusTitle(); ?> / <?php echo $entity->getMark(); ?>] <?php echo $entity->getTitle(); ?>
            </h4>
            <?php echo $entity->getParse(); ?>
        <?php endforeach; ?>
    <?php endforeach; ?>

</div>