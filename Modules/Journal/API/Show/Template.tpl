<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">
    <h3>Day goal: <?php echo $day->getGoal(); ?></h3>
    <?php echo $day->getProgramParse(); ?>
    <hr/>

    <table>
        <tr>
            <th></th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
        </tr>
        <?php foreach($jobHours as $hour => $jobQuarters): ?>
            <tr>
                <th style="width: 100px;"><?php echo $hour; ?>:00</th>
                <?php foreach($jobQuarters as $job): ?>
                    <td>
                        <?php if($job === null): ?>
                            X
                        <?php else: ?>
                            <?php echo $day->getGoal(); ?>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

</div>