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

</style>
<div id="problem-group">
    <a href="javascript:void(0)" onclick="Rune.Exams.Questions.create('<?php echo $key_item; ?>');" class="butn">Create question</a>
    <a href="javascript:void(0)" onclick="Rune.Exams.Questions.suite('<?php echo $key_item; ?>');" class="butn">Exam</a>
    <hr/>
    <table>
        <tr>
            <th>Title</th>
            <th>Tags</th>
            <th>Type</th>
            <th>Status</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
        <tr>
            <td><?php echo $entity->getTitle(); ?></td>
            <td><?php echo $entity->getTags(); ?></td>
            <td><?php echo $entity->getTypeTitle(); ?></td>
            <td><?php echo $entity->getStatusTitle(); ?></td>
            <td style="text-align: right; width: 300px;">
                <a href="javascript:void(0)" onclick="Rune.Exams.Questions.test('<?php echo $entity->getKey(); ?>');" class="butn">Test</a>
                <a href="javascript:void(0)" onclick="Rune.Exams.Questions.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
                <a href="javascript:void(0)" onclick="Rune.Exams.Questions.remove('<?php echo $entity->getKey(); ?>');" class="butn">Make obsolete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>