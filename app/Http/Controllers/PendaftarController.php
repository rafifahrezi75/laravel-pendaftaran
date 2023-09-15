<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use Illuminate\Http\Request;
use App\Mail\SendEmail2;
use Illuminate\Support\Facades\Mail;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftars = Pendaftar::orderBy('status', 'asc')->paginate(10);

        return view('pendaftar.list', [
            'title' => 'Pendaftar',
            'pendaftars' => $pendaftars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(pendaftar $pendaftar)
    {
        return view('pendaftar.edit', [
            'title' => 'Edit Pendaftar',
            'pendaftar' => $pendaftar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(pendaftar $pendaftar)
    {
        return view('pendaftar.detail', [
            'title' => 'Detail Pendaftar',
            'pendaftar' => $pendaftar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pendaftar $pendaftar)
    {

        $this->validate($request, [
            'nik' => 'required|min:16',
            'nisn' => 'required|min:10',
            'nama' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'alamat' => 'required',
            'jeniskelamin' => 'required',
            'agama' => 'required',
            'email'     => 'required',
            'kode' => 'required',
            'telp' => 'required',
            'status' => 'required',
            'sekolahasal' => 'required',
        ]);

        $pendaftar->update([
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'email' => $request->email,
            'kode' => $request->kode,
            'telp' => $request->telp,
            'status' => $request->status,
            'sekolahasal' => $request->sekolahasal,
        ]);

        return redirect()->route('pendaftar.index')->with('message', 'Pendaftar Berhasil Diupdate!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftar = Pendaftar::where('id', $id)->first();

        $details = [
            'id' => $pendaftar->id,
            'nama' => $pendaftar->nama,
            'kode' => $pendaftar->kode
        ];

        if ($pendaftar->status == 0) {
            $status = 1;
            Mail::to($pendaftar->email)->send(new SendEmail2($details));

        } else {
            $status = 0;
        }

        $pendaftar = Pendaftar::where('id', $id)->update(['status'=>$status]);

        return redirect()->route('pendaftar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendaftar $pendaftar)
    {
        $pendaftar->delete();

        return redirect()->route('pendaftar.index')->with('message', 'Pendaftar Berhasil Dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        $pendaftars = Pendaftar::orderBy('status', 'asc')
        ->where('pendaftars.nama', 'LIKE', '%' . $query . '%')
        ->paginate(10);

        return view('pendaftar.list', [
            'title' => 'Pendaftar',
            'pendaftars'=> $pendaftars,
            'query'=> $query
        ]);
    }

    public function select(Request $request)
    {

        $status = $request->status;

        $pendaftars = Pendaftar::orderBy('status', 'asc')
        ->where('pendaftars.status', $status)
        ->paginate(10);

        return view('pendaftar.list', [
            'title' => 'Pendaftar',
            'pendaftars'=> $pendaftars
        ]);
    }
}
