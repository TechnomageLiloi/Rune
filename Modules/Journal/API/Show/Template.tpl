<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Road.edit('<?php echo $day->getKey(); ?>');">Edit</a>
    <input type="date" id="key_day" value="<?php echo $day->getKey(); ?>" />
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.show($('#key_day').val());">Select</a>
    <hr/>
    <h3>Day goal: <?php echo $day->getGoal(); ?></h3>
    <?php echo $day->getProgramParse(); ?>
    <hr/>
    <h3>Jobs</h3>
    <table>
        <tr>
            <th></th>
            <th style="width: 23%;">:00</th>
            <th style="width: 23%;">:15</th>
            <th style="width: 23%;">:30</th>
            <th style="width: 23%;">:45</th>
        </tr>
        <?php foreach($jobHours as $hour => $jobQuarters): ?>
            <tr>
                <th style="width: 100px;"><?php echo $hour; ?>:</th>
                <?php foreach($jobQuarters as $quarter => $job): ?>
                    <?php if($job === null): ?>
                        <td>
                            <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Jobs.create(<?php echo $hour; ?>, <?php echo $quarter; ?>, '<?php echo $day->getKey(); ?>');">Create</a>

                            <?php if($groupCrystals[$hour][$quarter]): ?>
                            <div style="font-size: xx-small">
                                <ol>
                                    <?php foreach($groupCrystals[$hour][$quarter] as $crystal): ?>
                                    <li><?php echo $crystal->getRID(); ?> / <?php echo $crystal->getKeyOpponent(); ?> / <?php echo $crystal->getData(); ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <?php endif; ?>
                        </td>
                    <?php else: ?>
                        <td class="<?php echo $job->getStatusClass(); ?>">
                            <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Jobs.edit(<?php echo $hour; ?>, <?php echo $quarter; ?>, '<?php echo $day->getKey(); ?>');">Edit</a>
                            [<?php echo $job->getXp(); ?>] <?php echo $job->getGoal(); ?>

                            <?php if($groupCrystals[$hour][$quarter]): ?>
                            <div style="font-size: xx-small">
                                <ol>
                                    <?php foreach($groupCrystals[$hour][$quarter] as $crystal): ?>
                                    <li><?php echo $crystal->getRID(); ?> / <?php echo $crystal->getKeyOpponent(); ?> / <?php echo $crystal->getData(); ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>

                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

</div>