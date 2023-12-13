<link href="<?php echo ROOT_URL; ?>/Engine/API/Atoms/Show/Style.css" rel="stylesheet" />
<div id="atoms-show">
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
        <br/><br/>
        <?php if($admin): ?>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.edit();">Edit</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.RID.edit();">Change RID</a>
            <a href="javascript:void(0)" class="butn" onclick="$('#atoms-show .article').toggle();">Article</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Atoms.create();">Create child</a>
            <a href="javascript:void(0)" class="butn" onclick="Rune.Lessons.create();">Create lesson</a>
        <?php endif; ?>
    </div>

    <hr/>

    <div class="stylo">
        <?php echo $entity->parseProgram(); ?>
    </div>

    <div class="article" style="display: none;">
        <hr/>
        <?php echo $entity->parseArticle(); ?>
    </div>

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

            <td>
                <h1>Lessons</h1>
                <?php if($lessons->count()): ?>
                    <table class="tree">
                        <tr>
                            <th>Time of start</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach($lessons as $child): ?>
                        <tr>
                            <td><?php echo $child->getStart(); ?></td>
                            <td><?php echo $child->getComment(); ?></td>
                            <td style="text-align: right;">
                                <a href="javascript:void(0)" class="butn" onclick="Rune.Lessons.edit('<?php echo $child->getKey(); ?>')">Edit</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    There is no any lesson.
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>