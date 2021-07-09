<?php
require_once(__DIR__ . '/assets/configs/config.php');
require_once(__DIR__ . '/assets/configs/db-cfg.php');

$brands = [];
$error_codes = [];
$error_info_blocks = [];
$get_errors_info = mysqli_query($connect, 'SELECT * FROM errors_info');
$get_brands = mysqli_query($connect, 'SELECT * FROM brands');

while ($brand = $get_brands->fetch_assoc()) {
    array_push($brands, ['BRAND_URL' => $brand['BRAND_URL'], 'BRAND_NAME' => $brand['BRAND_NAME']]);
}

while ($info_block = $get_errors_info->fetch_assoc()) {
    array_push($error_codes, ['BRAND_URL' => $info_block['BRAND_URL'], 'ERROR_CODE' => $info_block['ERROR_CODE']]);
    array_push($error_info_blocks, [
        'BRAND_URL' => $info_block['BRAND_URL'],
        'ERROR_CODE' => $info_block['ERROR_CODE'],
        'ERROR_TITLE' => $info_block['ERROR_TITLE'],
        'ERROR_DESCR' => $info_block['ERROR_DESCR'],
        'PRICE' => $info_block['PRICE']
    ]);
}
mysqli_close($connect);
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./assets/css/reset.css">
	<link rel="stylesheet" href="./assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
		  integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
		  crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
		  integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
		  crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<link rel="stylesheet" href="./assets/css/style.css?<?= time(); ?>">

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
			<div class="burger-btn" id="hamburger-1">
				<span class="line"></span>
				<span class="line"></span>
				<span class="line"></span>
			</div>
		</div>
	</div>
	<div class="burger-menu">
		<nav class="burger-menu__nav">
			<a href="#" class="burger-menu__nav-link">Цены</a>
			<a href="#" class="burger-menu__nav-link">Преимущества</a>
			<a href="#" class="burger-menu__nav-link">Отзывы</a>
			<a href="#" class="burger-menu__nav-link">Контакты</a>
		</nav>
		<a href="tel:<?= $phone_link ?>" class="burger-menu__phone">
			<svg class="burger-menu__phone-icon">
				<use xlink:href="./assets/stack/sprite.svg#phone"></use>
			</svg>
            <?= $phone_format ?>
		</a>
		<button class="button burger-menu__button">Заказать ремонт</button>
	</div>
</header>

