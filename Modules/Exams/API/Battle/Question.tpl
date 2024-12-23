<div>
    <select class="crystal-status" name="status">
        <?php foreach($statuses as $key => $value): ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>

    <input class="crystal-note" type="text">

    <a href="javascript:void(0)" onclick="Opponent.lock('<?php echo $entity->getKey(); ?>');" class="butn">Lock</a>

    <hr/>

    <?php echo $inner; ?>
</div>