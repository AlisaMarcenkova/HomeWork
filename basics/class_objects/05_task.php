<?php

class Date{
    private int $month;
    private int $day;
    private int $year;

    public function __construct($month, $day, $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $day
     */
    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    /**
     * @param int $month
     */
    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function displayDate(): string
    {
        return $this->getDay(). "/". $this->getMonth(). "/". $this->getYear();
    }
}

$day = (int) readline("Enter the day: ");
$month = (int) readline("Enter the month: ");
$year = (int) readline("Enter the year: ");

$date = new Date($day, $month, $year);

echo $date->displayDate();
echo PHP_EOL;