<section class="promo">
	<picture>
		<source srcset="./assets/images/webp/promo-bg.webp" type="image/webp">
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
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
					</div>
				</div>
				<div class="pricelist__card">
					<svg class="pricelist__card-icon">
						<use xlink:href="./assets/stack/sprite.svg#dirty-clothes"></use>
					</svg>
					<div class="pricelist__card-info">
						<div class="pricelist__card-title">Пачкает вещи</div>
						<div class="pricelist__card-servicetime">
							<svg class="pricelist__card-servicetime-icon">
								<use xlink:href="./assets/stack/sprite.svg#clock"></use>
							</svg>
							20 мин — 1 час
						</div>
						<div class="pricelist__card-price">От <span class="text_accent text_semibold">500 руб.</span></div>
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
	<div class="reviews__bg-wrap">
		<div class="reviews__bg"></div>
	</div>

	<div class="container reviews__wrap">
		<h2 class="section__title">Что говорят о нас наши клиенты</h2>

		<div class="reviews__slider">
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
						<div class="reviews__slide-person-rating-text">Рейтинг:</div>
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
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
					</div>
				</div>
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
						<div class="reviews__slide-person-rating-text">Рейтинг:</div>
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
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
					</div>
				</div>
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
						<div class="reviews__slide-person-rating-text">Рейтинг:</div>
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
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
						<picture>
							<source srcset="./assets/images/webp/review-gallery-img.webp" type="image/webp">
							<img src="./assets/images/review-gallery-img.jpg" alt="Ремонт стиральных машин в СПб"
								 class="reviews__slide-info-gallery-img">
						</picture>
					</div>
				</div>
			</div>
		</div>

		<!--		<ul class="reviews__slider-dots">-->
		<!--			<li class="reviews__slider-dots-item"></li>-->
		<!--			<li class="reviews__slider-dots-item"></li>-->
		<!--			<li class="reviews__slider-dots-item reviews__slider-dots-item_active"></li>-->
		<!--			<li class="reviews__slider-dots-item"></li>-->
		<!--			<li class="reviews__slider-dots-item"></li>-->
		<!--			<li class="reviews__slider-dots-item"></li>-->
		<!--		</ul>-->
	</div>

	<section class="request-block">
		<div class="container request-block__wrap">
			<div class="request-block__suptitle">Новым клиентам</div>
			<h3 class="text_underline request-block__title">Скидка 20%</h3>
			<div class="request-block__subtitle">
				Вы у нас впервые? Оставьте заявку и
				<span class="line-break">получите скидку 20% на первый ремонт!</span>
			</div>
			<form action="" class="form request-block__form">
				<input type="text" name="user_phone" class="form__input request-block__form-input" placeholder="Ваш телефон:" required>
				<button class="button form__button request-block__form-button">Заказать ремонт</button>
				<div class="form__footnote">
					Нажимая на кнопку "Заказать ремонт" я соглашаюсь с
					<a href="#" class="form__footnote-link">политикой <span class="line-break"></span> обработки персональных данных</a>
				</div>
			</form>

			<picture>
				<source srcset="./assets/images/webp/request-man_1.webp" type="image/webp">
				<img src="./assets/images/request-man_1.png" alt="Инженер" class="request-block__img">
			</picture>
		</div>
		<picture>
			<source srcset="./assets/images/webp/advantage-block_bg-1.webp" type="image/webp">
			<img src="./assets/images/advantage-block_bg-1.jpg" alt="Ремонт стиральных машин в СПб" class="request-block__bg">
		</picture>
	</section>
</section>

<section class="team">
	<div class="container team__wrap">
		<h2 class="section__title">Наша команда <span class="text_accent">профессионалов</span></h2>
		<div class="team__cards">
			<div class="team__card">
				<picture>
					<source srcset="./assets/images/webp/team_1.webp" type="image/webp">
					<img src="./assets/images/team_1.jpg" alt="Инженер" class="team__card-img">
				</picture>
				<div class="team__card-info">
					<h3 class="team__card-title">Виталий В.</h3>
					<div class="team__card-job">Инженер</div>
					<div class="team__card-year">Стаж работы: <span class="text_bold">12 лет</span></div>
					<div class="team__card-count">200+ выполненных заказов</div>
				</div>
			</div>
			<div class="team__card">
				<picture>
					<source srcset="./assets/images/webp/team_1.webp" type="image/webp">
					<img src="./assets/images/team_1.jpg" alt="Инженер" class="team__card-img">
				</picture>
				<div class="team__card-info">
					<h3 class="team__card-title">Виталий В.</h3>
					<div class="team__card-job">Инженер</div>
					<div class="team__card-year">Стаж работы: <span class="text_bold">12 лет</span></div>
					<div class="team__card-count">200+ выполненных заказов</div>
				</div>
			</div>
			<div class="team__card">
				<picture>
					<source srcset="./assets/images/webp/team_1.webp" type="image/webp">
					<img src="./assets/images/team_1.jpg" alt="Инженер" class="team__card-img">
				</picture>
				<div class="team__card-info">
					<h3 class="team__card-title">Виталий В.</h3>
					<div class="team__card-job">Инженер</div>
					<div class="team__card-year">Стаж работы: <span class="text_bold">12 лет</span></div>
					<div class="team__card-count">200+ выполненных заказов</div>
				</div>
			</div>
			<div class="team__card">
				<picture>
					<source srcset="./assets/images/webp/team_1.webp" type="image/webp">
					<img src="./assets/images/team_1.jpg" alt="Инженер" class="team__card-img">
				</picture>
				<div class="team__card-info">
					<h3 class="team__card-title">Виталий В.</h3>
					<div class="team__card-job">Инженер</div>
					<div class="team__card-year">Стаж работы: <span class="text_bold">12 лет</span></div>
					<div class="team__card-count">200+ выполненных заказов</div>
				</div>
			</div>
			<div class="team__card">
				<picture>
					<source srcset="./assets/images/webp/team_1.webp" type="image/webp">
					<img src="./assets/images/team_1.jpg" alt="Инженер" class="team__card-img">
				</picture>
				<div class="team__card-info">
					<h3 class="team__card-title">Виталий В.</h3>
					<div class="team__card-job">Инженер</div>
					<div class="team__card-year">Стаж работы: <span class="text_bold">12 лет</span></div>
					<div class="team__card-count">200+ выполненных заказов</div>
				</div>
			</div>
			<div class="team__card">
				<picture>
					<source srcset="./assets/images/webp/team_1.webp" type="image/webp">
					<img src="./assets/images/team_1.jpg" alt="Инженер" class="team__card-img">
				</picture>
				<div class="team__card-info">
					<h3 class="team__card-title">Виталий В.</h3>
					<div class="team__card-job">Инженер</div>
					<div class="team__card-year">Стаж работы: <span class="text_bold">12 лет</span></div>
					<div class="team__card-count">200+ выполненных заказов</div>
				</div>
			</div>
		</div>
		<button class="button team__button">Вызвать мастера</button>
	</div>
