<?php
	$songquery = mysqli_query($con , "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
	$resultArray = array();
	while($row = mysqli_fetch_array($songquery)) {
		array_push($resultArray, $row['id']);
	}

	$jsonArray = json_encode($resultArray);

?>

<script>
	$(document).ready(function() {
		currentPlayList = <?php echo $jsonArray ;?>;
		audioElement = new Audio();
		setTrack(currentPlayList[0], currentPlayList, false);
	})

	function setTrack(trackId, newPlayList, play) {
	
		$.post("includes/handlers/ajax/getSongJson.php", {songId: trackId}, function(data) {
			console.log(data);
		});

		if(play) {
			audioElement.play();
		}
	}
	function playSong() {
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
							<img src="https://www.google.com/search?q=square+image&sxsrf=ACYBGNQxF_HWj131vp42eLUB0M6mClM5zg:1575196447514&tbm=isch&source=iu&ictx=1&fir=cy7rn6sA40_R_M%253A%252CJ9cL_7N9OSGndM%252C_&vet=1&usg=AI4_-kSdU4i_ukwu8bs8boe4nTN4ejnIkg&sa=X&ved=2ahUKEwiXjtKFoJTmAhWSp4sKHa4hBS8Q9QEwA3oECAgQCg#imgrc=cy7rn6sA40_R_M:"
								class="albumArtWork">
						</span>
						<div class="trackInfo">

							<span class="trackName">
								<span>Happy Birthday</span>
							</span>
							<span class="artistName">
								<span>PAwel Zarzycki</span>
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

							<button class="controlButton next" title="Next button">
								<img src="assets/images/icons/next.png" alt="Next">
							</button>

							<button class="controlButton repaeat" title="Repeat button">
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