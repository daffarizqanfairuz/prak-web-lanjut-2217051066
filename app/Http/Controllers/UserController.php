<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas ();
    }

    public function index(){

        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create(){

       $kelasModel = new Kelas();

       $kelas = $this->kelasModel->getKelas();

       $data = [
        'title' => 'Create User',
        'kelas' => $kelas,
       ];

       return view('create_user', $data);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'npm.required' => 'NPM wajib diisi.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
        ]);
        

        $this->userModel->create($validatedData);


        return redirect()->to('/user');
    }
}