</section>

<section class="codes">
	<picture>
		<source srcset="./assets/images/webp/codes-man.webp" type="image/webp">
		<img src="./assets/images/codes-man.png" alt="Инженер" class="codes__bg-man">
	</picture>
	<!--	<div class="codes__bg">-->
	<!--	</div>-->
	<div class="codes__block">
		<div class="codes__col">
			<h3 class="codes__title">Возможные коды ошибок <span class="line-break"></span>стиральных машин</h3>
			<div class="codes__select-wrap">
				<label for="codes-select-brand" class="codes__label">Какой у вас бренд:</label>
				<select id="codes-select-brand" class="select codes__select">
					<option value="0" disabled>Выберите ваш бренд</option>
                    <?
                    foreach ($brands as $brand) {
						$is_selected = $brand['BRAND_URL'] === 'bosch' ? 'selected' : '';
                        ?>
						<option value="<?= $brand['BRAND_URL'] ?>" <?= $is_selected ?>><?= $brand['BRAND_NAME'] ?></option>
                        <?
                    }
                    ?>
				</select>
			</div>
			<div class="codes__select-wrap codes__select-wrap_mobile">
				<label for="codes-select-error" class="codes__label">Какая у вас ошибка:</label>
				<select id="codes-select-error" class="select codes__select">
					<option value="0" disabled selected>Выберите код ошибки</option>
                    <?
                    foreach ($error_info_blocks as $block) {
						$is_hidden = $block['BRAND_URL'] !== 'bosch' ? 'codes__btn_hidden' : '';
						$is_selected = $block['ERROR_CODE'] === 'F01' && $block['BRAND_URL'] == 'bosch' ? 'selected' : '';

                        ?>
						<option class="<?= $is_hidden ?> " value="<?= $block['ERROR_CODE'] ?>"
								data-brand="<?= $block['BRAND_URL'] ?>" <?=$is_selected?>><?= $block['ERROR_CODE'] ?></option>
                        <?
                    }
                    ?>
				</select>
			</div>
			<div class="codes__label codes__label_desktop">Возможные коды ошибок:</div>
			<div class="codes__btns">
                <?
                foreach ($error_info_blocks as $block) {
                    $is_hidden = $block['BRAND_URL'] !== 'bosch' ? 'codes__btn_hidden' : '';
                    $is_active = $block['ERROR_CODE'] === 'F01' && $block['BRAND_URL'] == 'bosch' ? 'codes__btn_active' : '';
                    ?>
					<button class="codes__btn <?= $is_hidden ?> <?= $is_active ?>" value="<?= $block['ERROR_CODE'] ?>"
							data-brand="<?= $block['BRAND_URL'] ?>">
                        <?= $block['ERROR_CODE'] ?>
					</button>
                    <?
                }
                ?>

			</div>
		</div>
		<div class="codes__col">
			<div class="codes__modal">
                <?
                foreach ($error_info_blocks as $block) {
                    ?>
					<div class="codes__modal-slide" data-brand="<?= $block['BRAND_URL'] ?>" data-code="<?= $block['ERROR_CODE'] ?>">
						<div class="codes__modal-info">
							<h4 class="codes__modal-title"><?= $block['ERROR_TITLE'] ?></h4>
							<p class="codes__modal-text"><?= $block['ERROR_DESCR'] ?></p>
						</div>
						<div class="codes__modal-row">
							<div class="codes__modal-price">
								<div class="codes__modal-price-label">Ремонт:</div>
								от <span class="text_accent codes__modal-price-amount"><?= $block['PRICE'] ?> руб.</span>
							</div>
							<button class="button codes__modal-btn">Вызвать мастера</button>
						</div>
					</div>
                    <?
                }
                ?>
			</div>
			<picture>
				<source srcset="./assets/images/webp/washing-machine.webp" type="image/webp">
				<img src="./assets/images/washing-machine.jpg" alt="Стиральная машина" class="codes__img">
			</picture>
		</div>
	</div>
