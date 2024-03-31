<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{

    public function index(Request $request){
        $kunci = $request->kunci;
        $kolom = 6;
        if(strlen($kunci)){
            $data = buku::where('name', 'like', "%$kunci%")
                ->orWhere('slug', 'like', "%$kunci%")
                ->orWhere('author', 'like', "%$kunci%")
                ->paginate($kolom);
        } else {
            $data = buku::all();
        }
        return view('managingBooks.books', [
            "data" => $data
        ]);
    }

    public function create()
    {
        $data = genre::all();
        return view('managingBooks.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('slug', $request->slug);
        Session::flash('genre', $request->genre);
        Session::flash('author', $request->author);
        Session::flash('sinopsis', $request->sinopsis);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'genre' => 'required',
            'author' => 'required',
            'sinopsis' => 'required'
        ],[
            'name.required' => 'Nama wajib diisi',
            'slug.required' => 'slug wajib diisi',
            'genre.required' => 'genre wajib diisi',
            'author.required' => 'author wajib diisi',
            'sinopsis.required' => 'sinopsis wajib diisi'
        ]

        );

        $data = [
            'name' =>$request->name,
            'slug' =>$request->slug,
            'genre_id' =>$request->genre,
            'author' =>$request->author,
            'sinopsis' =>$request->sinopsis
        ];

        buku::create($data);
        return redirect()->To('books')->with('Success', 'Data Added');
    }

    public function show($id){

    }

    public function edit($id){
        $data = buku::where('id', $id)->first();
        $data2 = genre::all();
        return view('managingBooks.edit', [
            "data" => $data,
            "data2" => $data2
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'genre' => 'required',
            'author' => 'required',
            'sinopsis' => 'required'
        ],[
            'name.required' => 'Nama wajib diisi',
            'slug.required' => 'slug wajib diisi',
            'genre.required' => 'genre wajib diisi',
            'author.required' => 'author wajib diisi',
            'sinopsis.required' => 'sinopsis wajib diisi'
        ]);

        $data = [
            'name' =>$request->name,
            'slug' =>$request->slug,
            'genre_id' =>$request->genre,
            'author' =>$request->author,
            'sinopsis' =>$request->sinopsis
        ];

        buku::where('id', $id)->update($data);
        return redirect()->to('books')->with('Success', 'Data Updated');
    }

    public function destroy($id){
        buku::where('id', $id)->delete();
        return redirect()->to('books')->with('Success', 'Data Deleted');
    }


}
