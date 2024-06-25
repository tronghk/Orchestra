// let selectPlayer = document.querySelector("#player");
//         // console.log(selectPlayer);
//         let player = document.querySelector(".single-item__title name-song");
//         console.log(player);
//         let content = document.querySelector(".player");

//         if (selectPlayer) {
//             selectPlayer.addEventListener("click", function() {
//                 let nameplayer = this.value;
//                 player.innerHTML = this[this.selectedIndex].text;
//                 console.log(player.innerHTML);
//                 let http = new XMLHttpRequest();
//                 http.onreadystatechange = function() {
//                     if (this.readyState == 4 && this.status == 200) {
//                         let response = JSON.parse(this.responseText);
//                         // let response = this.responseText;
//                         let out = "";
//                         for (let item of response) {
//                             out += `
//                             <div class="player">
//                                 <div class="player__cover">
//                                     <img src="img/covers/cover.svg" alt="">
//                                 </div>

//                                 <div class="player__content">
//                                     <span class="player__track"><b class="player__title">${item.songname}</b> – <span
//                                             class="player__artist">${item.artistname}</span></span>
//                                     <audio src="http://blast.volkovdesign.com/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3"
//                                         id="audio" controls></audio>
//                                 </div>
//                             </div>
//                     `;
//                         }
//                         content.innerHTML = out;
//                     };
//                 }
//                 http.open('POST', "./script.php", true);
//                 http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
//                 http.send("player=" + nameplayer);
//             });
//         }
