<!DOCTYPE html> 
<html> 
<head> 
    <title>Login</title> 
    <style> 
        .success { 
            color: black; 
        } 
        .error { 
            color: red; 
        } 
    </style> 
</head> 
<body> 
    <h1>Login</h1> 
    <?php 
    session_start(); 
    $message = ''; 
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $conn = new mysqli("localhost", "root", "", "Lab_7"); 
 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
 
        $matric = $_POST['matric']; 
        $password = $_POST['password']; 
 
        $sql = "SELECT password FROM users WHERE matric='$matric'"; 
        $result = $conn->query($sql); 
 
        if ($result->num_rows > 0) { 
            $row = $result->fetch_assoc(); 
            if (password_verify($password, $row['password'])) { 
                $_SESSION['matric'] = $matric; 
                $message = "Login successful!"; 
                echo "<p class='success'>$message</p>"; 
                header("Refresh: 2; URL=display_users.php"); 
                exit(); 
            } else { 
                $message = "Invalid password"; 
                echo "<p class='error'>$message</p>"; 
            } 
        } else { 
            $message = "No user found with that matric"; 
            echo "<p class='error'>$message</p>"; 
        } 
 
        $conn->close(); 
    } 
    ?> 
 
    <form action="" method="POST"> 
        <label for="matric">Matric:</label> 
        <input type="text" id="matric" name="matric" required><br><br> 
         
        <label for="password">Password:</label> 
        <input type="password" id="password" name="password" required><br><br> 
         
        <input type="submit" value="Login"> 
    </form> 
    <p> <a href="register.php">Register</a> if you have not. </p> 
</body> 
</html>