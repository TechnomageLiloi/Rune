<link href="<?php echo ROOT_URL; ?>/Engine/API/Road/Edit/Style.css" rel="stylesheet" />

<div id="application-diary-edit">
    <a href="javascript:void(0)" onclick="Rune.Diary.Road.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Diary.Road.show('<?php echo $entity->getKey(); ?>');">Cancel</a>
    <hr/>
    <table>
        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>
        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Diary.Road.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Rune.Diary.Road.show('<?php echo $entity->getKey(); ?>');">Cancel</a>
</div>