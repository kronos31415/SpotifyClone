<?php
	$songquery = mysqli_query($con , "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
	$resultArray = array();
	while($row = mysqli_fetch_array($songquery)) {
		array_push($resultArray, $row['id']);
	}

	$jsonArray = json_encode($resultArray);
// var_dump(json_encode($resultArray));
?>

<script>
	$(document).ready(function() {
		currentPlayList = <?php echo $jsonArray ;?>;
		audioElement = new Audio();
		setTrack(currentPlayList[0], currentPlayList, false);
		updateVolumeProgressBar(audioElement.audio);

		$('#nowPlayingBar').on('mousedown touchstart mousemove touchmove', function(event) {
			event.preventDefault();
		})

		$('.playbackBar .progressBar').mousedown(function() {
			mouseDown = true;
		})

		$('.playbackBar .progressBar').mousemove(function(event) {
			if(mouseDown) {
				timeFromOffset(event, this);
			}
		})

		$('.playbackBar .progressBar').mouseup(function(event) {
			timeFromOffset(event, this);
		});

		$(document).mouseup(function() {
			mouseDown = false;
		})



		$('.volumeBar .progressBar').mousedown(function() {
			mouseDown = true;
		})

		$('.volumeBar .progressBar').mousemove(function(event) {
			if(mouseDown) {
				let percentage = event.offsetX / $(this).width();
				audioElement.audio.volume = percentage;
			}
		})

		$('.volumeBar .progressBar').mouseup(function(event) {
			let percentage = event.offsetX / $(this).width();
			audioElement.audio.volume = percentage;
		});

		


	});
	function timeFromOffset(mouse, progresBar) {
		let percentage = mouse.offsetX / $(progresBar).width() * 100;
		let seconds = audioElement.audio.duration * (percentage / 100);
		audioElement.setTime(seconds);
	}
	function setRepeat() {
		repeat = !repeat;
		let imageName = repeat ? "repeat-active.png" : "repeat.png";
		$('.controlButton.repaeat img').attr("src", "assets/images/icons/" + imageName);
	}

	function playNextSong() {
		if(repeat == true) {
			audioElement.setTime(0);
			playSong();
			return;
		}
		if(currentIndex == currentPlayList.length - 1) {
			currentIndex = 0;
		} else {
			currentIndex++;
		}
		let trackToPlay = currentPlayList[currentIndex];
		console.log(trackToPlay);
		setTrack(trackToPlay, currentPlayList, false);
		playSong();
	}



	function setTrack(trackId, newPlayList, play) {
		let currentIndex = currentPlayList.indexOf(trackId);
		pauseSong();
	
		$.post("includes/handlers/ajax/getSongJson.php", {songId: trackId}, function(data) {

			let track = JSON.parse(data);
			$('.trackName span').text(track.title);

			$.post("includes/handlers/ajax/getArtistJson.php", {artistId: track.artist }, function(data) {
				let artist = JSON.parse(data);
				// console.log(artist.name);
				$('.artistName span').text(artist.name);
			});

			$.post("includes/handlers/ajax/getAlbumJson.php", {albumId: track.album }, function(data) {
				let album = JSON.parse(data);
				$('.albumLink img').attr("src", album.artworkPath);
			});

			audioElement.setTrack(track);
			playSong();
		});

		if(play) {
			audioElement.play();
		}
	}
	function playSong() {

		if(audioElement.audio.currentTime == 0) {
			// console.log(audioElement.currentlyPlaying.id, "id");
			$.post("includes/handlers/ajax/updatePlays.php", {songId: audioElement.currentlyPlaying.id});
		}

		audioElement.play();
		$('.controlButton.play').hide();
		$('.controlButton.pause').show();
	}

	function pauseSong() {
		audioElement.pause();
		$('.controlButton.play').show();
		$('.controlButton.pause').hide();
	}
</script>



<div id="nowPlayingBarContainer">
			<div id="nowPlayingBar">
				<div id="nowPlayingLeft">
					<div class="content">
						<span class="albumLink">
							<img src=""
								class="albumArtWork">
						</span>
						<div class="trackInfo">

							<span class="trackName">
								<span></span>
							</span>
							<span class="artistName">
								<span></span>
							</span>

						</div>
					</div>
				</div>

				<div id="nowPlayingCenter">
					<div class="content playerControls">
						<div class="buttons">
							<button class="controlButton shuffle" title="Shuffle button">
								<img src="assets/images/icons/shuffle.png" alt="Shuffle">
							</button>

							<button class="controlButton previous" title="Previous button">
								<img src="assets/images/icons/previous.png" alt="Previous">
							</button>

							<button class="controlButton play" title="Play button" onclick = 'playSong()'>
								<img src="assets/images/icons/play.png" alt="Play">
							</button>

							<button class="controlButton pause" title="Pause button" style="display: none;" onclick = 'pauseSong()'>
								<img src="assets/images/icons/pause.png" alt="Pause">
							</button>

							<button class="controlButton next" title="Next button" onclick="playNextSong()">
								<img src="assets/images/icons/next.png" alt="Next">
							</button>

							<button class="controlButton repaeat" title="Repeat button" onclick = "setRepeat()">
								<img src="assets/images/icons/repeat.png" alt="Repeat">
							</button>
						</div>

						<div class="playbackBar">

							<span class="progressTime current">0.00</span>
							<div class="progressBar">
								<div class="progressBarBg">
									<div class="progress"></div>
								</div>
							</div>
							<span class="progressTime remaining">0.00</span>

						</div>

					</div>
				</div>

				<div id="nowPlayingRight">
					<div class="volumeBar">
						<button class="controlButton volume" title="Volume button">
							<img src="assets/images/icons/volume.png" alt="Volume">
						</button>

						<div class="progressBar">
							<div class="progressBarBg">
								<div class="progress"></div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>