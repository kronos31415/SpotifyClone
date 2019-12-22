<?php include("includes/header.php") ;

if(isset($_GET['id'])) {
   $albumID = $_GET['id'];
}else {
    header("location: index.php");
}

$album = new Album($con, $albumID);
$artist = $album->getArtist();

?>

<div class = "entityInfo">
    <div class ="leftSection">
        <img src = "<?php echo $album->getArtWork(); ?>">
    </div>

    <div class ="rightSection">
        <h2><?php echo $album->getTitle();?> </h2>
        <p>By <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> songs</p>
    </div>
</div>

<div lass="trackListContainer">
    <ul class = "trackList">
        
        <?php
            $songsIdArray = $album->getSongIds();
            $i = 1;
            foreach($songsIdArray as $songId) {
                
                $albumSong = new Song($con, $songId);

                $albumArtist= $albumSong->getArtist();

                echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png'>
						<span class='trackNumber'>$i</span>
                    </div>
                    

                    <div class = 'trackInfo'>
                        <span class='trackName'>" . $albumSong->getTitle() . "</span>
                        <span class = 'artistName'>" . $albumArtist->getName() . "</span>
                    </div>

                    <div class='trackOptions>
                        <img class = 'optionButton' src = 'assets/images/icons/more.png'>
                    </div>

                    <div class = 'trackDuration'>
                        <span class= 'duration'>" . $albumSong->getDuration() . "</span>
                    </div>

				</li>";
                $i++;

            }
        ?>

<script>
			// var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			// tempPlaylist = JSON.parse(tempSongIds);
		</script>

    </ul>
</div>

<?php include("includes/footer.php") ?>