</section>

<section class="brands">
	<div class="container">
		<h2 class="section__title">Бренды, которые мы <span class="text_accent">ремонтируем</span></h2>
		<div class="brands__cards">
            <?
            foreach ($brands as $brand) {
                ?>
				<div class="brands__card" data-brand="<?= $brand['BRAND_URL'] ?>">
					<picture>
						<source srcset="./assets/images/webp/<?= $brand['BRAND_URL'] ?>-logo.webp" type="image/webp">
						<img src="./assets/images/<?= $brand['BRAND_URL'] ?>-logo.png" alt="Логотип" class="brands__card-img">
					</picture>
				</div>
                <?
            }
            ?>
		</div>

		<button class="button brands__more">Показать всё</button>
	</div>
</section>

<section class="request-block request-block_top">
	<div class="container request-block__wrap">
		<div class="request-block__suptitle">Выезд мастера</div>
		<h3 class="text_underline text_capitalize request-block__title">Бесплатно</h3>
		<div class="request-block__subtitle">
			Оставьте заявку и назначте удобное для
			<span class="line-break">Вас время и место</span>
		</div>
		<form action="" class="form request-block__form">
			<input type="text" name="user_phone" class="form__input request-block__form-input" placeholder="Ваш телефон:" required>
			<button class="button form__button request-block__form-button">Заказать ремонт</button>
			<div class="form__footnote">
				Нажимая на кнопку "Заказать ремонт" я соглашаюсь с
				<a href="#" class="form__footnote-link">политикой <span class="line-break"></span> обработки персональных данных</a>
			</div>
		</form>

		<picture>
			<source srcset="./assets/images/webp/request-man_2.webp" type="image/webp">
			<img src="./assets/images/request-man_2.png" alt="Инженер" class="request-block__img">
		</picture>
	</div>
	<picture>
		<source srcset="./assets/images/webp/advantage-block_bg-1.webp" type="image/webp">
		<img src="./assets/images/advantage-block_bg-1.jpg" alt="Ремонт стиральных машин в СПб" class="request-block__bg">
	</picture>
</section>

