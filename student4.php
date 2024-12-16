<?php

class Student {
    
    public $name;
    public $age;
    public $email;
    

    public function get_details(){
        $name="sandhya";
        $age="23";
        $email="sandhyamadagoni@gmail.com";
        
        echo "getting student details <br>" ;
        echo "student name: ".$name."<br>";
        echo "student age: ".$age."<br>";
        echo "student email: ".$email."<br>";
    }
    public function add_details($name,$age,$email){
        
        
        echo "adding student details <br>" ;
        echo "student name: ".$name."<br>";
        echo "student age: ".$age."<br>";
        echo "student email: ".$email."<br>";
    }
    public function get_performance($attendance,$marks){
        if($attendance>=70 && $marks>=50){
            if($attendance>=90 && $marks>=75){
                echo "distinction <br>";
            }
            else{
                echo "pass <br>";
            }
            
            
        }
        else{
            echo "fail <br>";
        }
        


    }
    public function get_graduation_status($degree, $year_of_graduation) {
        
        echo "Degree: " . $degree . "<br>";
        echo "Year of Graduation: " . $year_of_graduation . "<br>";
    }
    
    }
    $student=new student();
$name="sandhya";
        $age="23";
        $email="sandhyamadagoni@gmail.com";
        $student->add_details($name,$age,$email);
$student->get_details();
$attendance="90";
        $marks="60";
$student->get_performance($attendance,$marks);
$degree="Mechanical Engineering";
$year_of_graduation="2022";
$student->get_graduation_status($degree,$year_of_graduation);
?>


    

    

