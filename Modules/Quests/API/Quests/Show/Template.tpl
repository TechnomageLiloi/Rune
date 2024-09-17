<link href="<?php echo ROOT_URL; ?>/Modules/Quests/API/Quests/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Quests.edit('<?php echo $entity->getKey(); ?>');">Edit step</a>
        &diams;
        <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Jobs.create();">Create job</a>
        <hr/>
    </div>

    <div class="data">
        <?php echo $entity->getData(); ?><br/>
    </div>

    <hr/>

    <?php echo $entity->parse(); ?>

    <hr/>

    <h3>Jobs</h3>

    <table>
        <tr>
            <th>Time</th>
            <th>Type</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach($jobs as $job): ?>
            <tr>
                <td><?php echo $job->getTimestamp(); ?></td>
                <td><?php echo $job->getTypeTitle(); ?></td>
                <td><?php echo $job->parse(); ?></td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Jobs.edit('<?php echo $job->getKey(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>