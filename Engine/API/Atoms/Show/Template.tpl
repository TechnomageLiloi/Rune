<link href="/Engine/API/Atoms/Show/Style.css" rel="stylesheet" />
<div id="atoms-show" class="stylo">
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <hr/>

    <?php echo $entity->parseProgram(); ?>

    <hr/>

    <div id="game-maps-collection">
        <script></script>
    </div>
</div>