<link href="<?php echo ROOT_URL; ?>/Engine/API/Databank/Search/Style.css" rel="stylesheet" />

<div id="wiki-show">
    <input type="text" id="rid" value="<?php echo $RID; ?>" />
    <a href="javascript:void(0)" class="butn" onclick="Rune.Databank.search($('#rid').val());">Search...</a>
    <hr/>

    <table>
        <?php foreach($collection as $child): ?>
            <tr>
                <td><?php echo $child->getKey(); ?></td>
                <td><?php echo $child->getTitle(); ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="Rune.Databank.show('<?php echo $entity->getKey(); ?>');">Show</a>
                    <a href="javascript:void(0)" onclick="Rune.Databank.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        Rune.Trigger.initialize();
    </script>
</div>