<?php
function getMessage($msg, $type='success'){

    ?>
    <div class="alert alert-<?php echo $type; ?> text-center">
        <?php echo $msg; ?>
    </div>
    <?php

}
