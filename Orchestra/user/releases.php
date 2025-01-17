<?php 
   require ("./functions.php"); 
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap-reboot.min.css"> -->
    <!-- <link rel="stylesheet" href="css/bootstrap-grid.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->
    <!-- <link rel="stylesheet" href="css/select2.min.css"> -->
    <!-- <link rel="stylesheet" href="css/paymentfont.min.css"> -->
    <!-- <link rel="stylesheet" href="css/slider-radio.css"> -->
    <!-- <link rel="stylesheet" href="css/plyr.css"> -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
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

    <!-- end header -->

    <!-- sidebar -->



    <div class="container-fluid" style="display: block;">
        <div class="row row--grid">
            <!-- breadcrumb -->
            <div class="col-12">
                <ul class="breadcrumb bread">
                    <li class="breadcrumb__item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active"><a id="loadrel" href="#">Releases</a></li>
                </ul>
            </div>
            <!-- end breadcrumb -->
            <?php 
					 include("./lib/connect.php");
	 
					 include("./search.php");
				 ?>
            <!-- title -->
            <div class="col-12">
                <div class="main__title main__title--page">
                    <h1>Releases</h1>
                </div>
            </div>
            <!-- end title -->
        </div>

        <!-- releases -->
        <div class="row row--grid">
            <div class="col-12 right" id="right">
                <div class="main__filter">

                    <div class="main__filter-wrap">
                        <form action="" method="post">
                            <select class="main__select" name="filler" id="filler">
                                <?php 
                                $sql = "select * from genresong"; // câu truy vấn
                                $data=$conn->query($sql);
                                // $conn->query($sql); // truy vấn sql lấy dữ liệu về                            
                                $row=$data->fetch_assoc(); //tạo 1 mảng để lưu dữ liệu ?>

                                <?php foreach ($data as $row) : ?>
                                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>

                        </form>
                        <?php if(!empty($_POST['filler'])) {
        $selected = $_POST['filler'];
        echo 'You have chosen: ' . $selected;
    } ?>
                    </div>
                    <div class="slider-radio">
                        <input type="radio" name="grade" id="featured" checked="checked"><label
                            for="featured">Featured</label>
                        <input type="radio" name="grade" id="popular"><label for="popular">Popular</label>
                        <input type="radio" name="grade" id="newest"><label for="newest">Newest</label>
                    </div>
                </div>

                <h2>All Genre Song</h2>
                <div class="row row--grid product-wrapper">
                    <?php 
         				$products = getAllSong();

         foreach ($products as $product) {
            ?>
                    <!-- LOAD DATABASE -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="album">
                            <div class="album__cover">
                            <img src="/image/<?php echo $product['imageSong'] ?>" alt="">
                            <a style="cursor: pointer;" onclick="changeSong('/music/<?php echo $product['link'] ?>','<?php echo $product['songname'] ?>','<?php echo $product['artistname'] ?>');"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                    </svg></a>
                                <span class="album__stat">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M3.71,16.29a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21,1,1,0,0,0-.21.33,1,1,0,0,0,.21,1.09,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1,1,0,0,0,.21-1.09A1,1,0,0,0,3.71,16.29ZM7,8H21a1,1,0,0,0,0-2H7A1,1,0,0,0,7,8ZM3.71,11.29a1,1,0,0,0-1.09-.21,1.15,1.15,0,0,0-.33.21,1,1,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1,1,0,0,0,3.71,11.29ZM21,11H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2ZM3.71,6.29a1,1,0,0,0-.33-.21,1,1,0,0,0-1.09.21,1.15,1.15,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21,1,1,0,0,0,1.09-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1.15,1.15,0,0,0,3.71,6.29ZM21,16H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z" />
                                        </svg>10</span>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z" />
                                        </svg> 19 503</span>
                                </span>
                            </div>
                            <div class="album__title">
                                <h3><a href="release.php"><?php echo $product['songname'] ?></a></h3>
                                <span><a href="artist.php"><?php echo $product['artistname'] ?></a></span>
                            </div>
                        </div>
                    </div>
                    <?php  }?>
                </div>
                <button class="main__load" type="button">Load more</button>

            </div>
            <!-- end releases -->

            <section class="row row--grid">
                <div class="col-12 col-xl-8">
                    <div class="row row--grid">
                        <!-- title -->
                        <div class="col-12">
                            <div class="main__title">
                                <h2><a href="#">Upcoming events</a></h2>
                            </div>
                        </div>
                        <!-- end title -->

                        <div class="col-12 col-md-6">
                            <div class="event" data-bg="img/events/event1.jpg">
                                <a href="./checkout.php" class="event__ticket open-modal"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z" />
                                    </svg> Buy ticket</a>
                                <span class="event__date">March 14, 2021</span>
                                <span class="event__time">8:00 pm</span>
                                <h3 class="event__title"><a href="event.php">Sorry Babushka</a></h3>
                                <p class="event__address">1 East Plumb Branch St.Saint Petersburg, FL 33702</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="event" data-bg="img/events/event2.jpg">
                                <a href="./checkout.php" class="event__ticket open-modal"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z" />
                                    </svg> Buy ticket</a>
                                <span class="event__date">March 16, 2021</span>
                                <span class="event__time">7:00 pm</span>
                                <h3 class="event__title"><a href="event.php">Big Daddy</a></h3>
                                <p class="event__address">71 Pilgrim Avenue Chevy Chase, MD 20815</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="row row--grid">
                        <!-- title -->
                        <div class="col-12">
                            <div class="main__title">
                                <h2><a href="#">New Singles</a></h2>
                            </div>
                        </div>
                        <!-- end title -->

                        <div class="col-12">
                            <ul class="main__list">
                                <li class="single-item">
                                    <a data-link data-title="Got What I Got" data-artist="Jason Aldean"
                                        data-img="img/covers/cover.svg"
                                        href="http://blast.volkovdesign.com/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3"
                                        class="single-item__cover">
                                        <img src="img/covers/cover.svg" alt="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z" />
                                        </svg>
                                    </a>
                                    <div class="single-item__title">
                                        <h4><a href="#">Got What I Got</a></h4>
                                        <span><a href="artist.php">Jason Aldean</a></span>
                                    </div>
                                    <span class="single-item__time">2:58</span>
                                </li>
                                <li class="single-item">
                                    <a data-link data-title="Supalonely" data-artist="BENEE Featuring"
                                        data-img="img/covers/cover7.jpg"
                                        href="http://blast.volkovdesign.com/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3"
                                        class="single-item__cover">
                                        <img src="img/covers/cover7.jpg" alt="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z" />
                                        </svg>
                                    </a>
                                    <div class="single-item__title">
                                        <h4><a href="#">Supalonely</a></h4>
                                        <span><a href="artist.php">BENEE Featuring</a></span>
                                    </div>
                                    <span class="single-item__time">3:14</span>
                                </li>
                                <li class="single-item">
                                    <a data-link data-title="Girls In The Hood" data-artist="Megan Thee"
                                        data-img="img/covers/cover8.jpg"
                                        href="http://blast.volkovdesign.com/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3"
                                        class="single-item__cover">
                                        <img src="img/covers/cover8.jpg" alt="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z" />
                                        </svg>
                                    </a>
                                    <div class="single-item__title">
                                        <h4><a href="#">Girls In The Hood</a></h4>
                                        <span><a href="artist.php">Megan Thee</a></span>
                                    </div>
                                    <span class="single-item__time">3:21</span>
                                </li>
                                <li class="single-item">
                                    <a data-link data-title="Got It On Me" data-artist="Summer Walker"
                                        data-img="img/covers/cover9.jpg"
                                        href="http://blast.volkovdesign.com/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3"
                                        class="single-item__cover">
                                        <img src="img/covers/cover9.jpg" alt="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z" />
                                        </svg>
                                    </a>
                                    <div class="single-item__title">
                                        <h4><a href="#">Got It On Me</a></h4>
                                        <span><a href="artist.php">Summer Walker</a></span>
                                    </div>
                                    <span class="single-item__time">3:12</span>
                                </li>
                                <li class="single-item">
                                    <a data-link data-title="Righteous" data-artist="Juice WRLD"
                                        data-img="img/covers/cover10.jpg"
                                        href="http://blast.volkovdesign.com/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3"
                                        class="single-item__cover">
                                        <img src="img/covers/cover10.jpg" alt="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z" />
                                        </svg>
                                    </a>
                                    <div class="single-item__title">
                                        <h4><a href="#">Righteous</a></h4>
                                        <span><a href="artist.php">Juice WRLD</a></span>
                                    </div>
                                    <span class="single-item__time">5:04</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- modal ticket -->

        <!-- end modal ticket -->

        <!-- modal info -->

        <!-- end modal info -->

        <!-- modal info -->

        <!-- end modal info -->

        <!-- modal info -->

        <!-- end modal info -->

        <!-- modal info -->

        <!-- end modal info -->

        <!-- JS -->
        <script src="js/jquery-3.6.4.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- <script async src="js/smooth-scrollbar.js"></script> -->
        <!-- <script src="js/select2.min.js"></script> -->
        <!-- <script async src="js/slider-radio.js"></script> -->
        <!-- <script async src="js/jquery.inputmask.min.js"></script> -->
        <!-- <script async src="js/plyr.min.js"></script> -->
        <script src="js/main.js"></script>
        <!-- <script async src="js/filler.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <script>
        let selectMenu = document.querySelector("#filler");
        let song = document.querySelector("#right h2");
        // console.log(song);
        let container = document.querySelector(".product-wrapper");

        if (selectMenu) {
            selectMenu.addEventListener("change", function() {
                let namesong = this.value;
                song.innerHTML = this[this.selectedIndex].text;

                let http = new XMLHttpRequest();
                http.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let response = JSON.parse(this.responseText);
                        // let response = this.responseText;
                        let out = "";
                        for (let item of response) {

                            out += `
                <div class="col-6 col-sm-4 col-lg-2">
                            <div class="album">
                                <div class="album__cover">
                                    <img src="${item.artistimg}" alt="">
                                    <a href="release.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z" />
                                        </svg></a>
                                    <span class="album__stat">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.71,16.29a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21,1,1,0,0,0-.21.33,1,1,0,0,0,.21,1.09,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1,1,0,0,0,.21-1.09A1,1,0,0,0,3.71,16.29ZM7,8H21a1,1,0,0,0,0-2H7A1,1,0,0,0,7,8ZM3.71,11.29a1,1,0,0,0-1.09-.21,1.15,1.15,0,0,0-.33.21,1,1,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1,1,0,0,0,3.71,11.29ZM21,11H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2ZM3.71,6.29a1,1,0,0,0-.33-.21,1,1,0,0,0-1.09.21,1.15,1.15,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21,1,1,0,0,0,1.09-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1.15,1.15,0,0,0,3.71,6.29ZM21,16H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z" />
                                            </svg>10</span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z" />
                                            </svg> 19 503</span>
                                    </span>
                                </div>
                                <div class="album__title">
                                    <h3><a href="release.php">${item.songname}</a></h3>
                                    <span><a href="artist.php">${item.artistname}</a></span>
                                </div>
                            </div>
                        </div>
                    `;
                        }
                        container.innerHTML = out;
                    };
                }
                http.open('POST', "./script.php", true);
                http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                http.send("song=" + namesong);
            });
        }
        function changeSong(Audio, namesong, nameartist) {
        
        var audio = document.getElementById('audio');
        var nameSong = document.querySelector('.player__title');
        var nameArtist = document.querySelector('.player__artist');
        nameSong.innerHTML = namesong;
        nameArtist.innerHTML = nameartist;
        audio.src = Audio
        audio.play();
    }
        </script>
       
</body>


</html>