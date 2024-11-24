<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Klinik</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121212; 
            color: #e0e0e0; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            width: 90%;
            background-color: #1e1e1e; 
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
        }
        h1 {
            text-align: center;
            color: #4caf50; 
            margin-bottom: 30px;
        }
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #bdbdbd; 
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #333;
            background-color: #2b2b2b;
            color: #e0e0e0;
            font-size: 14px;
            margin-bottom: 20px;
            outline: none;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #4caf50;
        }
        button {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #388e3c;
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px 20px;
            }
            input, select, button {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pendaftaran Klinik Kita</h1>
        <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data">
            <label for="name">Nama Lengkap :</label>
            <input type="text" id="name" name="name" required minlength="3" maxlength="50" placeholder="Masukkan nama lengkap Anda">

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan email aktif">

            <label for="password">Password :</label>
            <input type="password" id="password" name="password" required minlength="6" placeholder="Buat password">

            <label for="age">Umur :</label>
            <input type="number" id="age" name="age" required min="18" max="100" placeholder="Masukkan umur Anda">

            <label for="gender">Jenis Kelamin :</label>
            <select id="gender" name="gender" required>
                <option value="">pilih...</option>
                <option value="male">Laki-laki</option>
                <option value="female">Perempuan</option>
            </select>

            <label for="textFile">Upload File (Hanya txt) :</label>
            <input type="file" id="textFile" name="textFile" accept=".txt" required>

            <button type="submit">Daftar</button>
        </form>
    </div>

    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            const fileInput = document.getElementById("textFile");
            const file = fileInput.files[0];

            if (file) {
                const maxSize = 5024 * 5024; // 1 MB
                if (file.size > maxSize) {
                    alert("Ukuran file tidak boleh lebih dari 5 MB!");
                    event.preventDefault();
                }
            }
        });
    </script>
</body>
</html>
