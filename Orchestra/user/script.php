<?php
require("./functions.php");

if (isset($_POST['song'])) {
   $song = $_POST['song'];

   if ($song === "All Genre Song") {
      $products = getAllSong();
   } else {
      $products = getSongByGenre($song);
   }
   echo json_encode($products);
}

// if (isset($_POST['player'])) {
//    $player = $_POST['player'];
//    if ($player === "") {
//       $products = getSong();
//    } else {
//       $products = getPlaySong($player);
//    }
//    echo json_encode($products);
// }
?>