<link href="<?php echo ROOT_URL; ?>/Engine/API/Tickets/Edit/Style.css" rel="stylesheet" />

<div id="application-Quests-edit">
    <a href="javascript:void(0)" onclick="Rune.Levels.Tickets.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyQuest(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Levels.Quest.show(1);">Cancel</a>
    <hr/>
    <table>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>
        <tr><td>Status</td><td><input type="text" name="status" value="<?php echo $entity->getStatus(); ?>"/></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Levels.Tickets.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyQuest(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Levels.Quest.show(1);">Cancel</a>
</div>