<link href="<?php echo ROOT_URL; ?>/Engine/API/Plan/Show/Style.css" rel="stylesheet" />

<div id="plan-show" class="stylo">
    <h1 id="plan" class="wrap-title">
        Degree plan: <?php echo $degree->getTitle(); ?>
    </h1>

    <hr style="border-top: 1px solid silver;"/>

    <h2 id="menu">
        1. Menu
    </h2>

    <ol>
        <li>Menu</li>
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

    <hr style="border-top: 1px dashed silver;"/>

    <h2 id="goals">
        2. Degree Goals
    </h2>

    <div style="padding-left: 50px;">
        <?php echo $degree->getParse(); ?>
        <a href="#menu">Back to menu</a>
    </div>

    <hr style="border-top: 1px dashed silver;"/>

    <h2 id="subjects">
        3. Subjects
    </h2>
    <?php foreach($problems as $id_type => $collection): ?>
        <h3 id="subject-<?php echo $id_type; ?>" style="padding-left: 50px;">
            3.<?php echo $id_type; ?>. <?php echo $types[$id_type]; ?>
        </h3>

        <?php foreach($collection as $id => $entity): ?>
            <div style="padding-left: 100px;">
                <h4>
                    3.<?php echo $id_type; ?>.<?php echo $id; ?>. [<?php echo $entity->getStatusTitle(); ?> / <?php echo $entity->getMark(); ?>] <?php echo $entity->getTitle(); ?>
                </h4>
                <?php echo $entity->getParse(); ?>

            </div>
            <hr style="border-top: 1px dotted silver;"/>
        <?php endforeach; ?>

        <div style="padding-left: 50px;">
            <a href="#menu">Back to menu</a>
        </div>

        <hr style="border-top: 1px dashed silver;"/>
    <?php endforeach; ?>

</div>