<link href="<?php echo ROOT_URL; ?>/Modules/Levels/API/Levels/Plan/Style.css" rel="stylesheet" />
<div id="modules-levels-plan">
    <h1>Plan</h1>
    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <?php foreach($collection as $entity): ?>
                <tr>
                    <td>
                        <h2>
                            <?php echo $entity->getKey(); ?> Degree: <?php echo $entity->getTitle(); ?>
                        </h2>
                        <h3>
                            <?php echo $entity->getGoal(); ?>
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $entity->getProgramParse(); ?>
                        <hr/>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>