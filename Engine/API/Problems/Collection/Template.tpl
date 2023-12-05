<style>
    #problem-group table
    {
        width: 100%;
    }

    #problem-group table td
    {
        border-bottom: silver 1px dashed;
    }

    #problem-group table tr:hover
    {
        background-color: #ffffbd;
    }

</style>
<div id="problem-group">
    <a href="javascript:void(0)" class="butn" onclick="Rune.Degrees.show('<?php echo $uid; ?>');">Show degree</a>
    &diams;
    <a href="javascript:void(0)" class="butn" onclick="Rune.Lessons.create();">Create lesson</a>
    <h1>Subjects:</h1>
    <?php foreach($group as $id_type => $collection): ?>
        <h2><?php echo $id_type; ?>. <?php echo $types[$id_type]; ?></h2>
        <a href="javascript:void(0)" onclick="Rune.Problems.create('<?php echo $degree->getKey(); ?>', '<?php echo $id_type; ?>', '<?php echo $uid; ?>')">Create</a>
        <table>
            <?php foreach($collection as $key_problem => $entity): ?>
            <tr>
                <td>
                    <a style="color: black;" href="javascript:void(0)" onclick="Rune.Problems.show('<?php echo $key_problem; ?>')">
                        <?php echo $entity->getTitle(); ?>
                    </a>
                </td>
                <td style="text-align: right; width: 100px;"><?php echo $entity->getStatusTitle(); ?></td>
                <td style="text-align: right; width: 100px;"><?php echo $entity->getMark(); ?></td>
                <td style="text-align: right; width: 300px;">
                    <a href="javascript:void(0)" onclick="Rune.Problems.edit('<?php echo $key_problem; ?>', '<?php echo $uid; ?>')">Edit</a>
                    &diams;
                    <a href="javascript:void(0)" onclick="Rune.Problems.remove('<?php echo $key_problem; ?>', '<?php echo $uid; ?>')">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>