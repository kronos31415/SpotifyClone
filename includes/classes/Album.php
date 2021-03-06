<?php
    class Album {
        
        private $con;
        private $id;
        private $title;
        private $artistId;
        private $genre;
        private $artworkPath;

        public function __construct($con, $id) {
            $this->con = $con;
            $this->id = $id;

            $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id = '$this->id'");
            $album = mysqli_fetch_array($query);

            $this->title = $album['title'];
            $this->artistId = $album['id'];
            $this->genre = $album['genre'];
            $this->artworkPath = $album['artworkPath'];

        }

        public function getTitle() {
            return $this->title;
        }

        public function getArtWork() {
            return $this->artworkPath;
        }

        public function getGenre() {
            return $this->genre;
        }

        public function getArtist() {
            return new Artist($this->con, $this->artistId);
        }

        public function getNumberOfSongs() {
            $query = mysqli_query($this->con, "Select id From songs WHERE album = '$this->id'");
            return mysqli_num_rows($query);
        }

        public function getSongIds() {
            $query1 = "Select id from songs Where album = '$this->id' order by albumOrder ASC";
            $result = mysqli_query($this->con, $query1);
            $array = array();

            while($row = mysqli_fetch_array($result)) {
                array_push($array, $row['id']);
            }
            return $array;
        }

        
    }

?>