<link href="/Engine/API/Atoms/Show/Style.css" rel="stylesheet" />
<div id="atoms-show" class="stylo">
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <hr/>

    <?php echo $entity->parseProgram(); ?>

    <hr/>

    <table>
        <?php foreach($children as $child): ?>
        <tr>
            <td>
                <a href="<?php echo $child->getUrl(); ?>"><?php echo $child->getTitle(); ?></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>