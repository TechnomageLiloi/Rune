<table id="table-road">
    <tr>
        <td>
            <?php echo $entity->getTitle(); ?>
        </td>
        <td style="text-align: right;">
            <a href="javascript:void(0)" onclick="Stones.API.Tickets.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
        </td>
    </tr>
</table>
