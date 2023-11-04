<link href="<?php echo ROOT_URL; ?>/Engine/API/Plan/Show/Style.css" rel="stylesheet" />

<div id="plan-show" class="stylo">
    <h1 id="plan" class="wrap-title">
        Plan
    </h1>

    <h2 id="menu">
        1. Menu
    </h2>

    <ol start="2">
        <li><a href="#goals">Goals</a></li>

        <li>
            <a href="#subjects">Subjects</a>
            <ol>
                <?php foreach(array_keys($problems) as $id_type): ?>
                    <li><a href="#subject-<?php echo $id_type; ?>"><?php echo $types[$id_type]; ?></a></li>
                <?php endforeach; ?>
            </ol>
        </li>
    </ol>

    <h2 id="goals">
        2. Degree Goals
    </h2>

    <div>
        <?php echo $degree->getParse(); ?>
    </div>

    <a href="#menu">1. Back to menu</a>

    <h2 id="subjects">
        3. Subjects
    </h2>
    <?php foreach($problems as $id_type => $collection): ?>
        <h3 id="subject-<?php echo $id_type; ?>">
            3.<?php echo $id_type; ?>. <?php echo $types[$id_type]; ?>
        </h3>

        <?php foreach($collection as $id => $entity): ?>
            <h4>
                3.<?php echo $id_type; ?>.<?php echo $id; ?>. [<?php echo $entity->getStatusTitle(); ?> / <?php echo $entity->getMark(); ?>] <?php echo $entity->getTitle(); ?>
            </h4>
            <?php echo $entity->getParse(); ?>
        <?php endforeach; ?>

        <a href="#menu">1. Back to menu</a>
    <?php endforeach; ?>

</div>