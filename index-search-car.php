<?php

include_once __DIR__ . "/config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Retrieve selected criteria
    $year = $_POST['year'];
    $style = $_POST['style'];
    $make = $_POST['make'];
    $condition = $_POST['condition'];
    $model = $_POST['model'];
    $price = $_POST['price'];

    // Base query
    // True Condition (1=1): We begin the query with WHERE 1=1 
    // so that each additional condition can be added with AND without any logic issues.
    $query = "SELECT * FROM featured_cars WHERE 1=1";
    $params = [];   // Parameter Array: The parameters are stored in the $params array, 
                    // allowing easy binding after building the query.

    // Add conditions based on selected criteria
    if ($year !== 'default') {
        $query .= " AND year = :year";
        $params[':year'] = $year;
    }
    if ($style !== 'default') {
        $query .= " AND body_style = :style";
        $params[':style'] = $style;
    }
    if ($make !== 'default') {
        $query .= " AND make = :make";
        $params[':make'] = $make;
    }
    if ($condition !== 'default') {
        $query .= " AND car_condition = :condition";
        $params[':condition'] = $condition;
    }
    if ($model !== 'default') {
        $query .= " AND model = :model";
        $params[':model'] = $model;
    }
    if ($price !== 'default') {
        if ($price === 'under-1000000') {
            $query .= " AND price < 1000000";
        } else if ($price === 'over-1000000') {
            $query .= " AND price > 1000000";
        }
    }

    $stmt = $con->prepare($query);

    // Bind parameters dynamically
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
        // bindValue in Loop: Instead of binding each parameter individually, 
        // we iterate over $params to bind values dynamically. 
        // This approach reduces code repetition and improves maintainability.
    }

    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return JSON-encoded results
    echo json_encode($cars);
}
