<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('Pendaftaran', 'Pendaftaran') }}</title>
</head>
<body>
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td class="esd-email-paddings" valign="top">
                <table class="es-content esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td class="esd-stripe" align="center">
                            <table class="es-content-body" style="background-color: #ffffff;" width="560" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                <tbody>
                                    <tr>
                                        <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="es-m-p0r es-m-p20b esd-container-frame" width="520" valign="top" align="center">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" class="esd-block-image es-p20t es-p20r es-m-p0r" style="font-size: 0px;">
                                                                    {{-- <img src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img,w_453/https://hexaintegra.com/wp-content/uploads/2020/12/logo_hexa.png" alt="hexa" style="display: block;" title="hexa" height="70"> --}}
                                                                    <img src="{{ $details['logo'] }}" alt="hexa" style="display: block;" title="hexa" height="70">
                                                                </td>
                                                            </tr>
                                                            <br>
                                                            <tr>
                                                                <td class="esd-block-text es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                    {{-- <h1 style="text-transform: uppercase;">Assalamualaikum Warahmatullahi Wabarakaatuh. <br>
                                                                    Halo, Aisyah</h1> --}}
                                                                    <h2>Assalamualaikum Warahmatullahi Wabarakaatuh. <br>
                                                                    Halo, {{ $details['nama'] }}</h2>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="esd-block-text es-p20t es-p10b">
                                                                    {{-- <p>Hallo <b class="uppercase">{{ '-' }}</b><br><br></p> --}}
                                                                    {{-- <p>Berikut ini adalah data dan Kode regsitrasi Anda:<br><br></p> --}}
                                                                    <p>Terimakasih sudah melakukan pendaftaran di PKBM Ibadurrahman. Berikut data Pendaftar :<br><br></p>
                                                                    <table>
                                                                    <tr>
                                                                        <td><b>Nama</b></td>
                                                                        <td>:</td>
                                                                        <td>{{$details['nama']}}</td>
                                                                    </tr>
                                                                    {{-- <tr>
                                                                        <td><b>Kode Registrasi</b></td>
                                                                        <td>:</td>
                                                                        <td>{{ '-' }}</td>
                                                                    </tr> --}}
                                                                    <tr>
                                                                        <td><b>No. Telp</b></td>
                                                                        <td>:</td>
                                                                        <td>{{ $details['telp'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Email</b></td>
                                                                        <td>:</td>
                                                                        <td>{{ $details['email'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Program</b></td>
                                                                        <td>:</td>
                                                                        <td>{{ $details['nama_program'] }}</td>
                                                                    </tr>
                                                                    </table>
                                                                    <br>
                                                                    <p>Untuk melanjutkan pendaftaran, akan dikenakan biaya sebesar Rp 100.000 sebagai biaya pembelian formulir. Pembayaran dapat ditransferkan ke rekening berikut: <br><br>

                                                                    BSI : <br>
                                                                    <b>PKBM Ibadurrahman - 1234567xxx</b> <br><br>

                                                                    Simpan bukti transfer dan unggah bukti transfer dengan menekan tombol dibawah ini.<br><br></p>
                                                                    <a href="{{ route('email.index2', $details['kode']) }}">
                                                                        <button  style="width: 211.09px;
                                                                                        height: 40.55px;
                                                                                        border-radius: 5px;
                                                                                        padding: 10px;
                                                                                        color: #fff;
                                                                                        background: #007365;
                                                                                        border: none;
                                                                                        cursor: pointer;"> Unggah Bukti Transfer
                                                                        </button>
                                                                    </a>
                                                                    <br><br>
                                                                    <p>Apabila tombol diatas tidak berfungsi dengan baik, silahkan klik link dibawah ini atau copy paste di laman anda. <br>
                                                                    https://peserta.pkbmibadurrahman.sch.id/payment/10040703230001<br><br></p>
                                                                    <p>Berikut link informasi mengenai proses pendaftaran PPDB santri / wati: <br>
                                                                    https://peserta.pkbmibadurrahman.sch.id/progress/10040703230001<br><br></p>
                                                                    <p>Salam Hangat, <br>
                                                                        Pengelola PKBM Ibadurrahman</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
</body>
</html>
