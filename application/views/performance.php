<?php 
class performance{

	private $performanceID;
	private $musicianId;
	private $month;
	private $year;
	private $imageURL;
	private $description;




    /**
     * @return mixed
     */
    public function getPerformanceID()
    {
        return $this->performanceID;
    }

    /**
     * @param mixed $performanceID
     *
     * @return self
     */
    public function setPerformanceID($performanceID)
    {
        $this->performanceID = $performanceID;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMusicianId()
    {
        return $this->musicianId;
    }

    /**
     * @param mixed $musicianId
     *
     * @return self
     */
    public function setMusicianId($musicianId)
    {
        $this->musicianId = $musicianId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     *
     * @return self
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     *
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageURL()
    {
        return $this->imageURL;
    }

    /**
     * @param mixed $imageURL
     *
     * @return self
     */
    public function setImageURL($imageURL)
    {
        $this->imageURL = $imageURL;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
?>