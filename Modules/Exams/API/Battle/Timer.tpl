<link href="<?php echo ROOT_URL; ?>/Engine/API/Questions/Test/Style.css" rel="stylesheet" />
<script>
    let countdown = function (timer)
    {
        setInterval(function () {
            var minutes = parseInt(timer / 60, 10);
            var seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            $('#testing-<?php echo $entity->getID(); ?> h3').html(minutes + ":" + seconds);

            if (--timer < 0) {
                timer = 0;
                $('#testing-<?php echo $entity->getID(); ?>').css('background-color', '#ffebeb');
            }
        }, 1000);
    };
</script>
<div id="testing-<?php echo $entity->getID(); ?>" class="testing-card">
    <h3>Timer</h3>
    <?php echo $entity->getParseDialog(); ?>
    <hr/>
    <script>countdown(900);</script>
</div>