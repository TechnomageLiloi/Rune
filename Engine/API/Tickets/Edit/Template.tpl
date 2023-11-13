<style>
    #ticket-edit input,
    #ticket-edit select,
    #ticket-edit textarea
    {
        width: 50%;
    }

    #ticket-edit textarea
    {
        height: 300px;
    }
</style>
<div id="ticket-edit">
    <a href="javascript:void(0)" onclick="Stones.API.Tickets.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getProjectKey(); ?>');">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>

        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>

        <tr><td>Timestamp</td><td><input type="text" name="dt" value="<?php echo $entity->getDt(); ?>"/></td></tr>

        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Stones.API.Tickets.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getProjectKey(); ?>');">Save</a>
</div>