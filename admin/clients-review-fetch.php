<?php 

    include_once __DIR__ . '/config/database.php';

    // Get the parameters sent by DataTables
    $draw = intval($_GET['draw']);
    $start = intval($_GET['start']);
    $length = intval($_GET['length']);
    $searchValue = $_GET['search']['value'] ?? ''; // Handle optional search value

    // Base query to fetch all cars
    $query = "SELECT * FROM clients_review WHERE client_name LIKE :searchValue";

    // Prepare and execute the statement
    $stmt = $con->prepare($query);
    $stmt->bindValue(':searchValue', '%' . $searchValue . '%', PDO::PARAM_STR);
    $stmt->execute();

    $clients_review = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalFiltered = $stmt->rowCount(); // Total records after filtering

    // Now apply pagination
    $query .= " LIMIT :start, :length";
    $stmt = $con->prepare($query);
    $stmt->bindValue(':searchValue', '%' . $searchValue . '%', PDO::PARAM_STR);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':length', $length, PDO::PARAM_INT);
    $stmt->execute();

    $clients_review = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get total records in the database
    $totalRecordsQuery = $con->prepare("SELECT COUNT(*) FROM clients_review");
    $totalRecordsQuery->execute();
    $totalRecords = $totalRecordsQuery->fetchColumn(); // Total records before filtering

    $response = [
        "draw" => $draw,                   // Ensure this comes from the request
        "recordsTotal" => intval($totalRecords),   // Total records before filtering
        "recordsFiltered" => $totalFiltered, // Total records after filtering
        "data" => $clients_review                   // Actual data for the table
    ];

    echo json_encode($response);  // Output the cars as a JSON array


?>