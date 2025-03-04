<div id="modules-road-show" class="stylo">
    <table>
        <?php foreach($crystals as $crystal): ?>
            <tr>
                <td style="width: 20%;"><?php echo $crystal->getKey(); ?></td>
                <td><?php echo $crystal->getData(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>