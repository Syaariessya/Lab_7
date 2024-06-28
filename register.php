<!DOCTYPE html> 
<html> 
<head> 
    <title>Registration Form</title> 
</head> 
<body> 
    <?php 
    // Handle form submission and insert data into the database 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $conn = new mysqli("localhost", "root", "", "Lab_7"); 
 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
 
        $matric = $_POST['matric']; 
        $name = $_POST['name']; 
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password 
        $role = $_POST['role']; 
 
        $sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')"; 
 
        if ($conn->query($sql) === TRUE) { 
            echo "New record created successfully"; 
        } else { 
            echo "Error: " . $sql . "<br>" . $conn->error; 
        } 
 
        $conn->close(); 
    } 
    ?> 
 
    <form action="" method="POST"> 
        <label for="matric">Matric:</label> 
        <input type="text" id="matric" name="matric" required><br><br> 
         
        <label for="name">Name:</label> 
        <input type="text" id="name" name="name" required><br><br> 
         
        <label for="password">Password:</label> 
        <input type="password" id="password" name="password" required><br><br> 
         
        <label for="role">Role:</label> 
        <select id="role" name="role" required> 
            <option value="">Please select</option> 
            <option value="student">Student</option> 
            <option value="lecturer">Lecturer</option> 
        </select><br><br> 
         
        <input type="submit" value="Submit"> 
    </form> 
</body> 
</html>