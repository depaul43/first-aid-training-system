<?php
                // Connect to the database
                $host = "localhost";
                $username = "root";
                $password = "";
                $dbname = "fts";

                $conn = mysqli_connect($host, $username, $password, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Retrieve user complaints from the database
                $sql = "SELECT * FROM complaints";
                $result = mysqli_query($conn, $sql);

                // Display the complaints to the admin
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["complaint_id"] . "</td>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["complaint_name"] . "</td>";
                        echo "<td>" . $row["complaint_type"] . "</td>";
                        echo "<td>" . $row["complaint_description"] . "</td>";
                        echo "<td>" . $row["complaint_namr"] . "</td>";
                        echo "<td>" . $row["date_created"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No complaints found.</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js" integrity="sha384-T5q3qD8vw2Q9yL24jK7R48tMtu8jQWxPvPxIxyR13rbup/cfc8SoOJ9m/E/a/Cvn" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>