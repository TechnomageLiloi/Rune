<link href="<?php echo ROOT_URL; ?>/Modules/Admin/API/Dashboard/Style.css" rel="stylesheet" />

<div id="modules-admin-dashboard">
    <h1>Dashboard</h1>

    <div class="job">
        <h3>Current job</h3>
        <hr/>
        <strong>
            <?php echo $job->getTypeTitle(); ?>
            &diams;
            <?php echo $job->getStatusTitle(); ?>
            &diams;
            <?php echo $job->getKarma(); ?>
        </strong>
        <?php echo $job->parse(); ?>
    </div>

</div>