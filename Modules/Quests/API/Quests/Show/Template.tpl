<link href="<?php echo ROOT_URL; ?>/Modules/Quests/API/Quests/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Quest.edit('<?php echo $entity->getKey(); ?>');">Edit quest</a>
        &diams;
        <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Tickets.create();">Create ticket</a>
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
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach($tickets as $ticket): ?>
            <tr>
                <td><?php echo $ticket->getTimestamp(); ?></td>
                <td><?php echo $ticket->parse(); ?></td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Tickets.edit('<?php echo $ticket->getKey(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>