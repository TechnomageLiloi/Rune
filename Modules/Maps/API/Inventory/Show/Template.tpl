<link href="<?php echo ROOT_URL; ?>/Modules/Maps/API/Inventory/Show/Style.css" rel="stylesheet" />

<div id="maps-inventory-show">
    <h1>Inventory</h1>
    <hr/>
    <table>
        <tr>
            <th>Item</th>
            <th>Type</th>
        </tr>
        <?php foreach($inventory as $item): ?>
        <tr>
            <td><?php echo $item->getTitle(); ?></td>
            <td><?php echo $item->getTypeTitle(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>