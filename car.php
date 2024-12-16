<?php

class Employee {
    
    public $name;
    public $email;
    public $companyname;
    

    public function get_details(){
        $name="sandhya";
        $email="sandhyamb@gmail.com";
        $companyname="m and b technologies";
        
        echo "getting employee details <br>" ;
        echo "employee name: ".$name."<br>";
        echo "employee email: ".$email."<br>";
        echo "employee companyname: ".$companyname."<br>";
    }
    public function get_performance($rating,$years){
        echo "getting employee performance <br>";
        echo "performance rating: ".$rating."<br>";
        echo "years of service: ".$years."<br>";


    }
}
    
    $employee=new employee();

$employee->get_details();
$employee->get_performance(5,2)
?>


    

    

