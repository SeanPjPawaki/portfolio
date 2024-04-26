<?php
session_start();
include('../includes/conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_id']) && isset($_POST['editName']) && isset($_POST['editDescription'])) {
        $edit_id = $_POST['edit_id'];
        $editName = $_POST['editName'];
        $editDescription = $_POST['editDescription'];
        if (isset($_FILES['uploadPic']) && $_FILES['uploadPic']['error'] === UPLOAD_ERR_OK) {
            $uploadPic = $_FILES['uploadPic']['tmp_name']; 
            $uploadPicName = $_FILES['uploadPic']['name']; 
            $uploadPath = '../external/uploads/' . $uploadPicName; 
            if (move_uploaded_file($uploadPic, $uploadPath)) {
                $sql = "INSERT INTO artworks (id, name, description, picture) VALUES (:id, :name, :description, :picture) 
                        ON DUPLICATE KEY UPDATE name = VALUES(name), description = VALUES(description), picture = VALUES(picture)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $edit_id);
                $stmt->bindParam(':name', $editName);
                $stmt->bindParam(':description', $editDescription);
                $stmt->bindParam(':picture', $uploadPicName);
                if ($stmt->execute()) {
                   $_SESSION['STATUS'] = "SUCCESS";
                    header('Location: ../index.php');
                } else {
                    echo "Error updating data.";
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            echo "No file uploaded.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
