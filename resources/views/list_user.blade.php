@extends('layouts.app')
@section ('content')

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
    ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['npm'] ?></td>
            <td><?= $user['nama_kelas'] ?></td>
            <td><a href="{{ route('user.profile', $user->id) }}" class ="text-blue-500 hover:text-blue-700 font-semibold">Lihat</a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

@endsection