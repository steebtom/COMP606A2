<?php

class Contracts 
{
	
	public $tcost;
    public $labour;
    public $material;
    public $date;
   
    


	public function __construct($tcost, $labour, $material, $date)
	{
		$this->tcost = $tcost;
        $this->labour = $labour;
        $this->material = $material;
        $this->date = $date;
       
	}


   
    public function gettcost()
    {
        return $this->$tcost;
    }

    public function settcost($tcost)
    {
        $this->tcost = $tcost;
        return $this;
    }

   
    public function getlabour()
    {
        return $this->labour;
    }

  
    public function setlabour($labour)
    {
        $this->labour = $labour;
        return $this;
    }

    public function getmaterial()
    {
        return $this->$material;
    }

    public function setmaterial($material)
    {
        $this->material = $material;
        return $this;
    }

    public function getdate()
    {
        return $this->$date;
    }

    public function setdate($date)
    {
        $this->date = $date;
        return $this;
    }

}

?>