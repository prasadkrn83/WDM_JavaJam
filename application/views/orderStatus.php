<?php

	class OrderStatus {
		private $isError;
		private $isInsert;
		private $isValidationError;
		private $isAnyEmpty;
		private $email;
		private $zip;
		private $creditcard;
		private $year;
		private $month;



	
    /**
     * @return mixed
     */
    public function getIsError()
    {
        return $this->isError;
    }

    /**
     * @param mixed $isError
     *
     * @return self
     */
    public function setIsError($isError)
    {
        $this->isError = $isError;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsAnyEmpty()
    {
        return $this->isAnyEmpty;
    }

    /**
     * @param mixed $isAnyEmpty
     *
     * @return self
     */
    public function setIsAnyEmpty($isAnyEmpty)
    {
        $this->isAnyEmpty = $isAnyEmpty;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     *
     * @return self
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditcard()
    {
        return $this->creditcard;
    }

    /**
     * @param mixed $creditcard
     *
     * @return self
     */
    public function setCreditcard($creditcard)
    {
        $this->creditcard = $creditcard;

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
    public function getIsValidationError()
    {
        return $this->isValidationError;
    }

    /**
     * @param mixed $isValidationError
     *
     * @return self
     */
    public function setIsValidationError($isValidationError)
    {
        $this->isValidationError = $isValidationError;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getIsInsert()
    {
        return $this->isInsert;
    }

    /**
     * @param mixed $isInsert
     *
     * @return self
     */
    public function setIsInsert($isInsert)
    {
        $this->isInsert = $isInsert;

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
}

?>