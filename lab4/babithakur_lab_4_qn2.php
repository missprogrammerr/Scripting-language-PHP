<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0) {
        $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $maxFileSize = 1024 * 1024; // 1 MB

        // Check file type
        if (in_array($_FILES["cv"]["type"], $allowedTypes)) {
            // Check file size
            if ($_FILES["cv"]["size"] < $maxFileSize) {
                // Upload directory
                $uploadDir = "uploads/";

                // Generate unique filename
                $filename = uniqid() . '_' . $_FILES["cv"]["name"];

                // Move the file to the upload directory
                if (move_uploaded_file($_FILES["cv"]["tmp_name"], $uploadDir . $filename)) {
                    echo "CV uploaded successfully.";
                } else {
                    echo "Error uploading CV.";
                }
            } else {
                echo "CV file size exceeds 1 MB limit.";
            }
        } else {
            echo "Invalid CV file format. Only PDF and DOC/DOCX files are allowed.";
        }
    } else {
        echo "No CV file uploaded or an error occurred during upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CV</title>
</head>
<body>
    <h2>Upload your CV</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="cv">Select CV (PDF/DOC/DOCX, max 1 MB):</label><br>
        <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx"><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

