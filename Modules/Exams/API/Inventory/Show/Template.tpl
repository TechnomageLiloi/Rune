<style>
    #modules-exams-inventory-show
    {
        padding: 10px;
        border: gray 3px solid;
        border-radius: 5px;
    }
</style>
<div id="modules-exams-inventory-show">
    <div class="controls">
        &diams;
        <a href="javascript:void(0)" class="butn" onclick="Rune.Maps.show();" style="float: right;">X</a>
    </div>

    <h1><?php echo $entity->getTitle(); ?></h1>
    <hr/>
    <?php echo $entity->getKey(); ?>
    <hr/>
    <?php echo $entity->getParse(); ?>
</div>