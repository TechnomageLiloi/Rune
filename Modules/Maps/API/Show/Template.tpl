<link href="<?php echo ROOT_URL; ?>/Modules/Maps/API/Show/Style.css" rel="stylesheet" />

<div id="modules-maps-show">
    <table>
        <tr>
            <td>
                <div id="side-left"></div>
            </td>
            <td>
                <div id="wrap-map">
                    <canvas id="map" width="400" height="400"></canvas>
                </div>
            </td>
            <td>
                <div id="side-right">
                    <a href="javascript:void(0)" onclick="Rune.Maps.saveMap();" class="butn">Save map</a>
                    <!--<a href="javascript:void(0)" onclick="Rune.Exams.Inventory.getInventory();" class="butn">Inventory</a>-->
                    <hr/>
                    <div id="elements"></div>
                </div>
            </td>
        </tr>
    </table>
</div>

<script src="<?php echo ROOT_URL; ?>/Modules/Maps/API/Show/Map.js"></script>

<script>
    Map.data = <?php echo $map; ?>;
    //Rune.Exams.Inventory.getInventory();
</script>