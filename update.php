<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .btn-group {
            text-align: right;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update User Information</h2>
        <form action="/update" method="post">
            <div class="form-group">
                <label for="matric">Matric</label>
                <input type="text" id="matric" name="matric" value="">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="">
            </div>
            <div class="form-group">
                <label for="accessLevel">Access Level</label>
                <input type="text" id="accessLevel" name="accessLevel" value="">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn">Update</button>
                <button type="button" class="btn btn-cancel" onclick="window.location.href='/cancel'">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>