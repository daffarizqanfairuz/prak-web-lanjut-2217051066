<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Profil</title>
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head> 
<body>
    <div class="header">
        <h1>Profil Mahasiswa</h1>
    </div>
    <div class="card">
        <div class="card-image">
        <img src="{{ $user->foto ? asset($user->foto) : asset('public/img/download.jpeg')  }}" alt="Profile Picture" class="rounded-full">

        </div>
        <div class="card-content">
            <div class="bg-gray-100 p-2 mb-2 text-center rounded-lg">
            <p>Nama: {{ $user->nama }}</p>
            <p class="mt-2 mb-2" ></p>
            <p>NPM: {{ $user->npm }}</p>
            <p class="mt-2 mb-2"></p>
            <p>Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan'}}</p>
            </div>
        </div>
    </div>
</body>
</html>