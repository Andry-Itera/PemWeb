<?php
session_start();
if (!isset($_SESSION['formData'])) {
    echo "Tidak ada data untuk ditampilkan.";
    exit;
}

$data = $_SESSION['formData'];
$browser = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121212; 
            color: #e0e0e0; 
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 800px;
            background-color: #1e1e1e; 
            border-radius: 12px;
            padding: 20px 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }
        h1 {
            text-align: center;
            color: #4caf50; 
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #2b2b2b; 
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        th, td {
            padding: 15px;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid #333; 
        }
        th {
            background-color: #4caf50; 
            color: white;
            text-transform: uppercase;
        }
        td {
            color: #e0e0e0; 
        }
        tr:hover {
            background-color: #383838; 
        }
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            margin: 0;
            font-family: 'Courier New', monospace;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        .btn:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Hasil Pendaftaran</h1>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <td><?= htmlspecialchars($data['name']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?= htmlspecialchars($data['age']); ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= htmlspecialchars($data['gender']); ?></td>
            </tr>
            <tr>
                <th>Isi File</th>
                <td><pre><?= htmlspecialchars($data['fileContent']); ?></pre></td>
            </tr>
            <tr>
                <th>Browser/OS</th>
                <td><?= htmlspecialchars($browser); ?></td>
            </tr>
        </table>
        <a href="form.php" class="btn">Kembali ke Form</a>
    </div>
</body>
</html>
