<link href="<?php echo ROOT_URL; ?>/Engine/API/Tickets/Edit/Style.css" rel="stylesheet" />

<div id="application-Quests-edit">
    <a href="javascript:void(0)" onclick="Rune.Quests.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Quests.Quest.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td>Title</td><td><textarea name="title"><?php echo $entity->getTitle(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Quests.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Quests.Quest.show();">Cancel</a>
</div>