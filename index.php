<?php
include("includes/config.php");

// session_destroy()

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
} else {
	header("Location: register.php");
}
?>
<html>

<head>
	<title>Welcome to Slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">
			<div id="navBarContainer">
				<nav class="navBar">
					<a href="index.php" class="logo">
						<img src = "assets/images/icons/logo.png">
					</a>


						<div class="group">
							<div class="navItem">
								<a href="search.php" class = "navItemLink">Search
									<img src="assets/images/icons/search_.png" class="icon" alt="Search">
								</a>
							</div>

						</div>

						<div class="group">

							<div class="navItem">
								<a href="browse.php" class = "navItemLink">Browse</a>
							</div>

							<div class="navItem">
								<a href="yourMusic.php" class = "navItemLink">Your Music</a>
							</div>

							<div class="navItem">
								<a href="yourProfile.php" class = "navItemLink">Pawel Zarzycki</a>
							</div>
						</div>


				</nav>
			</div>

		</div>
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

							<button class="controlButton play" title="Play button">
								<img src="assets/images/icons/play.png" alt="Play">
							</button>

							<button class="controlButton pause" title="Pause button" style="display: none;">
								<img src="assets/images/icons/play.png" alt="Pause">
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
	</div>

</body>

</html>