<?php

class Messages 
{
	
	public $msg;
    public $date;
    public $jid;
    public $uid;


	public function __construct($msg, $date, $jid, $uid)
	{
		$this->msg = $msg;
        $this->date = $date;
        $this->jid = $jid;
        $this->uid = $uid;
	}


   
    public function getmsg()
    {
        return $this->$msg;
    }

    public function setmsg($msg)
    {
        $this->msg = $msg;
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

    public function getjid()
    {
        return $this->jid;
    }

  
    public function setjid($jid)
    {
        $this->jid = $jid;
        return $this;
    }

    public function getwid()
    {
        return $this->wid;
    }

  
    public function setwid($wid)
    {
        $this->wid = $wid;
        return $this;
    }
}

?>