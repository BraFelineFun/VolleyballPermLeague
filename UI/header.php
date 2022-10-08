<?php
$currPage = basename($_SERVER["SCRIPT_FILENAME"]);
?>

<header>
    <div class="burger__wrapper">

        <div class="burger__content">
            <div class="burger__links">
                <?php $pageLink = 'index.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../index.php">Главная</a>
                </div>

                <?php $pageLink = 'news.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../news.php">Блог</a>
                </div>

                <?php $pageLink = 'prices.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../prices.php">Каталог</a>
                </div>

                <?php $pageLink = 'contacts.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../contacts.php">Контакты</a>
                </div>
            </div>
        </div>

    </div>
    <div class="header__container">
        <div class="header container">
            <div class="companyName">
                <div>
                    <a href="../index.php">
                        <img class="companyImage" src="../Resources/img/furniture.png" alt="logo">
                    </a>
                </div>
                <div>
                    <div class="title2">Interior<span class="accent">.</span>
                    </div>
                </div>
            </div>



            <div class="header__links">
                <?php $pageLink = 'index.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../index.php">Главная</a>
                </div>

                <?php $pageLink = 'news.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../news.php">Блог</a>
                </div>

                <?php $pageLink = 'prices.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../prices.php">Каталог</a>
                </div>

                <?php $pageLink = 'contacts.php' ?>
                <div class="header__link
                <?php if($currPage === $pageLink) echo 'header__currentPage';?>
            ">
                    <a href="../contacts.php">Контакты</a>
                </div>
            </div>


            <div class="burger__iconContainer">
                <div class='burger'>
                    <span></span>
                </div>
            </div>


        </div>
    </div>

</header>
