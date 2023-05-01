<!DOCTYPE html>
<html>
<head>
    <title>Training Modules</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-DmY9Wu9gLIDU8s1zUKi3ZRy6OBLyK7WVAkQtXfNj2mRDv04NQpq6n2rKGyO5K5wC" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
        }
        
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table th {
            background-color: #f8f9fa;
            color: #000000;
            border-color: #000000;
        }
        .table td {
            border-color: #f8f9fa;
        }
        .table a {
            color: #007bff;
            text-decoration: none;
        }
        .table a:hover {
            text-decoration: underline;
        }
        h1 {
            text-align: center;
            color: #000000;
            margin-bottom: 30px;
        }
        /* Responsive styles */
        @media (max-width: 576px) {
            .container {
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Training Modules</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Module ID</th>
                    <th>Module Name</th>
                    <th>Description</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to MySQL database
                    $conn = mysqli_connect("localhost", "root", "", "first");

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Fetch modules from database
                    $sql = "SELECT * FROM modules";
                    $result = mysqli_query($conn, $sql);

                    // Display modules in table
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th>{$row['module_id']}</th>";
                            echo "<th>{$row['module_name']}</th>";
                            echo "<th>{$row['module_description']}</th>";
                            echo "<th><a href='{$row['module_file']}' target='_blank'>{$row['module_file']}</a></th>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No modules found</td></tr>";
                    }

                    // Close database connection
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
