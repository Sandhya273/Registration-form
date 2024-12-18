<?php
class RegistrationForm {
    public $name;
    public $age;
    public $email;
    public $marks;
    public $errors = [];

    
    public function __construct($name, $age, $email, $marks) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->marks = $marks;
    }

    
    public function validate() {
        if (empty($this->name)) {
            $this->errors[] = "Name is required.";
        }

        if (empty($this->age)) {
            $this->errors[] = "Age is required.";
        }

        if (empty($this->email)) {
            $this->errors[] = "Email is required.";
        }

        if (empty($this->marks)) {
            $this->errors[] = "Marks are required.";
        }

        if (!empty($this->marks)) {
            if ($this->marks >= 90) {
                echo "Grade: A <br>";
            } elseif ($this->marks >= 75) {
                echo "Grade: B <br>";
            } elseif ($this->marks >= 50) {
                echo "Grade: C <br>";
            } else {
                echo "Grade: Fail <br>";
            }
        }

        return empty($this->errors); 
    }

    public function save() {
        return ['name' => $this->name,'age' => $this->age,'email' => $this->email,'marks' => $this->marks];
    }

    
    public function getErrors() {
        return $this->errors;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $marks = isset($_POST['marks']) ? $_POST['marks'] : '';

    
    $form = new RegistrationForm($name, $age, $email, $marks);

    
    if ($form->validate()) {
        
        $UserData = $form->save();
        echo "Registration successful!<br>";
        echo "Name: " . $UserData['name'] . "<br>";
        echo "Age: " . $UserData['age'] . "<br>";
        echo "Email: " . $UserData['email'] . "<br>";
        echo "Marks: " . $UserData['marks'] . "<br>";
    } 
    else {
    
        $errors = $form->getErrors();
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value=""><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" value=""><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value=""><br><br>

        <label for="marks">Marks:</label><br>
        <input type="number" id="marks" name="marks" value=""><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>