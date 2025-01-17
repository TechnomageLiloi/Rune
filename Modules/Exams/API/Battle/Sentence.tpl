<link href="<?php echo ROOT_URL; ?>/Engine/API/Questions/Test/Style.css" rel="stylesheet" />
<div id="testing-<?php echo $entity->getID(); ?>" class="testing-sentence">
    <div class="theory" style="display: none;">
        <?php echo $entity->getParseTheory(); ?>
    </div>
    <a href="javascript:void(0)" onclick="$(this).parent().find('.theory').toggle();">Theory</a>
    <a href="javascript:void(0)" onclick="Testing.checkSentence('<?php echo $entity->getID(); ?>');">Check</a>
    <hr/>
    <div class="sentence">
        <?php $sentence = $entity->getElement('sentence'); ?>

        <?php foreach($sentence as $block): ?>
            <?php if(str_starts_with($block, '==')): ?>
                <input type="text" data-correct="<?php echo str_replace('==', '', $block); ?>">
            <?php else: ?>
                <?php echo $block; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>