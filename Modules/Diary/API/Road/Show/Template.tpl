<link href="<?php echo ROOT_URL; ?>/Modules/Diary/API/Road/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <?php if($jobs->count()): ?>
        <div class="current-job">
            <?php echo $jobs[0]->parse(); ?>
        </div>
    <?php endif; ?>

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Rune.Diary.Road.edit('<?php echo $entity->getKey(); ?>');">Edit step</a>
        &diams;
        <a href="javascript:void(0)" class="butn" onclick="Rune.Diary.Jobs.create();">Create job</a>
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
            <th>Status</th>
            <th>Type</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach($jobs as $job): ?>
            <tr>
                <td><?php echo $job->getTimestamp(); ?></td>
                <td><?php echo $job->getStatusTitle(); ?></td>
                <td><?php echo $job->getTypeTitle(); ?></td>
                <td><?php echo $job->parse(); ?></td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Diary.Jobs.edit('<?php echo $job->getKey(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>