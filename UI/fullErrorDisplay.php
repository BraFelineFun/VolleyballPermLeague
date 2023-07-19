<?php

function fullDisplayError($exception, $header) {
    ob_start();
?>
    <?php if($exception): ?>
        <div class="error">
            <h1>Ошибка при выполнении</h1>
            <?php if($header): ?>
                <h2><?=$header?></h2>
            <?php endif; ?>
            <hr>
            <p>
                <?=$exception->getMessage();?>
            </p>
        </div>
    <?php
        endif;
        return ob_get_clean();
}

