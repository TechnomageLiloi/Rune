<link href="<?php echo ROOT_URL; ?>/Modules/Maps/API/Show/Style.css" rel="stylesheet" />

<div id="modules-maps-show">
    <table>
        <tr>
            <td id="left-top">

            </td>
            <td id="map" rowspan="2">
                <?php echo $entity->parseMap(); ?>
            </td>
            <td id="right-top">

            </td>
        </tr>
        <tr>
            <td id="left-bottom">

            </td>
            <td id="right-bottom">

            </td>
        </tr>
    </table>
</div>

<script>
    Rune.Trigger.initialize();
</script>