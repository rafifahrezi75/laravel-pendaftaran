<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;
use App\Program;
use Illuminate\Support\Str;
use App\Mail\SendEmail;
use App\Mail\SendEmail3;
use Illuminate\Support\Facades\Mail;

use PDF;

class KirimEmailController extends Controller
{
    public function index()
    {
        $program = Program::orderBy('kode_program', 'ASC')->get();
        return view('emails.formemail', ['program' => $program]);
    }

    public function index2($code)
    {
        return view('emails.formemail2');
    }

    public function index3($id)
    {

        $pendaftar = Pendaftar::where('id', $id)->first();

        return view('emails.formemail3', compact('pendaftar'));
    }

    public function kirim(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'nama' => 'required|string',
            'telp' => [
                'required',
                'min:9',
                'max:14',
                function ($attribute, $value, $fail) {
                    if(!preg_match('/^(\+62|62|0)8[1-9][0-9]{6,9}$/', $value)) {
                        $fail('Nomor HP anda tidak valid! Pastikan awalan nomor +62, 62 atau 0');
                    }
                }
            ],
            'kode_program' => 'required|string'
        ]);

        $kode = Str::random(5);
        $status = 0;
        $image = 0;
        $foto = 0;

        $program = Program::where('kode_program', $request->kode_program)->first();

        Pendaftar::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'kode' => $kode,
            'telp' => $request->telp,
            'status' => $status,
            'image' => $image,
            'foto' => $foto,
            'program_id' => $program->id
        ]);

        // set data to send email
        $details = [
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'kode' => $kode,
            'nama_program' => $program->nama_program,
            'logo' => public_path('img/ibad-logo.png')
        ];

        Mail::to($request->email)->send(new SendEmail($details));

        return redirect()->route('email.index')->with('message', 'Pendaftaran Anda Berhasil, Cek Email Anda Sekarang !');
    }

    public function kirim2(Request $request)
    {

        $kodepenting = $request->kode;

        $pendaftar = Pendaftar::where('kode', $kodepenting)->first();

        $pendaftars = $pendaftar ? $pendaftar->kode:'';

        $status = 0;

        $this->validate($request, [
            'email'     => 'required',
            'nama'     => 'required',
            'kode' => 'required',
            'telp' => 'required',
        ]);

        if($pendaftars == $kodepenting)
        {

            $image = $request->file('image');
            $image->storeAs('public/assets', $image->hashName());

            Pendaftar::where('kode', $kodepenting)->update([
                'email' => $request->email,
                'kode' => $kodepenting,
                'telp' => $request->telp,
                'status' => $status,
                'image' => $image->hashName(),
            ]);

            return redirect()->route('email.index2')->with('message', 'Verifikasi anda berhasil, tunggu pemberitahuan yang akan dikirim melalui Email anda !');
        } else{
            return redirect()->route('email.index2')->with('danger', 'No. Registrasi anda tidak valid, pastikan No. Registrasi anda sama dengan yang ada di Email !');
        }

    }

    public function kirim3(Request $request)
    {

        $this->validate($request, [
            'foto' => 'required',
            'nik' => 'required|min:16',
            'nisn' => 'required|min:10',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'alamat' => 'required',
            'jeniskelamin' => 'required',
            'agama' => 'required',
            'sekolahasal' => 'required',
        ]);

        $image = $request->file('foto');
        $image->storeAs('public/assets', $image->hashName());

        Pendaftar::where('id', $request->id)->update([
            'foto' => $image->hashName(),
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'sekolahasal' => $request->sekolahasal,
        ]);

        $details = [
            'foto' => $request->foto,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'tempatlahir' => $request->tempatlahir,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'email' => $request->email,
            'telp' => $request->telp,
            'sekolahasal' => $request->sekolahasal,
        ];


        // $pdf = PDF::loadview('emails.mailtemplate3');

        // return $pdf->download('pendaftaran.pdf');

        Mail::to($request->email)->send(new SendEmail3($details));

        return redirect()->route('email.index3',$request->id)->with('message', 'Pengisian Data Lengkap Peserta Didik Baru Anda Berhasil, Cek Email Anda !');

    }
}
