<?php
class concert{
    public $name;
    public $mobileNo;
    public $emailId;
    public $no_of_tickets;
    public $optradio;
    public $budget;
    public $booking_time;

    private $conn;

    public function __construct($conn)
    {
        $this->conn=$conn;
        
    }
    public function insertconcertdetail($obj){
        $sql="INSERT INTO registrants (name,mobileNo,emailId,no_of_tickets,optradio,budget,booking_time) VALUES('$obj->name','$obj->mobileNo','$obj->emailId','$obj->no_of_tickets','$obj->optradio','$obj->budget','$obj->booking_time');";
            $result=mysqli_query($this->conn,$sql);
            if($result==TRUE)
            {
                $msg=["Form successfully submitted"];
            }
            else
            {
                $msg=["Error occurred while submitting information. Please try again later."];
            }
            
            return json_encode($msg);
    }
    public function getconertdetails(){
        $sql="SELECT * FROM registrants;";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $arr[]=$row;
            }
        }
        return json_encode($arr);      
    }

}
?>