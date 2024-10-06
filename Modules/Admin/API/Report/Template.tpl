<div id="modules-admin-report">
    <h1>Report</h1>

    <table>
        <tr>
            <?php foreach($report as $day => $jobsDay): ?>
                <td>
                    <?php foreach($jobsDay as $job): ?>
                        <div class="job">
                            <?php echo $job->getTitle(); ?>
                        </div>
                    <?php endforeach; ?>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
</div>