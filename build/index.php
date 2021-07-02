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
				<a href="tel:<?= $phone_link ?>" class="header__contacts-phone">
					<svg class="header__contacts-phone-icon">
						<use xlink:href="./assets/stack/sprite.svg#phone"></use>
					</svg>
                    <?= $phone_format ?>
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

<section class="promo">
	<picture>
		<source src="./assets/images/webp/promo-bg.webp" type="image/webp">
		<img src="./assets/images/promo-bg.jpg" alt="Ремонт стиральных машин в СПб" class="promo__bg">
	</picture>
	<div class="container promo__wrap">
		<h1 class="promo__title">
			Ремонт стиральных машин на дому
			в
			<div class="text_accent text_bold">Санкт-Петербурге</div>
		</h1>
		<div class="promo__price">
			<div class="promo__price-label">Ремонт</div>
			от <span class="text_accent">300 руб.</span>
		</div>
		<div class="promo__common">
			<button class="button button_alt promo__common-item" value="Не сливает воду">Не сливает воду</button>
			<button class="button button_alt promo__common-item" value="Не отжимает">Не отжимает</button>
			<button class="button button_alt promo__common-item" value="Не включается">Не включается</button>
			<button class="button button_alt promo__common-item" value="Не вращается">Не вращается</button>
			<button class="button button_alt promo__common-item" value="Искрит">Искрит</button>
			<button class="button button_alt promo__common-item" value="Не открывается люк">Не открывается люк</button>
			<button class="button button_alt promo__common-item" value="Не греет воду">Не греет воду</button>
		</div>
		<form action="#" class="form promo__form">
			<input type="text" name="user_phone" class="form__input promo__form-input" placeholder="Ваш телефон:" required>
			<button class="button promo__form-button">Вызвать мастера</button>
		</form>
		<picture>
			<source srcset="./assets/images/webp/promo-collage.webp" type="image/webp">
			<img src="./assets/images/promo-collage.png" alt="Ремонт стиральных машин в СПб" class="promo__collage">
		</picture>
	</div>
</section>

<section class="prices">
	<section class="features">
		<div class="container features__wrap">
			<div class="features__card">
				<svg class="features__card-icon">
					<use xlink:href="./assets/stack/sprite.svg#delivery-truck"></use>
				</svg>
				<h3 class="features__card-title">
					<span class="text_accent">Бесплатный</span> выезд
				</h3>
				<div class="features__card-text">
					Наш мастер бесплатно приедет к вам в течении 20 минут
				</div>
			</div>
			<div class="features__card">
				<svg class="features__card-icon">
					<use xlink:href="./assets/stack/sprite.svg#money-bag"></use>
				</svg>
				<h3 class="features__card-title">
					<span class="text_accent">Честные</span> цены
				</h3>
				<div class="features__card-text">
					Мы не делаем никаких наценок на наши услуги
				</div>
			</div>
			<div class="features__card">
				<svg class="features__card-icon">
					<use xlink:href="./assets/stack/sprite.svg#guarantee"></use>
				</svg>
				<h3 class="features__card-title">
					<span class="text_accent">Пожизненная</span> гарантия
				</h3>
				<div class="features__card-text">
					Наш мастер бесплатно приедет к вам в течении 20 минут
				</div>
			</div>
			<div class="features__card">
				<svg class="features__card-icon">
					<use xlink:href="./assets/stack/sprite.svg#magnifying-glass"></use>
				</svg>
				<h3 class="features__card-title">
					<span class="text_accent">Бесплатная</span> диагностика
				</h3>
				<div class="features__card-text">
					Наш мастер бесплатно приедет к вам в течении 20 минут
				</div>
			</div>
		</div>
	</section>

	<section class="pricelist">
		<div class="container pricelist__wrap">
			<h2 class="section__title">Цены на ремонт</h2>

			<div class="pricelist__cards">
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card pricelist__card_active">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-price">От <span class="semibold">500 руб.</span></div>
					</div>
				</div>
			</div>
			<button class="button pricelist__unroll">Показать всё</button>
		</div>
	</section>

	<div class="prices__bg">
		<picture>
			<source srcset="./assets/images/webp/prices__bg.webp" type="image/webp">
			<img src="./assets/images/prices__bg.png" alt="Ремонт стиральных машин в СПб" class="prices__bg-img">
		</picture>
	</div>
</section>

<section class="reviews">
	<div class="reviews__bg"></div>

	<div class="container reviews__wrap">
		<h2 class="section__title">Что говорят о нас наши клиенты</h2>

		<div class="reviews__slider">
			<div class="reviews__slider-arrow-wrap reviews__slider-arrow_left">
				<svg class="reviews__slider-arrow">
					<use xlink:href="./assets/stack/sprite.svg#arrow"></use>
				</svg>
			</div>

			<div class="reviews__slide">
				<div class="reviews__slide-person">
					<picture>
						<source srcset="./assets/images/webp/reviewer.webp" type="image/webp">
						<img src="./assets/images/reviewer.jpg" alt="Клиент сервисного центра" class="reviews__slide-person-img">
					</picture>
					<div class="reviews__slide-person-col">
						<h3 class="reviews__slide-person-name">Валентин К.</h3>
						<div class="reviews__slide-person-service">
							Замена подшипников
						</div>
					</div>
					<div class="reviews__slide-person-rating">
						<div class="reviews__slide-person-rating-text">Рейтинг: </div>
						<span class="reviews__slide-person-rating-number">4.7</span>
					</div>
				</div>
				<div class="reviews__slide-info">
					<p class="reviews__slide-info-text">
						Вышли из строя подшипники барабана, люфт. Разобрали стиральную машину. Сняли бак и барабан. Выпресовали и поменяли
						подшипники.
					</p>
					<div class="reviews__slide-info-gallery">
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб" class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб" class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб" class="reviews__slide-info-gallery-img">
						</picture>
					</div>
				</div>
			</div>

			<div class="reviews__slider-arrow-wrap reviews__slider-arrow_right">
				<svg class="reviews__slider-arrow">
					<use xlink:href="./assets/stack/sprite.svg#arrow"></use>
				</svg>
			</div>
		</div>

		<ul class="reviews__slider-dots">
			<li class="reviews__slider-dots-item"></li>
			<li class="reviews__slider-dots-item"></li>
			<li class="reviews__slider-dots-item reviews__slider-dots-item_active"></li>
			<li class="reviews__slider-dots-item"></li>
			<li class="reviews__slider-dots-item"></li>
			<li class="reviews__slider-dots-item"></li>
		</ul>
	</div>

	<section class="advantage-block">
		<div class="container advantage-block__wrap">
			<div class="advantage-block__suptitle">Новым клиентам</div>
			<h3 class="advantage-block__title">Скидка 20%</h3>
			<div class="advantage-block__subtitle">
				Вы у нас впервые? Оставьте заявку и
				<span class="line-break">получите скидку 20% на первый ремонт!</span>
			</div>
			<form action="" class="form advantage-block__form">
				<input type="text" name="user_phone" class="form__input advantage-block__form-input" placeholder="Ваш телефон:" required>
				<button class="button advantage-block__form-button">Заказать ремонт</button>
				<div class="form__footnote">
					Нажимая на кнопку "Заказать ремонт" я соглашаюсь с
					<a href="#" class="form__footnote-link">политикой обработки персональных данных</a>
				</div>
			</form>
		</div>
	</section>
</section>
</body>
</html>