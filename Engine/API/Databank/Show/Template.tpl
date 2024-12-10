<link href="<?php echo ROOT_URL; ?>/Engine/API/Databank/Show/Style.css" rel="stylesheet" />

<div id="wiki-show">
    <table>
        <tr>
            <td>
                <?php echo $entity->parseProgram(); ?>
            </td>
            <td>
                <div class="seeds">
                    <?php echo $entity->getSeeds(); ?>
                </div>

                <?php if($children->count()): ?>
                <hr/>
                <h3>Sub-nodes</h3>
                <table class="tree">
                    <?php foreach($children as $child): ?>
                    &diams; <a href="<?php echo $child->getPath(); ?>"><?php echo $child->getTitle(); ?></a><br/>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <script>
        Rune.Trigger.initialize();
    </script>
</div>