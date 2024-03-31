<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GenreController extends Controller
{
    public function index(Request $request){
        $kunci = $request->kunci;
        $kolom = 2;
        if(strlen($kunci)){
            $data = genre::where('id', 'like', "%$kunci%")
                ->orWhere('name', 'like', "%$kunci%")
                ->paginate($kolom);
        } else {
            $data = genre::all();
        }
        return view('managingGenre.genre', [
            "data" => $data
        ]);
    }

    public function create()
    {
        return view('managingGenre.create');
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);

        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Nama wajib diisi',
        ]

        );

        $data = [
            'name' =>$request->name,
        ];

        genre::create($data);
        return redirect()->To('genre')->with('Success', 'Data Added');
    }

    public function show($id){

    }

    public function edit($id){
        $data = genre::where('id', $id)->first();
        return view('managingGenre.edit')->with('data', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Nama wajib diisi',
        ]);

        $data = [
            'name' =>$request->name,
        ];

        genre::where('id', $id)->update($data);
        return redirect()->to('genre')->with('Success', 'Data Updated');
    }

    public function destroy($id){
        genre::where('id', $id)->delete();
        return redirect()->to('genre')->with('Success', 'Data Deleted');
    }
}
