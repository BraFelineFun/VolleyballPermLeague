<?php

function userErrorDisplay($errorMsg, $header) {
    ob_start();
    ?>
    <?php if($errorMsg): ?>


        <div class="userErrorContainer">
            <div class="userError">
                <div class="error">
                    <h1>При работе приложения произошла ошибка!</h1>
                    <?php if($header): ?>
                        <h2><?=$header?></h2>
                    <?php endif; ?>
                    <hr>
                    <p>
                        <?=$errorMsg?>
                    </p>
                </div>

                <div class="backToMain">
                    <div class="backToMain_link">
                        <a href="/" class="link__bright">
                            Вернуться на главную
                        </a>
                    </div>
                </div>
            </div>
        </div>


    <?php
    endif;
    return ob_get_clean();
}