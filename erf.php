<?php
class employee{
    public $name;
    public $id;
    public $company;
    public $performance;
    public $errors=[];
    public function __construct($name,$id,$company,$performance){
        $this->name=$name;
        $this->id=$id;
        $this->company=$company;
        $this->performance=$performance;

    }
    public function validate(){
        if(empty($this->name)){
            $this->errors[]="Name is required.";
        }
        if(empty($this->id)){
            $this->errors[]="Id is required.";
        }
        if(empty($this->company)){
            $this->errors[]="Company is required.";
        }
        if(empty($this->performance)){
            $this->errors[]="Performance is required.";
        }
        if(!empty($this->performance)){
            if($this->performance>=5){
                echo "Excellent. <br>";
            }
            elseif($this->performance>=4){
                echo "Good. <br>";

            }
            elseif($this->performance>=3){
                echo "Satisfactory. <br>";
            }
            elseif($this->performance>=2){
                echo "Fair. <br>";
            }
            elseif($this->performance>=1){
                echo "Poor. <br>";
            }
        }
        return empty($this->errors);
        
    }
    public function save(){
        return["name"=>$this->name,"id"=>$this->id,"company"=>$this->company,"performance"=>$this->performance];
    }
    public function get_errors(){
        return $this->errors;
    }
    
}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=isset($_POST["name"]) ? $_POST["name"]: "";
    $id=isset($_POST["id"]) ? $_POST["id"]: "";
    $company=isset($_POST["company"]) ? $_POST["company"]: "";
    $performance=isset($_POST["performance"]) ? $_POST["performance"]: "";

$form=new Employee($name,$id,$company,$performance);
if($form->validate()){
    $UserData=$form->save();
    echo "Registration successful! <br>";
    echo "Name: ". $UserData["name"] . "<br>";
    echo "Id: ".$UserData["id"] ."<br>";
    echo "Company: ".$UserData["company"] ."<br>";
    echo "Performance: ".$UserData["performance"] ."<br>";

}
else{
    $errors=$form->get_errors();
    foreach($errors as $error){
        echo "<p style='color:red;'>$error</p>";
    }
}
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width initial-scale=1.0">
            <title>Employee Registration Form</title>
        </head>
        <body>
            <h2>Employee Registration Form</h2>
            <form method="POST" action="">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value=""><br><br>
                <label for="id">Id:</label><br>
                <input type="number" id="id" name="id" value=""><br><br>
                <label for="company">Company:</label><br>
                <input type="text" id="company" name="company" value=""><br><br>
                <label for="performance">Performance:</label>
                <input type="number" id="performance" name="performance" value=""><br><br>
                <input type="submit" value="Register">
        </body>
    </html>