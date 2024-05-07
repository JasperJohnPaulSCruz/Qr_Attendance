<?php

include 'db.php';

$query = $_GET["query"];

$sql = "SELECT * FROM student_record WHERE name LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td></tr>";
    }
} else {
    echo "<tr><td>No results found.</td></tr>";
}

$conn->close();

?>