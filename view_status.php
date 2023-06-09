<!DOCTYPE html>
<html>
<head>
    <title>View Complaint Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-DmY9Wu9gLIDU8s1zUKi3ZRy6OBLyK7WVAkQtXfNj2mRDv04NQpq6n2rKGyO5K5wC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }

        .table {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container ">
        <h1>View Complaint Status</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Complaint ID</th>
                    <th>Complaint Description</th>
                    <th>Complaint Type</th>
                    <th>Response Text</th>
                    <th>Response Date</th>
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

    // Fetch complaints from database
    $sql = "SELECT complaints.complaint_id, complaints.complaint_description, complaints.complaint_type, IFNULL(response.response_text, 'Not responded') AS response_text, response.response_date FROM complaints LEFT JOIN response ON complaints.complaint_id = response.complaint_id";
    $result = mysqli_query($conn, $sql);

    // Display complaints in table
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["complaint_id"] . "</td>";
            echo "<td>" . $row["complaint_description"] . "</td>";
            echo "<td>" . $row["complaint_type"] . "</td>";
            echo "<td>" . $row["response_text"] . "</td>";
            echo "<td>" . $row["response_date"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No complaints found.</td></tr>";
    }

    // Close database connection
    mysqli_close($conn);
?>


            </tbody>
        </table>
    </div>
</body>
</html>
