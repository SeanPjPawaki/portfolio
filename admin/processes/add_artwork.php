<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../includes/conn.php');
    $workName = $_POST['workName'];
    $workDescription = $_POST['workDescription'];
    $targetDir = "../external/uploads/"; 
    $targetFile = $targetDir . basename($_FILES["workPicture"]["name"]); 
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); 
    $file = basename($_FILES["workPicture"]["name"]);
    $check = getimagesize($_FILES["workPicture"]["tmp_name"]);
    if ($check !== false) {
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["workPicture"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO artworks (name, picture, description) VALUES (:name, :picture, :description)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $workName);
            $stmt->bindParam(':picture', $file);
            $stmt->bindParam(':description', $workDescription);
            $stmt->execute();
            $_SESSION['STATUS'] = "UPLOAD_SUCCESS";
            header("Location: ../index.php");
            echo "The file " . htmlspecialchars(basename($_FILES["workPicture"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
}
?>