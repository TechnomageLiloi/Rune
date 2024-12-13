<link href="<?php echo ROOT_URL; ?>/Modules/Quests/API/Quests/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <!--<a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Quest.edit('<?php //echo $entity->getKey(); ?>');">Edit quest</a>-->
        <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Quest.create();">Create new quest</a>
        &diams;
        <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Tickets.create();">Create ticket</a>
        &diams;
        <a href="javascript:void(0)" onclick="Rune.Quests.Quest.show(1);" class="butn">New quests</a>
        <a href="javascript:void(0)" onclick="Rune.Quests.Quest.show(2);" class="butn">In hand quests</a>
        <a href="javascript:void(0)" onclick="Rune.Quests.Quest.show(3);" class="butn">Complete quests</a>

        <a href="javascript:void(0)" class="butn" onclick="Rune.Maps.show();" style="float: right;">x</a>
    </div>


    <table>
        <?php foreach($quests as $quest): ?>

            <tr>
                <td style="width: 200px;">#<?php echo $quest->getKey(); ?> [XP:<?php echo $quest->getXp(); ?>]</td>
                <td><?php echo $quest->parse(); ?></td>
                <td style="width: 200px;text-align: right;">
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Quest.edit('<?php echo $quest->getKey(); ?>');">Edit quest</a>
                    &diams;
                    <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Quest.update('<?php echo $quest->getKey(); ?>', <?php echo $status; ?>);">To top</a>
                </td>
            </tr>

            <?php if($tickets[$quest->getKey()]): ?>
                <?php foreach($tickets[$quest->getKey()] as $ticket): ?>
                    <tr>
                        <td style="width: 200px;"><?php echo $ticket->getTimestamp(); ?></td>
                        <td><?php echo $ticket->parse(); ?></td>
                        <td style="width: 200px;text-align: right;">
                            <a href="javascript:void(0)" class="butn" onclick="Rune.Quests.Tickets.edit('<?php echo $ticket->getKey(); ?>');">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        <?php endforeach; ?>
    </table>
</div>