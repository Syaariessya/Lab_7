<!DOCTYPE html> 
<html> 
<head> 
    <title>Users List</title> 
</head> 
<body> 
    <h1>Users List</h1> 
    <?php 
    session_start(); 
     
    if (!isset($_SESSION['matric'])) { 
        header("Location: login.php"); 
        exit(); 
    } 
 
    $conn = new mysqli("localhost", "root", "", "Lab_7"); 
 
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if (isset($_POST['delete'])) { 
            $conn->query($sql); 
        } elseif (isset($_POST['update'])) { 
            $matric = $_POST['matric']; 
            $name = $_POST['name']; 
            $role = $_POST['role']; 
            $sql = "UPDATE users SET matric='$matric', name='$name', role='$role'"; 
            $conn->query($sql); 
        } 
    } 
 
    $sql = "SELECT matric, name, role FROM users"; 
    $result = $conn->query($sql); 
 
    if ($result->num_rows> 0) { 
        echo "<table border='1'><tr><th>Matric</th><th>Name</th><th>Role</th><th>Actions</th></tr>"; 
        while ($row = $result->fetch_assoc()) { 
            echo "<tr> 
                <form method='POST'> 
                    <td><input type='text' name='matric' value='" . $row["matric"] . "'></td> 
                    <td><input type='text' name='name' value='" . $row["name"] . "'></td> 
                    <td> 
                        <select name='role'> 
                            <option value='student'" . ($row['role'] == 'student' ? ' selected' : '') . ">Student</option> 
                            <option value='lecturer'" . ($row['role'] == 'lecturer' ? ' selected' : '') . ">Lecturer</option> 
                        </select> 
                    </td> 
                    <td> 
                        <input type='submit' name='update' value='Update'> 
                        <input type='submit' name='delete' value='Delete'> 
                    </td> 
                </form> 
            </tr>"; 
        } 
        echo "</table>"; 
    } else { 
        echo "0 results"; 
    } 
 
    $conn->close(); 
    ?> 
</body> 
</html>