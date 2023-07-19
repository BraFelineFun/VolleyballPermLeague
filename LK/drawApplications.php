<div class="personal__data application">
    <div class="fieldGroupTitle title2">Заявки:</div>

    <?php
    $query = "
                                SELECT P.id as player_id, P.height as player_height,
                                    U.name as player_name, U.image as player_image,
                                    IFNULL(C.goal_count, 0) as goal_count
                                FROM PLAYER AS P
                                LEFT JOIN USER AS U
                                    ON P.key_user=U.id
                                LEFT JOIN (SELECT COUNT(key_player) as goal_count, key_player FROM HIGHLIGHT as H WHERE H.action='goal' GROUP BY key_player) as C
                                    ON C.key_player=P.id
                                JOIN TEAM_2_PLAYER as T2P
                                    ON T2P.key_player=P.id
                                WHERE
                                    T2P.key_team = {$teamData["id"]} AND T2P.status='pending'
                            ";

    try {
        DB::getAdapter();
        $players = DB::executeSQL($query);
    } catch (Exception $e) {
        $players = [];
    }

    ?>

    <div class="blog__cards">
        <?php foreach ($players as $player): ?>
            <div class="blog__card">
                <div class="image__section">
                    <a class="image__block" href="/player.php?id=<?= $player["player_id"]?>">
                        <img src="<?= $player["player_image"] === ""? "/Resources/img/user_content/user_image/default.png": $player["player_image"] ?>" alt="player_image">
                    </a>
                </div>


                <div class="info__section">
                    <div class="info__block">
                        <div class="info__title">
                            Имя
                        </div>
                        <div class="info__data">
                            <?= $player["player_name"] ?>
                        </div>
                    </div>

                    <div class="info__block">
                        <div class="info__title">
                            Рост
                        </div>
                        <div class="info__data">
                            <?= $player["player_height"] ?>см
                        </div>
                    </div>

                    <div class="info__block">
                        <div class="info__title">
                            Забитые мячи
                        </div>
                        <div class="info__data">
                            <?= $player["goal_count"] ?>
                        </div>
                    </div>

                    <div class="info__block">
                        <div class="approve">
                            <a href="../Helpers/acceptPlayer.php?id=<?= $player["player_id"] ?>&approved=1"
                               class="approve__button"
                            >
                                <img src="../Resources/img/LK/approve.png" alt="approve">
                            </a>
                            <a href="../Helpers/acceptPlayer.php?id=<?= $player["player_id"] ?>&approved=0"
                               class="approve__button"
                            >
                                <img src="../Resources/img/LK/decline.png" alt="decline">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


        <?php if(!$players): ?>
            <div class="title2"> Ничего по запросу не найдено</div>
        <?php endif; ?>

    </div>
</div>