<section class="steps">
	<!--	<div class="steps__bg"></div>-->

	<div class="container steps__wrap">
		<h2 class="section__title">Как происходит ремонт</h2>
		<div class="steps__nav">
			<button class="steps__nav-button steps__nav-button_active" data-slide="0">Заявка</button>
			<button class="steps__nav-button" data-slide="1">Диагностика</button>
			<button class="steps__nav-button" data-slide="2">Ремонт</button>
			<button class="steps__nav-button" data-slide="3">Гарантия</button>
		</div>

		<div class="steps__row">
			<div class="steps__col steps__graphics">
				<picture>
					<source srcset="./assets/images/webp/washing-machine.webp" type="image/webp">
					<img class="steps__img" src="./assets/images/washing-machine.jpg" alt="Стиральная машина">
				</picture>
				<div class="steps__icon-wrap">
					<svg class="steps__icon">
						<use xlink:href="./assets/stack/sprite.svg#delivery"></use>
					</svg>
					<svg class="steps__icon steps__icon_visible">
						<use xlink:href="./assets/stack/sprite.svg#washing-machine"></use>
					</svg>
					<svg class="steps__icon">
						<use xlink:href="./assets/stack/sprite.svg#wrench"></use>
					</svg>
					<svg class="steps__icon">
						<use xlink:href="./assets/stack/sprite.svg#warranty"></use>
					</svg>
				</div>
			</div>
			<div class="steps__col steps__info">
				<div class="steps__info-blocks">
					<div class="steps__info-block">
						<div class="steps__icon-wrap steps__info-block-icon">
							<svg class="steps__icon steps__icon_visible">
								<use xlink:href="./assets/stack/sprite.svg#delivery"></use>
							</svg>
						</div>
						<h5 class="steps__info-block-title">Гарантия на проведённый ремонт 0</h5>
						<p class="steps__info-block-text">
							После завершения ремонта наш мастер выдаст Вам весь пакет документов, а также пожизненную гарантию на услуги
							сервисного центра <?= $brand_name ?>
						</p>
					</div>
					<div class="steps__info-block">
						<div class="steps__icon-wrap steps__info-block-icon">
							<svg class="steps__icon steps__icon_visible">
								<use xlink:href="./assets/stack/sprite.svg#washing-machine"></use>
							</svg>
						</div>
						<h5 class="steps__info-block-title">Гарантия на проведённый ремонт 1</h5>
						<p class="steps__info-block-text">
							После завершения ремонта наш мастер выдаст Вам весь пакет документов, а также пожизненную гарантию на услуги
							сервисного центра <?= $brand_name ?>
						</p>
					</div>
					<div class="steps__info-block">
						<div class="steps__icon-wrap steps__info-block-icon">
							<svg class="steps__icon steps__icon_visible">
								<use xlink:href="./assets/stack/sprite.svg#wrench"></use>
							</svg>
						</div>
						<h5 class="steps__info-block-title">Гарантия на проведённый ремонт 2</h5>
						<p class="steps__info-block-text">
							После завершения ремонта наш мастер выдаст Вам весь пакет документов, а также пожизненную гарантию на услуги
							сервисного центра <?= $brand_name ?>
						</p>
					</div>
					<div class="steps__info-block">
						<div class="steps__icon-wrap steps__info-block-icon">
							<svg class="steps__icon steps__icon_visible">
								<use xlink:href="./assets/stack/sprite.svg#warranty"></use>
							</svg>
						</div>
						<h5 class="steps__info-block-title">Гарантия на проведённый ремонт 3</h5>
						<p class="steps__info-block-text">
							После завершения ремонта наш мастер выдаст Вам весь пакет документов, а также пожизненную гарантию на услуги
							сервисного центра <?= $brand_name ?>
						</p>
					</div>
				</div>
				<div class="steps__info-contacts">
					<button class="button steps__info-button">Вызвать мастера</button>
					<a href="tel:<?= $phone_link ?>" class="steps__info-phone">
						<span class="steps__info-phone-label">или позвоните нам:</span>
                        <?= $phone_format ?>
					</a>
				</div>
				<div class="steps__info-footnote">Мы работаем с 8:00 до 23:00 без выходных</div>
			</div>
		</div>
	</div>
</section>

