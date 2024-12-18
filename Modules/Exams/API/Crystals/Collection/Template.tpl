<style>
    #problem-group table
    {
        width: 100%;
    }

    #problem-group table td
    {
        border-bottom: silver 1px dashed;
        padding-bottom: 5px;
    }

    #problem-group table tr:hover
    {
        background-color: #e5ffe0;
    }

    #problem-group table td.not-done
    {
        background-color: #ffd5d5;
    }

    #problem-group table td.done
    {
        background-color: #c4ffc4;
    }

</style>
<div id="problem-group">
    <a href="javascript:void(0)" onclick="Rune.Exams.Crystals.create('<?php echo $key_item; ?>');" class="butn">Create question</a>
    <a href="javascript:void(0)" onclick="Rune.Exams.Crystals.suite('<?php echo $key_item; ?>');" class="butn">Exam</a>
    <hr/>
    <table>
        <tr>
            <th>Done</th>
            <th>Title</th>
            <th>Tags</th>
            <th>Type</th>
            <th>Status</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
        <tr>
            <td class="<?php echo $entity->getDoneClass(); ?>"></td>
            <td><?php echo $entity->getTitle(); ?></td>
            <td><?php echo $entity->getTags(); ?></td>
            <td><?php echo $entity->getTypeTitle(); ?></td>
            <td><?php echo $entity->getStatusTitle(); ?></td>
            <td style="text-align: right; width: 300px;">
                <a href="javascript:void(0)" onclick="Rune.Exams.Crystals.test('<?php echo $entity->getKey(); ?>');" class="butn">Test</a>
                <a href="javascript:void(0)" onclick="Rune.Exams.Crystals.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
                <a href="javascript:void(0)" onclick="Rune.Exams.Crystals.remove('<?php echo $entity->getKey(); ?>');" class="butn">Make obsolete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>