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
                    <th>Complaint</th>
                    <th>Date</th>
                    <th>Response</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to MySQL database
                    $conn = mysqli_connect("localhost", "root", "", "fts");

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Delete complaint if delete button is clicked
                    if (isset($_POST["delete"])) {
                        $complaint_id = $_POST["delete"];
                        $sql = "DELETE FROM complaints WHERE complaint_id=$complaint_id";
                        mysqli_query($conn, $sql);
                    }

                    // Fetch complaints from database
                    $sql = "SELECT * FROM complaints";
                    $result = mysqli_query($conn, $sql);

                    // Display complaints in table
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["complaint_id"] . "</td>";
                            echo "<td>" . $row["complaint_type"] . "</td>";
                            echo "<td>" . $row["date_created"] . "</td>";
                            echo "<td>" . $row["response"] . "</td>";
                            echo '<td>
                                    <form method="post">
                                        <button type="submit" class="btn btn-danger" name="delete" value="' . $row["complaint_id"] . '">Delete</button>
                                    </form>
                                  </td>';
                            echo "</tr>";
                        }
                    }

                    // Close database connection
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
