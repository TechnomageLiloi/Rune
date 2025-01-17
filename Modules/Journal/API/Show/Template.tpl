<link href="<?php echo ROOT_URL; ?>/Modules/Journal/API/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Road.edit('<?php echo $day->getKey(); ?>');">Edit</a>
    <input type="date" id="key_day" value="<?php echo $day->getKey(); ?>" />
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.show($('#key_day').val());">Select</a>
    <?php echo date('Y-m-d H:i:s'); ?>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Atoms.create('<?php echo $day->getKey(); ?>');">Create atom</a>
    <hr/>
    <h3>Day goal: <?php echo $day->getGoal(); ?></h3>
    <?php echo $day->getProgramParse(); ?>
    <hr/>
    <h3>Atoms</h3>

    <table>
        <tr>
            <th>Start</th>
            <th>Finish</th>
            <th>Goal</th>
            <th>XP</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach($atoms as $atom): ?>
            <tr>
                <td>
                    <?php echo $atom->getStart(); ?>
                </td>
                <td>
                    <?php echo $atom->getFinish(); ?>
                </td>
                <td>
                    <?php echo $atom->getGoal(); ?>
                </td>
                <td>
                    <?php echo $atom->getXp(); ?>
                </td>
                <td class="<?php echo $atom->getStatusClass(); ?>">
                    <?php echo $atom->getStatusTitle(); ?>
                </td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Journal.Atoms.edit('<?php echo $atom->getKeyDay(); ?>', '<?php echo $atom->getKeyAtom(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>