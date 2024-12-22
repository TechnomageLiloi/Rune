<link href="<?php echo ROOT_URL; ?>/Engine/API/Questions/Test/Style.css" rel="stylesheet" />
<div id="testing-<?php echo $entity->getID(); ?>" class="testing-card">

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;"><?php echo $entity->getParseTheory(); ?></td>
            <td style="text-align: right;">
                <video id="tube" src="<?php echo $entity->getElement('video'); ?>" controls></video>
            </td>
        </tr>
    </table>

    <hr/>

    <?php $files = $entity->getElement('files'); ?>

    <ol>
        <?php foreach($files as $file): ?>
            <li>
                <a href="javascript:void(0);" onclick="$('#tube').attr('src', '<?php echo $file; ?>');"><?php echo $file; ?></a>
            </li>
        <?php endforeach; ?>
    </ol>

    <hr/>

</div>