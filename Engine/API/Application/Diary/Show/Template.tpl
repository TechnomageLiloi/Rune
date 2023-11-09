<link href="<?php echo ROOT_URL; ?>/Engine/API/Application/Diary/Show/Style.css" rel="stylesheet" />

<div id="application-diary-show" class="stylo">

    <div class="controls">
        <input id="dt" type="date" value="<?php echo $dt; ?>" />
        <a href="javascript:void(0)" onclick="Tardis.Application.Diary.show($('#dt').val());">Diary</a>
    </div>

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

        <table>
            <tr>
                <th>Comment</th>
                <th>Status</th>
                <th>Mark</th>
                <th style="text-align: right;">Actions</th>
            </tr>
            <?php foreach($lessons as $key_lesson => $entity): ?>
            <tr>
                <td>
                    <?php echo $entity->getComment(); ?>
                </td>
                <td><?php echo $statuses[$entity->getStatus()]; ?></td>
                <td><?php echo $entity->getMark(); ?></td>
                <td style="text-align: right;">
                    <a href="javascript:void(0)" onclick="Tardis.Lessons.edit('<?php echo $key_lesson; ?>')">Edit</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Tardis.Lessons.remove('<?php echo $key_lesson; ?>')">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>

    <hr/>

    <?php echo $entity->parse(); ?>
</div>