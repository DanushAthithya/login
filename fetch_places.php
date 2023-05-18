<?php
$conn = mysqli_connect("localhost", "root", "", "bus_tickets"); // Update database connection details

// Fetch and return available places as options
$options = '<select>';
$result = mysqli_query($conn, "SELECT DISTINCT from_place, to_place FROM bus_ticket");
while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option  value="' . $row['from_place'] . '">' . $row['from_place'] . '</option>';
    $options .= '<option  value="' . $row['to_place'] . '">' . $row['to_place'] . '</option>';
}
$options .= '</select>';
mysqli_close($conn);

echo $options;
?>