<?php
class Student{
    public $name;
    public $age;
    public $qualification;
    public $email;
    public $college;
    public $address;

    public function name(){
        echo "student name is Sandhya <br>";

    }
    public function age(){
        echo "23 years old <br>";
    }
    public function qualification(){
        echo "graduated <br>";
    
    }
    public function email(){
        echo "sandhyamadagoni02@gmail.com <br>";
    
    }
    public function college(){
        echo "JNTUH College of Engineering Manthani <br>";
    }
    public function attendance(){
        echo "attendance is 90% <br>";
    }
    public function course(){
        echo "Mechanical Engineering <br>";
    }
    public function rollnumber(){
        echo "18VD1A0341 <br>";

    }
    Public function marks(){
        echo "65% <br>";

    }
    public function mobilenumber(){
        echo "8790248811 <br>";
    }
    public function address(){
        echo "Hyderabad <br>";
    }
}
    
$student=new student();
$student->name();
$student->age();
$student->qualification();
$student->email();
$student->college();
$student->rollnumber();
$student->attendance();
$student->marks();
$student->mobilenumber();
$student->address();
?>
