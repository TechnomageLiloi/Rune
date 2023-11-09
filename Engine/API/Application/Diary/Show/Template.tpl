<link href="<?php echo ROOT_URL; ?>/Engine/API/Application/Diary/Show/Style.css" rel="stylesheet" />

<div id="application-diary-show" class="stylo">
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <div class="controls">
        <a href="javascript:void(0)" onclick="Tardis.Application.Diary.show();">Show</a> &diams;
        <a href="javascript:void(0)" onclick="Tardis.Application.Diary.edit();">Edit</a>
    </div>

    <div class="data">
        <?php echo $entity->getID(); ?>
    </div>

    <hr/>

    <div class="lesson">

    </div>

    <hr/>

    <?php echo $entity->parse(); ?>
</div>