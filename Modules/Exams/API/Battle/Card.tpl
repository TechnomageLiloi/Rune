<link href="<?php echo ROOT_URL; ?>/Engine/API/Questions/Test/Style.css" rel="stylesheet" />
<div id="testing-<?php echo $entity->getID(); ?>" class="testing-card">

    <div class="question">
        <div class="theory" style="display: none;">
            <?php echo $entity->getParseTheory(); ?>
        </div>
        <a href="javascript:void(0)" onclick="$(this).parent().find('.theory').toggle();">Theory</a>
        <a href="javascript:void(0)" onclick="Testing.turnAround('<?php echo $entity->getID(); ?>');">Turn around</a>
        <hr/>
        <?php echo \Liloi\Stylo\Parser::parseString($entity->getElement('question')); ?>
    </div>

    <div class="answer" style="display: none;">
        <a href="javascript:void(0)" onclick="Testing.turnAround('<?php echo $entity->getID(); ?>');">Turn around</a>
        <hr/>
        <?php echo \Liloi\Stylo\Parser::parseString($entity->getElement('answer')); ?>
    </div>

    <hr/>
    <input type="text" class="question-try" />
</div>