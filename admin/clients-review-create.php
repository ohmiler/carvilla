<?php

    include_once __DIR__ . "/config/database.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $clientMsg = $_POST['client_msg'];
        $clientName = $_POST['client_name'];
        $clientCity = $_POST['client_city'];
        
        $uploadDir = '../assets/uploads/';
        
        // Handle the file upload
        if (isset($_FILES['client_img']) && $_FILES['client_img']['error'] == 0) {
            $fileName = basename($_FILES['client_img']['name']);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $uniqueFileName = md5(uniqid()) . '.' . $fileType;  // Generate a unique name and append the extension
            $targetFilePath = $uploadDir . $uniqueFileName;

            // Allow certain file formats (you can add more if needed)
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array(strtolower($fileType), $allowTypes)) {
                if (move_uploaded_file($_FILES['client_img']['tmp_name'], $targetFilePath)) {
                    // File uploaded successfully, now save data to the database
                    
                    try {
                        $stmt = $con->prepare("INSERT INTO clients_review (client_img, client_msg, client_name, client_city) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$uniqueFileName, $clientMsg, $clientName, $clientCity]);

                        if ($stmt) {
                            echo json_encode([
                                "status" => "success",
                                "message" => "Data successfully inserted!"
                            ]);
                        } else {
                            echo json_encode([
                                "status" => "error",
                                "message" => "Failed to insert data."
                            ]);
                        }
                    } catch (PDOException $e) {
                        echo json_encode([
                            "status" => "error",
                            "message" => "Database error"
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" =>  "File upload failed."
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" =>  "Invalid file type."
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" =>  "No file uploaded or file upload error."
            ]);
        }
    }
?>
