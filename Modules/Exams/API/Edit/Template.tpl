<link href="<?php echo ROOT_URL; ?>/Modules/Exams/API/Edit/Style.css" rel="stylesheet" />

<div id="exams-edit">
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
</div>
