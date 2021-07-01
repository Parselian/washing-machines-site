<?php
    require_once(__DIR__ . '/assets/configs/config.php');
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./assets/css/reset.css">
	<link rel="stylesheet" href="./assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
<header class="header">
    <div class="container header__wrap">
        <div class="header__logo">
            <svg class="header__logo-icon">
                <use xlink:href="./assets/stack/sprite.svg#logo-icon"></use>
            </svg>
			<div class="header__logo-text">
				<span class="line-break text_accent">Честный</span>
				Мастер
			</div>
        </div>
        <div class="header__col header__col-first">
            <div class="header__jivo">
                Мы онлайн!
                <a href="#" class="header__jivo-link">Напишите нам</a>
            </div>
            <nav class="header__menu">
                <a href="#" class="header__menu-item">Цены</a>
                <a href="#" class="header__menu-item">Преимущества</a>
                <a href="#" class="header__menu-item">Отзывы</a>
                <a href="#" class="header__menu-item">Контакты</a>
            </nav>
        </div>
        <div class="header__col">
            <div class="header__contacts">
                <a href="tel:<?= $phone_link?>" class="header__contacts-phone">
					<svg class="header__contacts-phone-icon">
						<use xlink:href="./assets/stack/sprite.svg#phone"></use>
					</svg>
					<?= $phone_format?>
				</a>
                <div class="header__contacts-worktime">8:00 — 23:00 Без выходных</div>
            </div>
            <button class="button header__button">
				<svg class="header__button-icon">
					<use xlink:href="./assets/stack/sprite.svg#phone"></use>
				</svg>
				<span class="header__button-text">
					Вызвать мастера
				</span>
			</button>
			<div class="burger-btn is-active" id="hamburger-1">
			  <span class="line"></span>
			  <span class="line"></span>
			  <span class="line"></span>
			</div>
        </div>
    </div>
</header>
</body>
</html>