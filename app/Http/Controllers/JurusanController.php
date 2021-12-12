<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(Jurusan $jurusan)
    {
        return view('admin/jurusan/jurusan', [
            'jurusan'   => Jurusan::latest()->paginate(4),
        ]);
    }

    public function create()
    {
        return view('admin/jurusan/tambahjurusan');
    }

    public function store(Request $request)
    {
        $request->validate( [
            'nama_jurusan'  => 'required|max:3',
        ]);

        $data = $request->all();

        Jurusan::create($data);

        return redirect('/admin/jurusan')->with('success', 'Data created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Jurusan $jurusan)
    {
        return view('/admin/jurusan/editjurusan', [
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, Jurusan $jurusan)
    {           
        $request->validate( [
            'nama_jurusan'  => 'required|max:3',
        ]);
        
        $jurusan->update($request->all());

        return redirect('/admin/jurusan')->with('warning', 'Data has been updated!');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect('/admin/jurusan')->with('error', 'Data has been deleted!');
    }
}
