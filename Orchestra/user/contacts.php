<?php
//PHÂN QUYỀN
session_start();
include("./lib/connect.php");
// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
if (!$_SESSION['login']) {
	header("location: signin.php");
	echo '<meta http-equiv="refresh" content="0; url= signin.php">';
}
// Nếu đăng nhập và có quyền user thì vào trang index
if ($_SESSION['login'] && $_SESSION['login'] != '3') {
	header("location: index.php");
	echo '<meta http-equiv="refresh" content="0; url= index.php">';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/paymentfont.min.css">
	<link rel="stylesheet" href="css/slider-radio.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Orchestra">
	<title>Orchestra</title>

</head>

<body>
	<!-- header -->
	<header class="header">
		<div class="header__content">
			<div class="header__logo">
				<a href="index.php">
					<img src="img/logo.png" alt="">
				</a>
			</div>

			<nav class="header__nav">
				<a href="profile.php">Profile</a>
				<a href="about.php">About</a>
				<a href="contacts.php">Contacts</a>
			</nav>

			<form action="#" class="header__search">
				<input type="text" placeholder="Artist, track or podcast">
				<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
					</svg></button>
				<button type="button" class="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" />
					</svg></button>
			</form>

			<div class="header__actions">
				<div class="header__action header__action--search">
					<button class="header__action-btn" type="button"><svg xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 24 24">
							<path
								d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
						</svg></button>
				</div>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
						<?php
						if ($_SESSION['dangki']) {
							echo '' . '' . $_SESSION['dangki'] . '';

						}
						?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li><a href="#">Settings</a></li>
						<li><a href="#">Activity Log</a></li>
						<li class="nav-item dropdown no-arrow"><a href="logout.php"><i style="color: red;"
									class="fa-solid fa-door-open"> </i>Logout</a></li>
					</ul>
				</div>
			</div>

			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
	</header>
	<!-- end header -->

	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<div class="sidebar__logo">
			<a href="index.php">
				<img src="img/logo.png" alt=""></a>
		</div>
		<!-- end sidebar logo -->

		<!-- sidebar nav -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="index.php" class="sidebar__nav-link sidebar__nav-link--active"><svg
						xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z">
						</path>
					</svg> <span>Home</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="releases.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24">
						<path
							d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z" />
					</svg> <span>Releases</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="events.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24">
						<path
							d="M12,19a1,1,0,1,0-1-1A1,1,0,0,0,12,19Zm5,0a1,1,0,1,0-1-1A1,1,0,0,0,17,19Zm0-4a1,1,0,1,0-1-1A1,1,0,0,0,17,15Zm-5,0a1,1,0,1,0-1-1A1,1,0,0,0,12,15ZM19,3H18V2a1,1,0,0,0-2,0V3H8V2A1,1,0,0,0,6,2V3H5A3,3,0,0,0,2,6V20a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V6A3,3,0,0,0,19,3Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H20ZM20,9H4V6A1,1,0,0,1,5,5H6V6A1,1,0,0,0,8,6V5h8V6a1,1,0,0,0,2,0V5h1a1,1,0,0,1,1,1ZM7,15a1,1,0,1,0-1-1A1,1,0,0,0,7,15Zm0,4a1,1,0,1,0-1-1A1,1,0,0,0,7,19Z" />
					</svg> <span>Events</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="news.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24">
						<path
							d="M16,14H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Zm0-4H10a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm4-6H17V3a1,1,0,0,0-2,0V4H13V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H4A1,1,0,0,0,3,5V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V5A1,1,0,0,0,20,4ZM19,19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V6H7V7A1,1,0,0,0,9,7V6h2V7a1,1,0,0,0,2,0V6h2V7a1,1,0,0,0,2,0V6h2Z" />
					</svg> <span>News</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="playlist.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24">
						<path
							d="M19,5.5H12.72l-.32-1a3,3,0,0,0-2.84-2H5a3,3,0,0,0-3,3v13a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V8.5A3,3,0,0,0,19,5.5Zm1,13a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5.5a1,1,0,0,1,1-1H9.56a1,1,0,0,1,.95.68l.54,1.64A1,1,0,0,0,12,7.5h7a1,1,0,0,1,1,1Z">
						</path>
					</svg> <span>PlayLists</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="favourite.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24">
						<path
							d="M12,15a4,4,0,0,0,4-4V5A4,4,0,0,0,8,5v6A4,4,0,0,0,12,15ZM10,5a2,2,0,0,1,4,0v6a2,2,0,0,1-4,0Zm10,6a1,1,0,0,0-2,0A6,6,0,0,1,6,11a1,1,0,0,0-2,0,8,8,0,0,0,7,7.93V21H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2H13V18.93A8,8,0,0,0,20,11Z">
						</path>
					</svg> <span>Favourite</span></a>
			</li>
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar -->

	<!-- player -->
	<div class="player">
		<div class="player__cover">
			<img src="img/covers/cover.svg" alt="">
		</div>

		<div class="player__content">
			<span class="player__track"><b class="player__title">Epic Cinematic</b> – <span
					class="player__artist">AudioPizza</span></span>
			<audio src="http://blast.volkovdesign.com/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3"
				id="audio" controls></audio>
		</div>
	</div>

	<button class="player__btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
			<path
				d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z" />
		</svg> Player</button>
	<!-- end player -->

	<!-- main content -->
	<main class="main">
	<div class="container-fluid" style="display: block;">
			<div class="row row--grid">
				<!-- breadcrumb -->
				<div class="col-12">
					<ul class="breadcrumb bread">
						<li class="breadcrumb__item"><a href="index.php">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Contacts</li>
					</ul>
				</div>
				<!-- end breadcrumb -->

				<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>Contacts</h1>
					</div>
				</div>
				<!-- end title -->
			</div>

			<div class="row row--grid">
				<div class="col-12 col-lg-7 col-xl-8">
					<form action="#" class="sign__form sign__form--contacts">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="text" name="name" class="sign__input" placeholder="Name">
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="text" name="email" class="sign__input" placeholder="Email">
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
									<input type="text" name="subject" class="sign__input" placeholder="Subject">
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
									<textarea name="text" class="sign__textarea"
										placeholder="Type your message"></textarea>
								</div>
							</div>

							<div class="col-12 col-xl-3">
								<button type="button" class="sign__btn">Send</button>
							</div>
						</div>
					</form>
				</div>

				<div class="col-12 col-md-6 col-lg-5 col-xl-4">
					<div class="main__title main__title--sidebar">
						<h2>Info</h2>
						<p>It is a long fact that a reader will be distracted by the readable content of a page when
							looking at its layout</p>
					</div>
					<ul class="contacts__list">
						<li><a href="tel:88002345678">8 800 234-56-78</a></li>
						<li><a href="mailto:support@volna.template">support@volna.template</a></li>
						<li><a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom"
								class="open-map">221B Baker St, Marylebone, London</a></li>
					</ul>
				</div>
			</div>

			<!-- partners -->
			<div class="row">
				<div class="col-12">
					<div class="partners owl-carousel">
						<a href="#" class="partners__img">
							<img src="img/partners/3docean-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/activeden-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/audiojungle-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/codecanyon-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/photodune-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/themeforest-light-background.png" alt="">
						</a>
					</div>
				</div>
			</div>
			<!-- end partners -->
		</div>
	</main>
	<!-- end main content -->

	<!-- footer -->
	<footer class="footer">
	<div class="container-fluid" style="display: block;">
			<div class="row">
				<div class="col-12 col-md-3 col-lg-6 col-xl-3">
					<div class="footer__logo">
						<img src="img/logo.png" alt="">
					</div>
				</div>

				<div class="col-12 col-md-3 col-lg-6 col-xl-3">
					<div class="row">
						<div class="col-12">
							<h6 class="footer__title">Browse</h6>
						</div>

						<div class="col-12">
							<div class="footer__nav">
								<a href="releases.php">Releases</a>
								<a href="events.php">Events</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-3 col-lg-6 col-xl-3">
					<div class="row">
						<div class="col-12">
							<h6 class="footer__title">Information Services</h6>
						</div>

						<div class="col-12">
							<div class="footer__nav">
								<a href="news.php">News</a>
								<a href="about.php">About</a>
								<a href="privacy.php">Privacy policy</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-3 col-lg-6 col-xl-3">
					<div class="row">
						<div class="col-12">
							<h6 class="footer__title">Contact Info</h6>
						</div>

						<div class="col-12">
							<div class="footer__nav">

								<a href="contacts.php">Contacts</a>
								<div class="footer__links">
									<a href="mailto:Sgu@gmail.com"><svg xmlns="http://www.w3.org/2000/svg"
											viewBox="0 0 24 24">
											<path
												d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm-.41,2-5.88,5.88a1,1,0,0,1-1.42,0L5.41,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V7.41l5.88,5.88a3,3,0,0,0,4.24,0L20,7.41Z" />
										</svg> Sgu@gmail.com</a>
									<a href="tel:0123456789"><svg xmlns="http://www.w3.org/2000/svg"
											viewBox="0 0 24 24">
											<path
												d="M19.44,13c-.22,0-.45-.07-.67-.12a9.44,9.44,0,0,1-1.31-.39,2,2,0,0,0-2.48,1l-.22.45a12.18,12.18,0,0,1-2.66-2,12.18,12.18,0,0,1-2-2.66L10.52,9a2,2,0,0,0,1-2.48,10.33,10.33,0,0,1-.39-1.31c-.05-.22-.09-.45-.12-.68a3,3,0,0,0-3-2.49h-3a3,3,0,0,0-3,3.41A19,19,0,0,0,18.53,21.91l.38,0a3,3,0,0,0,2-.76,3,3,0,0,0,1-2.25v-3A3,3,0,0,0,19.44,13Zm.5,6a1,1,0,0,1-.34.75,1.05,1.05,0,0,1-.82.25A17,17,0,0,1,4.07,5.22a1.09,1.09,0,0,1,.25-.82,1,1,0,0,1,.75-.34h3a1,1,0,0,1,1,.79q.06.41.15.81a11.12,11.12,0,0,0,.46,1.55l-1.4.65a1,1,0,0,0-.49,1.33,14.49,14.49,0,0,0,7,7,1,1,0,0,0,.76,0,1,1,0,0,0,.57-.52l.62-1.4a13.69,13.69,0,0,0,1.58.46q.4.09.81.15a1,1,0,0,1,.79,1Z" />
										</svg>0123 456 789</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="footer__content">
						<small class="footer__copyright">© Orchestra, 2023. Created by <a href="index.php"
								target="_blank">Orchestra</a>.</small>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- modal info -->
	<div id="modal-info2" class="zoom-anim-dialog mfp-hide modal modal--info">
		<span class="modal__icon modal__icon--green">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z">
				</path>
			</svg>
		</span>

		<button class="modal__close" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" />
			</svg></button>

		<h4 class="sign__title">Payment #51 was successful!</h4>

		<div class="sign__group sign__group--row">
			<label class="sign__label">Total cost:</label>
			<span class="sign__value">$18.00</span>
		</div>

		<div class="sign__group sign__group--row">
			<label class="sign__label">Payment method: <b>Paypal</b></label>

			<span class="sign__text sign__text--small">There are many variations of passages of Lorem Ipsum available,
				but the majority have suffered alteration in some form, by injected humour, or randomised words which
				don't look even slightly believable.</span>
		</div>
	</div>
	<!-- end modal info -->

	<!-- modal info -->
	<div id="modal-info3" class="zoom-anim-dialog mfp-hide modal modal--info">
		<span class="modal__icon modal__icon--red">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
				</path>
			</svg>
		</span>

		<button class="modal__close" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" />
			</svg></button>

		<h4 class="sign__title">Payment #50 failed!</h4>

		<div class="sign__group sign__group--row">
			<label class="sign__label">Total cost:</label>
			<span class="sign__value">$18.00</span>
		</div>

		<div class="sign__group sign__group--row">
			<label class="sign__label">Payment method: <b>Paypal</b></label>

			<span class="sign__text sign__text--small">There are many variations of passages of Lorem Ipsum available,
				but the majority have suffered alteration in some form, by injected humour, or randomised words which
				don't look even slightly believable.</span>
		</div>
	</div>
	<!-- end modal info -->

	<!-- modal info -->
	<div id="modal-info4" class="zoom-anim-dialog mfp-hide modal modal--info">
		<span class="modal__icon">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Zm0-8.5a1,1,0,0,0-1,1v3a1,1,0,0,0,2,0v-3A1,1,0,0,0,12,11.5Zm0-4a1.25,1.25,0,1,0,1.25,1.25A1.25,1.25,0,0,0,12,7.5Z">
				</path>
			</svg>
		</span>

		<button class="modal__close" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" />
			</svg></button>

		<h4 class="sign__title">Example of notification.</h4>

		<div class="sign__group sign__group--row">
			<label class="sign__label">Amount to auto-renew:</label>
			<span class="sign__value">$18.00</span>
		</div>

		<div class="sign__group sign__group--row">
			<span class="sign__text sign__text--small">There are many variations of passages of Lorem Ipsum available,
				but the majority have suffered alteration in some form, by injected humour, or randomised words which
				don't look even slightly believable.</span>
		</div>
	</div>
	<!-- end modal info -->

	<!-- modal info -->
	<div id="modal-info5" class="zoom-anim-dialog mfp-hide modal modal--info">
		<span class="modal__icon modal__icon--purple">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M18,7h-.35A3.45,3.45,0,0,0,18,5.5a3.49,3.49,0,0,0-6-2.44A3.49,3.49,0,0,0,6,5.5,3.45,3.45,0,0,0,6.35,7H6a3,3,0,0,0-3,3v2a1,1,0,0,0,1,1H5v6a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V13h1a1,1,0,0,0,1-1V10A3,3,0,0,0,18,7ZM11,20H8a1,1,0,0,1-1-1V13h4Zm0-9H5V10A1,1,0,0,1,6,9h5Zm0-4H9.5A1.5,1.5,0,1,1,11,5.5Zm2-1.5A1.5,1.5,0,1,1,14.5,7H13ZM17,19a1,1,0,0,1-1,1H13V13h4Zm2-8H13V9h5a1,1,0,0,1,1,1Z">
				</path>
			</svg>
		</span>

		<button class="modal__close" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" />
			</svg></button>

		<h4 class="sign__title">You have received a gift!</h4>

		<div class="sign__group sign__group--row">
			<span class="sign__text sign__text--small">There are many variations of passages of Lorem Ipsum available,
				but the majority have suffered alteration in some form, by injected humour, or randomised words which
				don't look even slightly believable.</span>

			<span class="sign__text sign__text--small">There are many variations of passages of Lorem Ipsum available,
				but the majority have suffered alteration in some form, by injected humour, or randomised words which
				don't look even slightly believable.</span>
		</div>
	</div>
	<!-- end modal info -->

	<!-- JS -->
	<script src="js/jquery-3.6.4.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/slider-radio.js"></script>
	<script src="js/jquery.inputmask.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>