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
    <a href="javascript:void(0)" onclick="Rune.Exams.Inventory.create();" class="butn">Create question</a>
    <hr/>
    <table>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
        <tr>
            <td><?php echo $entity->getTitle(); ?></td>
            <td><?php echo $entity->getTypeTitle(); ?></td>
            <td style="text-align: right; width: 300px;">
                <a href="javascript:void(0)" onclick="Rune.Exams.Questions.collection('<?php echo $entity->getKey(); ?>');" class="butn">Questions</a>
                <a href="javascript:void(0)" onclick="Rune.Exams.Inventory.show('<?php echo $entity->getKey(); ?>');" class="butn">Show</a>
                <a href="javascript:void(0)" onclick="Rune.Exams.Inventory.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
                <a href="javascript:void(0)" onclick="Rune.Exams.Inventory.remove('<?php echo $entity->getKey(); ?>');" class="butn">Remove</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>