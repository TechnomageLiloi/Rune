<link href="<?php echo ROOT_URL; ?>/Engine/API/Road/Edit/Style.css" rel="stylesheet" />

<div id="application-diary-edit">
    <a href="javascript:void(0)" onclick="Rune.Diary.Problems.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table>
        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Diary.Problems.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>