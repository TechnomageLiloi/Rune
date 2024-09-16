<link href="<?php echo ROOT_URL; ?>/Engine/API/Road/Search/Style.css" rel="stylesheet" />

<div id="application-diary-edit">
    <style>
        td, th {
            vertical-align: top;
            margin: 0;
        }

        td p {
            margin: 0;
        }
    </style>
    <table>
        <tr>
            <th style="text-align: left;width: 300px;">Step</th>
            <th style="text-align: left;">Summary</th>
            <th style="text-align: right;">Tech</th>
            <th style="text-align: right;width: 100px;">Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
            <tr>
                <td><?php echo $entity->getStep(); ?></td>
                <td><?php echo $entity->parse(); ?></td>
                <td style="text-align: right;">
                    <?php echo $entity->getTypeTitle(); ?> &diams;
                    <?php echo $entity->getData(); ?>
                </td>
                <td style="text-align: right;">
                    <a href="javascript:void(0)" onclick="I60.Road.show('<?php echo $entity->getKey(); ?>');" class="butn">Show</a> &diams;
                    <a href="javascript:void(0)" onclick="I60.Road.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>