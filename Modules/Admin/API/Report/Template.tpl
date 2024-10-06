<link href="<?php echo ROOT_URL; ?>/Modules/Admin/API/Report/Style.css" rel="stylesheet" />

<div id="modules-admin-report">
    <h1>Report</h1>

    <table>
        <tr>
            <?php for($i=0;$i<7;$i++): ?>
                <th>
                    <?php echo date("l", strtotime("+$i day")); ?>
                </th>
            <?php endfor; ?>
        </tr>
        <tr>
            <?php foreach($report as $day => $jobsDay): ?>
                <td>
                    <?php foreach($jobsDay as $job): ?>
                        <div class="current-job">
                            <strong><?php echo $job->getKey(); ?></strong>
                            <?php echo $job->getTitle(); ?>
                        </div>
                    <?php endforeach; ?>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
</div>