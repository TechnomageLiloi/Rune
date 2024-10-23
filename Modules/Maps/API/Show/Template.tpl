<link href="<?php echo ROOT_URL; ?>/Modules/Maps/API/Show/Style.css" rel="stylesheet" />

<div id="modules-maps-show">
    <table>
        <tr>
            <td></td>
            <td>
                <div id="wrap-map">
                    <canvas id="map" width="400" height="400"></canvas>
                </div>
            </td>
            <td></td>
        </tr>
    </table>
</div>

<script src="<?php echo ROOT_URL; ?>/Modules/Maps/API/Show/Map.js"></script>

<script>
    Map.data = <?php echo $map; ?>;
</script>