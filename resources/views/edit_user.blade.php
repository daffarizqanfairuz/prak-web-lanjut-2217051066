@extends('layouts.app')

@section('content')

    {{-- Formulir --}}
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Input nama --}}
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}">
        @error('nama')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        {{-- Input NPM --}}
        <label for="npm">NPM:</label><br>
        <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}">
        @error('npm')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        {{-- Dropdown kelas --}}
        <label for="kelas_id">Kelas:</label><br>
        <select id="kelas_id" name="kelas_id">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" 
                    {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
        @error('kelas_id')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        {{-- Input foto --}}
        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto"><br><br>
        @if($user->foto)
        <img src="{{ asset($user->foto) }}" alt="User Photo" width="100" class="mt-2">
        @endif
        {{-- Tombol submit --}}
        <button type="submit">Submit</button>
    </form>
@endsection