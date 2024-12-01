<link href="<?php echo ROOT_URL; ?>/Modules/News/API/Topics/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Rune.News.Topics.create();">Create new topic</a>
        <a href="javascript:void(0)" class="butn" onclick="Rune.Maps.show();" style="float: right;">x</a>
    </div>

    <table>
        <?php foreach($topics as $topic): ?>
            <tr>
                <td>#<?php echo $topic->getKey(); ?></td>
                <td><?php echo $topic->getTitle(); ?></td>
                <td>
                    <a href="javascript:void(0)" class="butn" onclick="Rune.News.Topics.edit('<?php echo $topic->getKey(); ?>');">Edit topic</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>