<?php 

include_once __DIR__ . '/config/database.php';

// Query to count entries in multiple tables
$query = "
    SELECT 'Newest Cars' AS label, COUNT(*) AS total FROM newest_cars
    UNION ALL
    SELECT 'Featured Cars', COUNT(*) as featured_cars FROM featured_cars
    UNION ALL
    SELECT 'Client Reviews', COUNT(*) as clients_review FROM clients_review;
";

// Prepare and execute the query
$stmt = $con->prepare($query);
$stmt->execute();

// Fetch all results
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if data exists
if ($data) {
    echo json_encode($data); // Return JSON data
} else {
    echo json_encode([]); // Return empty array if no entries
}

?>