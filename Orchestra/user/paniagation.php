<?php
// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
session_start();
include("./lib/connect.php");
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;
$start = ($current_page - 1) * $limit;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
;
$data = mysqli_query($conn, "SELECT song.image as imageSong ,song.link as songlink, artist.image as artistimage,  song.idSong as songid,  song.name AS songname, artist.name AS artistname 
										FROM  song , artist 
										WHERE song.idArtist = artist.idArtist  
										LIMIT $start, $limit ");

$row = $data->fetch_assoc();
?>
<?php
include("./lib/connect.php");

$email =  $_SESSION['email'];
$query = "select * from playlist where idCustomer = '$email'";
$result=$conn->query($query);
$list = array();
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $ob['id'] = $id;
        $ob['name'] = $name;
        array_push($list,$ob);
    }
}
$query = "select * from playlist";
$result=$conn->query($query);
$countPlaylist = $result->num_rows+1;
?>
<!-- LOAD DATABASE -->
<?php foreach ($data as $row): ?>

    <li class="single-item">
        <a onclick="changeSong('/music/<?php echo $row['songlink'] ?>','<?php echo $row['songname'] ?>', '<?php echo $row['artistname'] ?>');"
            data-playlist data-title="<?php echo $row['songname'] ?>" data-artist="<?php echo $row['artistname'] ?>"
            data-img="img/covers/cover.svg" href="#" class="single-item__cover" id="player">
            <img src="/image/<?php echo $row['imageSong']; ?>" alt="">
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

            <h4>
                    <input type="hidden" name="idSong" id="idSong" value="<?php echo $row['songid'] ?>">
                    <a href="#"  id="loadsong" class="name-song">
                        <?php echo $row['songname'] ?>
                    </a>
            </h4>
            <span><a href="artist.php">
                    <?php echo $row['artistname'] ?>
                </a></span></form>
        </div>
        <button type="submit" name="addplaylist" class="single-item__add <?php echo 'add'.$row['songid'].''?>" value=""  type="button" class="btn btn-info btn-lg"
            data-toggle="modal" data-target="#myModal">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
            </svg>
            <div class="Add-Playlist <?php echo 'p'.$row['songid'].''?> ">
                            Thêm vào playlist
                            <ul>
                                <?php
                               
                                    foreach($list as $value){
                                       
                                        echo '
                                        <a href="release.php?idPlaylist='.$value['id'].'&idSong='.$row['songid'].'">
                                        <li class="add-playlist"> 
                                        
                                        '.$value['name'].'
                                        </li>
                                        </a>
                                        ';
                                    }
                                    
                                    
                                    echo '
                                    <a href="release.php?createPlayList='.$countPlaylist.'&idSong='.$row['songid'].'">
                                    <li class="add-playlist"> 
                                    Tạo playlist
                                    </li>
                                    </a>
                                    ';  
                                ?>
                            </ul>
                           
                           
            </div>
            <style>
                ul li{
                    font-size: 10px;
                    color: #000;
                }
                .Add-Playlist ul li:hover{
                    background-color: aqua;
                }
                .Add-Playlist ul a{
                    padding: 2px;
                    display: block;
                }
                .Add-Playlist ul li{
                   
                }
                .single-item__add{
                    position: relative;
                }
                .Add-Playlist{
                    border-radius: 10px;
                    z-index: 10;
                    min-width: 200px;
                    top: 2px;
                width: 100%;
                color: red;
                right: 10%;
                position: absolute;
                background-color: white;
                }
            </style>
            <script>
                 $('.p<?php echo $row['songid'] ?>').hide();
                $('.add<?php echo $row['songid'] ?>').hover(
                    function(){
                        $('.p<?php echo $row['songid'] ?>').addClass('active');
                    },
                    function(){
                        $('.p<?php echo $row['songid'] ?>').removeClass('active');
                    }
                )
                $('.add<?php echo $row['songid'] ?>').mouseenter(function() {
                    $('.p<?php echo $row['songid'] ?>').show();  
                }).mouseleave(function() {      
                    if(!$('.p<?php echo $row['songid'] ?>').hasClass('active')){
                        $('.p<?php echo $row['songid'] ?>').hide();
                    }
                });
                $('.p<?php echo $row['songid'] ?>').hover(
                    function(){
                        $('.p<?php echo $row['songid'] ?>').addClass('active');
                    },
                    function(){
                        $('.p<?php echo $row['songid'] ?>').removeClass('active');
                    }
                )
                $('.p<?php echo $row['songid'] ?>').mouseenter(function() {
                    $('.p<?php echo $row['songid'] ?>').show();  
                }).mouseleave(function() {      
                    if(!$('.p<?php echo $row['songid'] ?>').hasClass('active')){
                        $('.p<?php echo $row['songid'] ?>').hide();
                    }
                });
               
            </script>
        </button>
        <form class="pagination" action="release.php" method="get">
            <input type="hidden" name="idSong" id="idSong" value="<?php echo $row['songid'] ?>">

            <button type="submit" class="single-item__export" name="add_to_favorites">
                <svg width="12" height="12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                    clip-rule="evenodd">
                    <path
                        d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181" />
                </svg>
            </button>
        </form>
        <span class="single-item__time">2:58</span>
    </li>
<?php endforeach; ?>

<script>
    $("#loadsong").click(function(e) {
        e.preventDefault();
        $("#content").load("song-details.php");
    });
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