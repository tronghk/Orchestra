<?php 
    //PHÂN QUYỀN
	session_start();
	include("./lib/connect.php");
    
?>

<?php include("./functions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/paymentfont.min.css">
    <link rel="stylesheet" href="css/slider-radio.css">
    <link rel="stylesheet" href="css/plyr.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- <link href="css/plugins.bundle.css" rel="stylesheet" type="text/css"> -->
    <link href="css/styles.bundle.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Orchestra">
    <title>Orchestra</title>
</head>

<body>



        <!-- <div id="line_loader"></div> -->
    <!-- <div id="loader">
        <div class="loader">
            <div class="loader__eq mx-auto"><span></span> <span></span> <span></span> <span></span> <span></span>
                <span></span>
            </div><span class="loader__text mt-2">Loading</span>
        </div>
    </div> -->
    <!-- <div   id="wrapper"> -->
    <!-- <main class="main" id="content"> -->
        <main id="page_content">
            <div class="hero" style="background-image: url(img/events/event2.jpg);"></div>
            <div class="under-hero container">
                <div class="section">
                    <div class="row" data-song-id="8" data-song-name="Sadness inside" data-song-artist="Karen Jennings"
                        data-song-album="Sadness" data-song-url="audio/ringtone-8.mp3"
                        data-song-cover="./img/8.jpg">
                        <div class="col-xl-3 col-md-4">
                            <div class="cover cover--round">
                                <div class="cover__image"><img src="./img//artists/artist1.jpg" alt="Treasure face"></div>
                            </div>
                        </div>
                        <div class="col-1 d-none d-xl-block"></div>
                        <div class="col-md-8 mt-5 mt-md-0" style="margin-top: 100px;">
                            
                            <ul class="info-list info-list--dotted mb-3">
                                <li>Pop</li>
                                <li>01:23</li>
                                <li>Apr 14, 2019</li>
                                <li>Travers Music Company</li>
                            </ul>
                            
                            <?php  include("./lib/connect.php");
                                
                                    $randomNumber = rand(1, 50);
                                    $data = mysqli_query($conn, "SELECT artist.image as artistimage, song.name as songname, 
                                                                        album.name as albumname, artist.name as artistname,
                                                                        song.lyrics as lyrics
                                                                FROM  album , artist , song
                                                                WHERE song.idSong = '$randomNumber' and song.idArtist = artist.idArtist
                                                                and song.idAlbum = album.idAlbum");
                                            $numrow=mysqli_num_rows($data);
                                        
                                    $row=$data->fetch_assoc();
                                    // $line = $row['lyrics'];
                                    $line = preg_replace('/([A-Z])/', '<br>$1', $row['lyrics']);
 
  ?>                            
                            
                            <div class="mb-4">
                                <p class="mb-2 white-detail">Compose by: <?php echo $row['artistname'] ?><span class="text-dark fw-medium white-detail"></span></p>
                                <p class="mb-2 white-detail">Lyrics by: <?php echo $row['artistname'] ?><span class="text-dark fw-medium white-detail"></span></p>
                                <p class="mb-2 white-detail">Music director: <?php echo $row['artistname'] ?><span class="text-dark fw-medium white-detail"></span></p>
                            </div>
                            
                            <div class="mt-2"><p class="mb-2 white-detail">Lyrics:</p>
                               
                            <div class="mt-2"><span class="d-block text-dark fs-6 fw-semi-bold mb-3">
                                <p class="white-detail"><?php echo $line ?></p> 
                            </div>
                            <?php  ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <!-- end main content -->

   

    <div id="backdrop"></div>
    <script>
        $("#name-song").click(function(e) {
        e.preventDefault();
        $("#content").load("song-details.php");
    });
         $("#loadrel").click(function(e) {
        e.preventDefault();
        $("#content").load("releases.php");
    });
    $("#loadeve").click(function(e) {
        e.preventDefault();
        $("#content").load("events.php");
    });
    $("#loadnew").click(function(e) {
        e.preventDefault();
        $("#content").load("news.php");
    });
    $("#loadpla").click(function(e) {
        e.preventDefault();
        $("#content").load("playlist.php");
    });
    $("#loadfav").click(function(e) {
        e.preventDefault();
        $("#content").load("favourite.php");
    });
    </script>
    <script>
    function changeSong(Audio, namesong, nameartist) {
        var audio = document.getElementById('audio');
        var nameSong = document.getElementById('player__title');
        var nameArtist = document.getElementById('player__artist');

        nameSong.innerHTML = namesong;
        nameArtist.innerHTML = nameartist;
        audio.src = Audio
    }

    function redirectToPage() {
        window.location.href = "song-details.php";
    }


</script>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</body>

</html>