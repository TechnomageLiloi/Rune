<link href="/vendor/technomage-liloi/rune/Engine/API/Atoms/Show/Style.css" rel="stylesheet" />
<div id="atoms-show">
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
        <br/>
        <?php if($admin): ?>
            <a href="javascript:void(0)" onclick="Rune.Atoms.edit();">Edit</a>
        <?php endif; ?>
    </div>

    <hr/>

    <?php echo $entity->parseProgram(); ?>

    <hr/>

    <table>
        <?php foreach($children as $child): ?>
        <tr>
            <td>
                <a href="<?php echo $child->getUrl(); ?>"><?php echo $child->getTitle(); ?></a>
            </td>
            <td>
                <?php echo $child->getTypeTitle(); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>