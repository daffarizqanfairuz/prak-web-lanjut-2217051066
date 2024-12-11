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
            <td>
                <!-- View -->
                <a href="{{ route('user.profile', $user->id) }}" class ="text-blue-500 hover:text-blue-700 font-semibold">Lihat</a>
                <!-- Edit -->
                <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                <!-- Delete -->
                <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

@endsection