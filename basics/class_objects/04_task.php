<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStudio()
    {
        return $this->studio;
    }

    public function getRating()
    {
        return $this->rating;
    }
    function getPG(Movie $movie)
    {
        if($movie->getRating() == "PG"){
            return $movie->getTitle(). ', ' . $movie->getStudio() . ', ' . $movie->getRating();
        }
    }
}

$movies = [
    new Movie("Casino Royale", "Eon Productions", "PG13"),
    new Movie("Glass", "Buena Vista International", "PG13"),
    new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG")
];

foreach ($movies as $movie){
    echo $movie->getPG($movie);
}
echo PHP_EOL;