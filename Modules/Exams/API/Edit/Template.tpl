<link href="<?php echo ROOT_URL; ?>/Modules/Exams/API/Edit/Style.css" rel="stylesheet" />

<div id="exams-edit">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Opponents.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <table>
        <tr>
            <td>Specie</td>
            <td>
                <input type="text" name="specie" value="<?php echo $entity->getSpecie(); ?>">
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="title" value="<?php echo $entity->getTitle(); ?>">
            </td>
        </tr>
    </table>
    <a href="javascript:void(0)" class="butn" onclick="Rune.Exams.Opponents.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>
