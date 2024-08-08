<link href="<?php echo ROOT_URL; ?>/Engine/API/Teacher/Show/Style.css" rel="stylesheet" />
<div id="teacher-show">
    <table>
        <tr>
            <td>
                <img src="/Teacher.jpg">
            </td>
            <td>
                <h1>Teacher</h1>
                <hr>
                <a href="javascript:void(0)" class="butn" onclick="Rune.Teacher.save();">Save words</a>
                <hr>
                <textarea><?php echo $entity->getTeacher(); ?></textarea>
            </td>
        </tr>
    </table>
</div>