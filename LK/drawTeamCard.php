<?php

?>

<div class="teamCardContainer">
    <a class="teamCard__link" href='<?= $teamData['id'] ?>'>
        <div class="teamCard">
            <div class="teamCard__image">
                <img src='<?= $teamData['image'] ?>' alt="teamImage">
            </div>
            <div class="teamCard__name">
                <b><?= $teamData['name'] ?></b>
            </div>
        </div>
    </a>
</div>
