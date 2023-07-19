<?php
// подключен конфиг
if (!isset($currPage))
    $currPage = "";
?>

<header>
    <div class="burger__wrapper">

        <div class="burger__content">
            <div class="burger__links">

                <?php foreach (PAGES as $viewName => $pageName): ?>
                    <div class="header__link
                    <?= $currPage === $pageName? 'header__currentPage': '';?>
                    ">
                        <a href="../<?= $pageName ?>">
                            <?= $viewName ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <div class="header__container">
        <div class="header container">
            <div class="companyName">
                <div>
                    <a href="../index.php">
                        <img class="companyImage" src="../Resources/img/icon.png" alt="logo">
                    </a>
                </div>
                <div>
                    <div class="title2">Volley<span class="accent">.</span>
                    </div>
                </div>
            </div>



            <div class="header__links">
                <?php foreach (PAGES as $viewName => $pageName): ?>
                    <div class="header__link
                    <?= $currPage === $pageName? 'header__currentPage': '';?>
                    ">
                        <a href="../<?= $pageName ?>">
                            <?= $viewName ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="burger__iconContainer">
                <div class='burger'>
                    <span></span>
                </div>
            </div>


        </div>
    </div>

</header>
