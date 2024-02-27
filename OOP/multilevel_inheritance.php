<?php
class Movie{
    private $movie_name, $director;

    function __construct($movie_name, $director){
        $this->movie_name = $movie_name;
        $this->director = $director;
    }

    function get_movie_details(){
        echo "Movie Name: ".$this->movie_name."<br/>Director: ".$this->director."</br>";
    }
}
class Song extends Movie{
    private $song_name, $singer;
    
    function __construct($movie_name, $director, $song_name, $singer){
        parent::__construct($movie_name, $director);
        $this->song_name = $song_name;
        $this->singer = $singer;
    }

    function get_song_details(){
        echo "Song Name: ".$this->song_name."<br/>Singer: ".$this->singer."</br>";
    }
}

class Actors extends Song{
    private $actor_name, $actress_name;

    function __construct($movie_name, $director, $song_name, $singer, $actor_name, $actress_name){
        parent::__construct($movie_name, $director, $song_name, $singer, $actor_name, $actress_name);
        $this->actor_name = $actor_name;
        $this->actress_name = $actress_name;
    }

    function get_actors_details(){
        echo "Actor Name: ".$this->actor_name."<br/>Actress Name: ".$this->actress_name."</br>";
    }
}

$movie = new Actors("Satyaprem Ki Katha", "Samir Raj Vidwans", "Aaj ke baad", "Manan Bhardawaj, Tulsi Kumar", "Kartik Aaryan", "Kiara Advani");
$movie->get_movie_details();
$movie->get_song_details();
$movie->get_actors_details();
?>