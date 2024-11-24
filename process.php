<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $age = $_POST['age'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $file = $_FILES['textFile'] ?? null;

    $errors = [];
    $fileContent = '';

    if (strlen($name) < 3 || strlen($name) > 50) {
        $errors[] = "Nama harus memiliki panjang antara 3-50 karakter.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password harus memiliki minimal 6 karakter.";
    }

    if ($file) {
        $allowedTypes = ['text/plain'];
        if (!in_array($file['type'], $allowedTypes)) {
            $errors[] = "File yang diunggah harus berupa file teks.";
        }
        if ($file['size'] > 5024 * 5024) {
            $errors[] = "Ukuran file tidak boleh lebih dari 5 MB.";
        }

        if (empty($errors)) {
            $fileContent = file_get_contents($file['tmp_name']);
        }
    }

    if (!empty($errors)) {
        echo "<h3>Terjadi Kesalahan:</h3>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        exit;
    }

    session_start();
    $_SESSION['formData'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'gender' => $gender,
        'fileContent' => $fileContent
    ];

    header("Location: result.php");
    exit;
}
?>
