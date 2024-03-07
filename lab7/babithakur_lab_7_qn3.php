<?php
// Define variables and initialize with empty values
$imageErr = "";
$uploadedImagePath = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowedTypes = ['image/png', 'image/jpeg'];
        $maxFileSize = 1024 * 1024; // 1 MB

        // Check file type
        if (in_array($_FILES["image"]["type"], $allowedTypes)) {
            // Check file size
            if ($_FILES["image"]["size"] < $maxFileSize) {
                // Upload directory
                $uploadDir = "uploads/";

                // Generate unique filename
                $filename = uniqid() . '_' . $_FILES["image"]["name"];

                // Move the file to the upload directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadDir . $filename)) {
                    $uploadedImagePath = $uploadDir . $filename;
                } else {
                    $imageErr = "Error uploading image.";
                }
            } else {
                $imageErr = "Image file size exceeds 1 MB limit.";
            }
        } else {
            $imageErr = "Invalid image file format. Only PNG and JPEG files are allowed.";
        }
    } else {
        $imageErr = "No image file uploaded or an error occurred during upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload and Display</title>
</head>
<body>
    <h2>Upload Image</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="image">Select Image (PNG/JPEG, max 1 MB):</label><br>
        <input type="file" id="image" name="image" accept="image/png, image/jpeg"><br><br>
        <input type="submit" value="Upload">
    </form>

    <?php if (!empty($uploadedImagePath)): ?>
    <h2>Uploaded Image</h2>
    <img src="<?php echo $uploadedImagePath; ?>" alt="Uploaded Image">
    <?php endif; ?>

    <?php if (!empty($imageErr)): ?>
    <p><?php echo $imageErr; ?></p>
    <?php endif; ?>
</body>
</html>

