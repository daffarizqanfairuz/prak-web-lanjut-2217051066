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

    public function profile($id){
        $user = UserModel::with('kelas')->findOrFail($id);

        return view('profile', [
            'title' => 'Profile',
            'user' => $user,
        ]);
    }

    public function show($id){
        $user = $this->userModel->getUsers($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
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
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->move('upload/img', uniqid() . '.' . $foto->getClientOriginalExtension());
        } else {
            $fotoPath = null;
        }
        
        $user = UserModel::create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id'],
            'foto' => $fotoPath
        ]);        

        return redirect()->route('user.profile', ['id' => $user->id]);
    }

    public function edit($id){

        $user = UserModel::with('kelas')->findOrFail($id);

        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));

    }

    public function update(Request $request, $id){

        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('Foto')){
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $user->foto = 'uploads/' . $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User berhasil di update');

    }

    public function destroy($id){

        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User berhasil di delete');

    }

}
