<div id="modules-levels-collection">
    <link href="<?php echo ROOT_URL; ?>/Modules/Levels/API/Levels/Collection/Style.css" rel="stylesheet" />

    <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.plan();">Plan</a>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.Lessons.create();">Create lesson</a>

    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Degree</th>
                <th>Title</th>
                <th>Goal</th>
                <th>Resource</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr style="font-weight: bold;" class="degree <?php echo $entity->getStatusClass(); ?>">
                    <td>
                        <?php echo $entity->getKey(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getGoal(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getResource(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.show('<?php echo $entity->getKey(); ?>');">Show</a> &diams;
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>

                <?php if(isset($lessons[$entity->getKey()])): ?>

                    <?php foreach($lessons[$entity->getKey()] as $key => $lesson): ?>
                        <tr>
                            <td></td>
                            <td>
                                <?php echo $lesson->getTitle(); ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php echo $lesson->getStatusTitle(); ?>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.Lessons.edit('<?php echo $lesson->getKey(); ?>');">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php endif; ?>

            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>