<section class="faq">
	<div class="container wrapper">
		<h3 class="section__title">
			<!-- Частые вопросы <b>itFixed</b> -->
			Часто задаваемые вопросы
		</h3>
		<div class="faq__list">
			<div class="faq__list_item">
				<div class="faq__item_row faq__item_question">
					<div class="faq__row_left">Вопрос:</div>
					<div class="faq__row_center">Выезд мастера бесплатный?</div>
					<div class="faq__row_right">
						<div class="faq__right_arrow faq__right_arrow-up faq__right_arrow_rotated"></div>
					</div>
				</div>
				<div class="faq__item_row faq__item_answer faq__list_item_close" style="display: none;">
					<div class="faq__row_left">Ответ:</div>
					<div class="faq__row_center">Да, в пределах КАД. Если нужно вызвать сервис-инженера за пределы КАД – позвоните по
						телефону <a href="tel:+78124391517" class="bold nowrap">+7 (812) 439-15-17</a>, и мы сориентируем Вас по цене.
					</div>
					<div class="faq__row_right"></div>
				</div>
			</div>
			<div class="faq__list_item">
				<div class="faq__item_row faq__item_question">
					<div class="faq__row_left">Вопрос:</div>
					<div class="faq__row_center">Какая гарантия на услуги?</div>
					<div class="faq__row_right">
						<div class="faq__right_arrow faq__right_arrow-up faq__right_arrow_rotated"></div>
					</div>
				</div>
				<div class="faq__item_row faq__item_answer faq__list_item_close" style="display: none;">
					<div class="faq__row_left">Ответ:</div>
					<div class="faq__row_center">Мы предоставляем всем своим клиентам годовую гарантию на запчасти. Для более подробной
						информации позвоните нашим специалистам по тел.:
						<a href="tel: <?= $phone_link ?>" class="faq__list_item-link"><?= $phone_format ?></a></div>
					<div class="faq__row_right"></div>
				</div>
			</div>
			<div class="faq__list_item">
				<div class="faq__item_row faq__item_question">
					<div class="faq__row_left">Вопрос:</div>
					<div class="faq__row_center">Нужно платить за диагностику, если отказываюсь от ремонта?</div>
					<div class="faq__row_right">
						<div class="faq__right_arrow faq__right_arrow-up"></div>
					</div>
				</div>
				<div class="faq__item_row faq__item_answer">
					<div class="faq__row_left">Ответ:</div>
					<div class="faq__row_center">Нет, диагностика всегда бесплатная. Также не нужно оплачивать вызов сервис-инженера и выезд
						курьера.
					</div>
					<div class="faq__row_right"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="contacts">
	<div class="container contacts__wrap">
		<h2 class="section__title section__title_tailed">Контакты</h2>
		<div class="contacts__list">
			<div class="contacts__list-item">
				<div class="contacts__list-item-title">Наш телефон:</div>
				<div class="contacts__list-item-info">
					<svg class="contacts__list-item-icon">
						<use xlink:href="./assets/stack/sprite.svg#phone"></use>
					</svg>
					<a href="tel: <?= $phone_link ?>" class="contacts__list-item-link"><?= $phone_format ?></a>
				</div>
			</div>
			<div class="contacts__list-item">
				<div class="contacts__list-item-title">Мы работаем:</div>
				<div class="contacts__list-item-info">
					<svg class="contacts__list-item-icon">
						<use xlink:href="./assets/stack/sprite.svg#clock"></use>
					</svg>
					<div class="">С 8:00 до 23:00 <span class="text_accent text_bold">без выходных</span></div>
				</div>
			</div>
			<div class="contacts__list-item">
				<div class="contacts__list-item-title">Адрес главного офиса</div>
				<div class="contacts__list-item-info">
					<svg class="contacts__list-item-icon">
						<use xlink:href="./assets/stack/sprite.svg#placeholder"></use>
					</svg>
					190915, Санкт-Петербург, Московский пр., д.8
				</div>
			</div>
		</div>

		<div class="contacts__row">
			<div class="contacts__promo">
				<h3 class="contacts__promo-title">Наш мастер рядом</h3>
				<div class="contacts__promo-text">
					Возможно наши мастера прямо сейчас в шаговой доступности от вашей станции метро!
				</div>
				<button class="button contacts__promo-button">Вызвать мастера</button>
				<picture>
					<source srcset="./assets/images/webp/codes-man.webp" type="image/webp">
					<img src="./assets/images/codes-man.png" alt="инженер" class="contacts__promo-img">
				</picture>
			</div>
			<div id="map" class="contacts__map"></div>
		</div>

	</div>
	<picture>
		<source srcset="./assets/images/webp/contacts_bg-img.webp" type="image/webp">
		<img src="./assets/images/contacts_bg-img.png" alt="Ремонт стиральных машин в СПб" class="contacts__bg-img">
	</picture>
