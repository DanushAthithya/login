<?php
$conn = mysqli_connect("localhost", "root", "", "bus_tickets"); // Update database connection details

// Get form data
$fromPlace = $_POST['from_place'];
$toPlace = $_POST['to_place'];
$numTickets = $_POST['num_tickets'];

// Check if the selected number of tickets is greater than the available tickets
$result = mysqli_query($conn, "SELECT tickets_available FROM bus_ticket WHERE from_place='$fromPlace' AND to_place='$toPlace'");
$row = mysqli_fetch_assoc($result);
$ticketsAvailable = $row['tickets_available'];
if ($numTickets > $ticketsAvailable) {
    echo "Error: Selected number of tickets is greater than available tickets.";
} else {
    // Update tickets available in the database
    $newTicketsAvailable = $ticketsAvailable - $numTickets;
    mysqli_query($conn, "UPDATE bus_ticket SET tickets_available='$newTicketsAvailable' WHERE from_place='$fromPlace' AND to_place='$toPlace'");

    // Display success message
    echo "Tickets booked successfully. Number of tickets booked: $numTickets";
}
mysqli_close($conn);
?>