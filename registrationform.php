<?php
class RegistrationForm {
    public $name;
    public $age;
    public $email;
    public $marks;
    public $errors = [];
    public $db;

    
    public function __construct($name, $age, $email, $marks, $db) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->marks = $marks;
        $this->db = $db;
    }

    
    public function validate() {
        if (empty($this->name)) {
            $this->errors[] = "Name is required.";
        }

        if (empty($this->age)) {
            $this->errors[] = "Age is required number.";
        }

        if (empty($this->email)) {
            $this->errors[] = "Email is required.";
        }

        if (empty($this->marks)) {
            $this->errors[] = "Marks is required.";
        }

        
        if (empty($this->errors)) {
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
        $stmt = $this->db->prepare("INSERT INTO student (name, age, email, marks) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $this->name, $this->age, $this->email, $this->marks);

        if ($stmt->execute()) {
            return ['name' => $this->name, 'age' => $this->age, 'email' => $this->email, 'marks' => $this->marks];
        } else {
            $this->errors[] = "Error saving data to the database: " . $stmt->error;
            return false;
        }
    }

    
    public function getErrors() {
        return $this->errors;
    }
}


include "db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $marks = isset($_POST['marks']) ? $_POST['marks'] : '';

    
    $form = new RegistrationForm($name, $age, $email, $marks, $conn);

    
    if ($form->validate()) {
        $userData = $form->save();
        if ($userData) {
            echo "Registration successful!<br>";
            echo "Name: " . ($userData['name']) . "<br>";
            echo "Age: " . ($userData['age']) . "<br>";
            echo "Email: " . ($userData['email']) . "<br>";
            echo "Marks: " . ($userData['marks']) . "<br>";
        }
    } else {
        
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
