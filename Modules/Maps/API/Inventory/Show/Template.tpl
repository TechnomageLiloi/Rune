<link href="<?php echo ROOT_URL; ?>/Modules/Maps/API/Inventory/Show/Style.css" rel="stylesheet" />

<div id="maps-inventory-show">
    <h1>Inventory</h1>
    <hr/>
    <table>
        <tr>
            <th>Item</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        <?php foreach($inventory as $item): ?>
        <tr>
            <td><?php echo $item->getTitle(); ?></td>
            <td><?php echo $item->getTypeTitle(); ?></td>
            <td>
                <a href="javascript:void(0)" onclick="Rune.Maps.Inventory.edit('<?php echo $item->getKey(); ?>');" class="butn">Edit</a>
                <a href="javascript:void(0)" onclick="Rune.Maps.Inventory.drop('<?php echo $item->getKey(); ?>');" class="butn">Drop</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>