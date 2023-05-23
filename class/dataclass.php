<?php
    class dataclass
    {
        public $conn;
        public $message;

        public function __construct()
        {
            $this->conn=mysqli_connect("localhost","root","","realestatedb");
        }
        public function getRecord($query)
        {
            $tb=mysqli_query($this->conn,$query);
            $rw=mysqli_fetch_array($tb);
            return $rw;
        }
        public function gettable($query)
        {
            $tb=mysqli_query($this->conn,$query);
            return $tb;
        }
        public function saveRecord($query)
        {
            $result=mysqli_query($this->conn,$query);
            return $result;
        }
        public function primary($query)
        {
            $tb=mysqli_query($this->conn,$query);
            $rw=mysqli_fetch_array($tb);

            if($rw)
                $pk=$rw[0]+1;
            else    
                $pk=1;

                return $pk;
        }
	  public function checkid($query) //select id from tab where id='$id'
	 {
		 $result=false;
		 
        $tb=mysqli_query($this->conn,$query);
		$rw=mysqli_fetch_array($tb);
		
		if($rw)
		  $result=true;
	    else
         $result=false;          			
		  
		return $result;
	 }
            public function getData($query)
            {
                $data="";
                $tb=mysqli_query($this->conn,$query);
                $rw=mysqli_fetch_array($tb);
                if($rw)
                {
                    $data=$rw[0];
                }
                return $data;
            }
			
			
            public function getcount($query)
            {
                $count="";
                $tb=mysqli_query($this->conn,$query);
                $rw=mysqli_fetch_array($tb);
                if($rw)
                {
                    $count=$rw[0];
                }
                return $count;
            }


    }  
?> 