</section>

<footer class="footer">
	<div class="container footer__wrap">
		<div class="footer__col">
			<svg class="footer__logo">
				<use xlink:href="./assets/stack/sprite.svg#logo_inversed"></use>
			</svg>
			<a href="./politika.html" class="footer__policy">Политика <span class="line-break"></span> конфиденциальности</a>
		</div>
		<div class="footer__col footer__billings">
			<div class="footer__billings-label">Мы принимаем:</div>
			<svg class="footer__billings-icon">
				<use xlink:href="./assets/stack/sprite.svg#visa"></use>
			</svg>
			<svg class="footer__billings-icon">
				<use xlink:href="./assets/stack/sprite.svg#mastercard"></use>
			</svg>
			<svg class="footer__billings-icon">
				<use xlink:href="./assets/stack/sprite.svg#sber"></use>
			</svg>
			<svg class="footer__billings-icon">
				<use xlink:href="./assets/stack/sprite.svg#cash"></use>
			</svg>
		</div>
		<div class="footer__col footer__nav">
			<!--			<div class="footer__nav-title">Сервисный центр</div>-->
			<a href="#features" class="footer__nav-link">Преимущества</a>
			<a href="#prices" class="footer__nav-link">Цены</a>
			<a href="#reviews" class="footer__nav-link">Отзывы</a>
			<a href="#contacts" class="footer__nav-link">Контакты</a>
		</div>
		<div class="footer__contacts">
			<div class="footer__contacts-info">
				<div class="footer__contacts-info-block">
					<div class="footer__contacts-info-block-title">
						<svg class="footer__contacts-info-block-icon">
							<use xlink:href="./assets/stack/sprite.svg#clock"></use>
						</svg>
						Время работы:
					</div>
					<div class="footer__contacts-info-block-text">
						8:00 — 23:00 без выходных
					</div>
				</div>
				<div class="footer__contacts-info-block">
					<div class="footer__contacts-info-block-title">
						<svg class="footer__contacts-info-block-icon">
							<use xlink:href="./assets/stack/sprite.svg#truck_monochromed"></use>
						</svg>
						Выезд:
					</div>
					<div class="footer__contacts-info-block-text">
						Во все районы Санкт-Петербурга
					</div>
				</div>
			</div>
			<div class="footer__contacts-callback">
				<button class="button footer__contacts-callback-button">Заказать ремонт</button>
				<div class="footer__contacts-callback-phone-wrap">
					<div class="footer__contacts-callback-phone-label">Телефон:</div>
					<a href="tel:<?= $phone_link ?>" class="footer__contacts-callback-phone">
						<svg class="footer__contacts-callback-phone-icon">
							<use xlink:href="./assets/stack/sprite.svg#phone"></use>
						</svg>
                        <?= $phone_format ?>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container footer__footnote">
		Компания <?= $brand_name ?>. Все права защищены. Bosch, Indesit, Zanussi, Electrolux, Whirlpool, Samsung и их логотипы являются
		зарегистрированными товарными знаками. Информация опубликованная на сайте не является публичной
		офертой, определяемой положениями Статьи 437 ГК РФ. Цены указаны за услугу, запчасти в эту стоимость не входят.
	</div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
		integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
		integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>
<script>
    setTimeout(() => {
        let elem = document.createElement('script');

        elem.src = 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=init';
        document.getElementsByTagName('body')[0].appendChild(elem);
    }, 2500);

    function init() {
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [55.76, 37.64],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 7
        });
    }
</script>
<script src="./assets/js/script.js"></script>
</body>
</html>