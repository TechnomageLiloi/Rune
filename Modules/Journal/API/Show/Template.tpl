<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">
    <h3>Day goal: <?php echo $day->getGoal(); ?></h3>
    <?php echo $day->getProgramParse(); ?>
    <hr/>
    <h3>Jobs</h3>
    <table>
        <tr>
            <th></th>
            <th style="width: 23%;">1</th>
            <th style="width: 23%;">2</th>
            <th style="width: 23%;">3</th>
            <th style="width: 23%;">4</th>
        </tr>
        <?php foreach($jobHours as $hour => $jobQuarters): ?>
            <tr>
                <th style="width: 100px;"><?php echo $hour; ?>:00</th>
                <?php foreach($jobQuarters as $quarter => $job): ?>
                    <?php if($job === null): ?>
                        <td>
                            <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Jobs.create(<?php echo $hour; ?>, <?php echo $quarter; ?>, '<?php echo $day->getKey(); ?>');">Create</a>
                        </td>
                    <?php else: ?>
                        <td class="<?php echo $job->getStatusClass(); ?>">
                            <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Jobs.edit(<?php echo $hour; ?>, <?php echo $quarter; ?>);">Edit</a>
                            <?php echo $job->getGoal(); ?>
                        </td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

</div>