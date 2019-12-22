<?php
    class Song {
        
        private $con;
        private $id;
        private $mysqliData;
        private $title;
        private $artistId;
        private $duration;
        private $path;
        private $genre;
        private $albumId;

        public function __construct($con, $id) {
            $this->con = $con;
            $this->id = $id;

            $query = mysqli_query($this->con, "SELECT * FROM songs WHERE id = '$this->id'");
            $this->mysqliData = mysqli_fetch_array($query);
            $this->title = $this->mysqliData['title'];
            $this->artistId = $this->mysqliData['artist'];
            $this->duration = $this->mysqliData['duration'];
            $this->path = $this->mysqliData['path'];
            $this->genre = $this->mysqliData['genre'];
            $this->albumId = $this->mysqliData['album'];
        }
        
        public function getTitle() {
            return $this->title;
        }

        public function getId() {
            return $this->id;
        }

        public function getArtist() {
            return new Artist($this->con, $this->artistId);
        }

        public function getAlbum() {
            return new Album($this->con, $this->id);
        }

        public function getGenre() {
            return $this->genre;
        }

        public function getPath() {
            return $this->path;
        }

        public function getDuration() {
            return $this->duration;
        }

        public function getMysqliData() {
            return $this->mysqliData;
        }
    }

?>