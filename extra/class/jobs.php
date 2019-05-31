<?php

 class Jobs
 {
     
    protected $jid;
 	protected $loc;
 	protected $descrip;
 	protected $estCost;
 	protected $date;
 	protected $curDate;
    protected $jobDate;  
    protected $lastDate;
    protected $wid;


	public function __construct($jid, $loc, $descrip, $estCost, $date, $curDate, $jobDate, $lastDate, $wid)
	{
		$this->loc = $loc;
		$this->descrip = $descrip;
		$this->estCost = $estCost;
		$this->date = $date;
		$this->curDate = $curDate;
        $this->jobDate =$jobDate;       
        $this->lastDate = $lastDate;
	}

    public function getjid()
    {
        return $this->$jid;
    }

   
    public function setjid($jid)
    {
        $this->jid = $jid;
        return $this;

    }

    public function getloc()
    {
        return $this->$loc;
    }

   
    public function setloc($loc)
    {
        $this->loc = $loc;
        return $this;

    }


    public function getdescrip()
    {
        return $this->$descrip;
    }


    public function setdescrip($descrip)
    {
        $this->descrip = $descrip;
        return $this;

       
    }

   
    public function getestCost()
    {
        return $this->$estCost;
    }

    
    public function setestCost($estCost)
    {
        $this->estCost = $estCost;
        return $this;
    }

   
    public function getdate()
    {
        return $this->date;
    }

   
    public function setdate($date)
    {
        $this->date = $date;
        return $this;
    }

   
    public function getcurDate()
    {
        return $this->curDate;
    }

   
    public function setcurDate($curDate)
    {
        $this->curDate = $curDate;
        return $this;
        
    }

   
    public function getjobDate()    
    {
        return $this->jobDate;   
    }

   
    public function setjobDate($jobDate)   
    {
    
        $this->jobDate = $jobDate;
        return  $this;
        
    }
    public function getlastDate()    
    {
        return $this->lastDate;   
    }

   
    public function setlastDate($lastDate)   
    {
    
        $this->lastDate = $lastDate;
        return  $this;
        
    }

    public function getwid()
    {
        return $this->$wid;
    }

   
    public function setwid($wid)
    {
        $this->wid = $wid;
        return $this;

    }
} 

 ?>