<?php

class Application
{

    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $title = readline("Enter the movie title: ");
                    $this->addMovies($title);
                    break;
                case 2:
                    echo "Available movies: " . PHP_EOL;
                    $this->availableVideoList();
                    $chosenTitle = readline("Enter the movie title: ");
                    if (!$this->registeredVideo($chosenTitle)) {
                        echo "Something went wrong. Try again" . PHP_EOL;
                    }
                    $this->rentVideo($chosenTitle);
                    break;
                case 3:
                    $returnedVideo = readline("Enter the movie title: ");
                    if (!$this->registeredVideo($returnedVideo)) {
                        echo "We don't have this movie." . PHP_EOL;
                        break;
                    }
                    echo "Please rate the movie {$returnedVideo}?" . PHP_EOL;
                    echo "[1] Rate the movie" . PHP_EOL;
                    echo "[2] Skip rating" . PHP_EOL;
                    $select = (int)readline("Select an option: ");
                    switch ($select) {
                        case 1:
                            $this->returnVideo($returnedVideo);
                            $rated = readline("Enter your rating: ");
                            $this->setRating($returnedVideo, $rated);
                            echo "Video returned successfully. Rating submitted" . PHP_EOL;
                            break;
                        case 2:
                            $this->returnVideo($returnedVideo);
                            echo "Video returned successfully. No rating left" . PHP_EOL;
                            break;
                    }
                    break;
                case 4:
                    echo "Inventory: " . PHP_EOL;
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(string $title)
    {
        $this->videoStore->addVideo($title);
    }

    private function rentVideo(string $title)
    {
        $this->videoStore->rentingOut($title);
    }

    private function returnVideo(string $title)
    {
        $this->videoStore->returning($title);
    }

    private function listInventory()
    {
        foreach ($this->videoStore->getInventory() as $video) {
            echo "Title: " . $video->getTitle() . ", average rating (1 - 5): " . $video->getAverageRating() . ", available: " . $video->checkedOut() . PHP_EOL;
        }
    }

    private function availableVideoList()
    {
        foreach ($this->videoStore->getAvailableVideos() as $video) {
            echo "Title: " . $video->getTitle() . ", average rating (1-5): " . $video->getAverageRating() . ", % of users who liked video: " . $video->getPositiveRatingPercent() . PHP_EOL;
        }
    }

    private function setRating(string $title, int $rating)
    {
        $this->videoStore->giveRating($title, $rating);
    }

    private function registeredVideo(string $returnedVideoName)
    {
        foreach ($this->videoStore->getInventory() as $video) {
            if ($video->getTitle() === $returnedVideoName) {
                return true;
            }
        }
        return false;
    }
}

class VideoStore
{
    private array $inventory;

    public function __construct(array $inventory = [])
    {
        $this->inventory = $inventory;
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function getAvailableVideos()
    {
        $availableMovies = [];
        foreach ($this->inventory as $video) {
            if ($video->checkedOut() === true) {
                $availableMovies[] = $video;
            }
        }
        return $availableMovies;
    }

    public function getRentedVideos()
    {
        $rentedMovies = [];
        foreach ($this->inventory as $video) {
            if ($video->checkedOut() === false) {
                $rentedMovies[] = $video;
            }
        }
        return $rentedMovies;
    }

    public function addVideo(string $title): void
    {
        $this->inventory[] = new VideoStore([$title]);
    }

    public function rentingOut(string $title)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                $video->beingCheckedOut();
            }
        }
    }

    public function giveRating(string $title, int $rating)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                $video->receivingRating($rating);
            }
        }
    }

    public function returning(string $title)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                $video->beingReturned();
            }
        }
    }
}

class Video
{
    private string $title;
    private bool $availability;
    private float $averageRating;
    private array $ratings = [];

    public function __construct(string $title, bool $availability = true, float $averageRating = 0)
    {
        $this->title = $title;
        $this->availability = $availability;
        $this->averageRating = $averageRating;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function checkedOut()
    {
        return $this->availability;
    }

    public function getAverageRating()
    {
        return $this->averageRating;
    }

    public function beingCheckedOut()
    {
        $this->availability = false;
    }

    public function beingReturned()
    {
        $this->availability = true;
    }

    public function receivingRating($rating)
    {
        $this->ratings[] = $rating;
        $this->averageRating = number_format(array_sum($this->ratings) / count($this->ratings), 2);
    }

    public function getPositiveRatingPercent()
    {
        if (count($this->ratings) === 0) {
            return "0%";
        }
        $positiveRating = [];
        foreach ($this->ratings as $rating) {
            if ($rating >= 3) {
                $positiveRating[] = $rating;
            }
        }
        return number_format(count($positiveRating) / count($this->ratings) * 100, 2) . "%";
    }
}

class VideoStoreTest
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore();
    }

    public function testAddVideo()
    {
        $this->store->addVideo("The Matrix");
        $this->store->addVideo("Godfather II");
        $this->store->addVideo("Star Wars Episode IV: A New Hope");

        foreach ($this->store->getInventory() as $video) {
            echo "Movie: " . $video->getTitle() . " Rating: " . $video->getAverageRating() . PHP_EOL;
        }
    }

    public function testReceiveRating()
    {
        foreach ($this->store->getInventory() as $video) {
            echo "Before: Movie: " . $video->getTitle() . " Rating: " . $video->getAverageRating() . PHP_EOL;
            $video->receivingRating(rand(1, 5));
            $video->receivingRating(rand(1, 5));
            $video->receivingRating(rand(1, 5));
            echo "After: Movie: " . $video->getTitle() . " Rating: " . $video->getAverageRating() . PHP_EOL;

        }
    }
    public function testRentReturn(){
        $this->store->rentingOut("Godfather II");
        foreach ($this->store->getInventory() as $video){
            if($video->getTitle() === "Godfather II"){
                if($video->checkedOut()){
                    echo "Expected false" . $video->checkedOut() . PHP_EOL;
                }
            }
        }
        $this->store->returning("Godfather II");
        foreach ($this->store->getInventory() as $video){
            if($video->checkedOut()){
                echo "Expected true" . $video->checkedOut() . PHP_EOL;
            }
        }
    }
    public function testInventory(){
        $this->store->rentingOut("Godfather II");
        foreach ($this->store->getInventory() as $video){
            echo "Movie: " . $video->getTitle() . ", availability: " . $video->checkedOut() . PHP_EOL;
        }
    }
}

$app = new Application();
$app->run();