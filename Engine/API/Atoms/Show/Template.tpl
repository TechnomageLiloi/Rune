<link href="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Show/Style.css" rel="stylesheet" />
<div id="atoms-show">
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
        <br/>
        <?php if($admin): ?>
            <a href="javascript:void(0)" onclick="Rune.Atoms.edit();">Edit</a> &diams;
            <a href="javascript:void(0)" onclick="Rune.Atoms.RID.edit();">Change RID</a> &diams;
            <a href="javascript:void(0)" onclick="Rune.Atoms.create();">Create child</a>
        <?php endif; ?>
    </div>

    <hr/>

    <?php echo $entity->parseProgram(); ?>

    <hr/>

    <table>
        <tr>
            <td>
                <?php if($children->count()): ?>
                <h1>Tree</h1>
                <table class="tree">
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                    </tr>
                    <?php foreach($children as $child): ?>
                    <tr>
                        <td>
                            <?php echo $child->getTile(); ?>
                        </td>
                        <td>
                            <?php echo $child->getTypeTitle(); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>