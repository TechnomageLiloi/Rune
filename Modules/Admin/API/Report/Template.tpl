<div id="modules-admin-report">
    <h1>Report</h1>

    <table>
        <?php foreach($report->getByDays() as $day => $jobsDay): ?>
            <?php foreach($jobsDay as $job): ?>
                <tr>

                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</div>