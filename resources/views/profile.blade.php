<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center; /* Pusatkan konten secara horizontal */
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-pic img {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Membuat gambar menjadi lingkaran */
            object-fit: cover;
            margin-bottom: 20px;
        }

        .info-box {
            display: flex;
            flex-direction: column;
            align-items: center; /* Pusatkan box input */
            gap: 10px;
        }

        input {
            width: 200px;
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="profile-pic">
            <img src="{{ asset('img/IMG_20220410_092200.jpg') }}" alt="Foto Profil">
        </div>
        <div class="info-box">
            <div class="box">
                <input type="text" id= nama value= <?= $nama ?> readonly>
            </div>
            <div class="box">
                <input type="text" id= kelas value= <?= $kelas ?> readonly>
            </div>
            <div class="box">
                <input type="text" id= npm value= <?= $npm ?> readonly>
            </div>
        </div>
    </div>
</body>
</html>