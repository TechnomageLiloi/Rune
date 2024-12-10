<link href="<?php echo ROOT_URL; ?>/Engine/API/Databank/Search/Style.css" rel="stylesheet" />

<div id="wiki-show">
    <table>
        <?php foreach($collection as $child): ?>
            <tr>
                <td><a href="<?php echo $child->getPath(); ?>"></a></td>
                <td><?php echo $child->getTitle(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        Rune.Trigger.initialize();
    </script>
</div>