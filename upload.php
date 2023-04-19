<?php
require 'session.php';
session_start();
$user_id = $_SESSION['user_id'];
$message = '';
if(isset($_POST['submit'])) {
    $file = $_FILES['file'];

    // Check if file was uploaded without errors
    if($file['error'] === UPLOAD_ERR_OK) {
        // Get file extension
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Check if file type is allowed
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'pdf') {
            // Generate unique name for file
            $name = uniqid();
            
            // Save original filename with extension
            $filename = $file['name'];
            
            // Add extension to unique name
            $name = $name . '.' . $ext;

            // Create thumbnail of the uploaded image or PDF
            if ($ext == 'pdf') {
                // If the uploaded file is a PDF, create a thumbnail from the first page of the PDF
                $thumbnail = 'thumbnalibrerias ils/' . $name . '.jpg';
                $im = new \Imagick();
                $im->readImage($file['tmp_name'] . '[0]');
                $im->setImageFormat('jpg');
                $im->thumbnailImage(200, null);
                $im->writeImage($thumbnail);
            } else {
                // If the uploaded file is an image, create a thumbnail from the image
                $thumbnail = 'thumbnails/' . $name;
                $source_image = imagecreatefromstring(file_get_contents($file['tmp_name']));
                $width = imagesx($source_image);
                $height = imagesy($source_image);
                $new_width = 200;
                $new_height = floor($height * ($new_width / $width));
                $destination_image = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($destination_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($destination_image, $thumbnail, 90);
            }

            // Move file to directory
            if(move_uploaded_file($file['tmp_name'], 'uploads/' . $name)) {
                // Save file path, filename and thumbnail path to database
                $stmt = $conn->prepare("INSERT INTO files (user_id, path, name, thumbnail) VALUES (:user_id, :path, :name, :thumbnail)");
                $stmt->execute(['user_id' => $user_id, 'path' => 'uploads/' . $name, 'name' => $filename, 'thumbnail' => $thumbnail]);
                $message = "se ha subido correctamente";
            } else {
                $message = "Error uploading file.";
            }
        } else {
            $message = "Invalid file type.";
        }
    } else {
        $message = "Error uploading file.";
    }
}
$_SESSION['message'] = $message;
header('Location:library.php');
?>
