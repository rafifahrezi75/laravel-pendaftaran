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
                                                                <td align="center" class="esd-block-image es-p20t es-p20r es-m-p0r" style="font-size: 0px;"><img src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img,w_453/https://hexaintegra.com/wp-content/uploads/2020/12/logo_hexa.png" alt="hexa" style="display: block;" title="hexa" height="70"></td>
                                                            </tr>
                                                            <br>
                                                            <tr>
                                                                <td align="center" class="esd-block-text es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                    <h1 style="text-transform: uppercase;">Pendaftaran</h1>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="esd-block-text es-p20t es-p10b">
                                                                    <p>Hallo <b class="uppercase">{{$details['nama']}}</b>.<br></p>
                                                                    <p>Pengisian data lengkap peserta didik baru berhasil !<br></p>
                                                                        Berikut adalah data diri anda : <br>
                                                                        <table>
                                                                            <tr>
                                                                                <td><b>Nama</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['nama']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Foto</b></td>
                                                                                <td>:</td>
                                                                                <td><img height="100px" width="100px" src="{{ asset('storage/assets/'.$details['foto']) }}" alt=""></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>NIK</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['nik']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>NISN</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['nik']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Tempat Lahir</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['tempatlahir']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Alamat</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['alamat']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Jenis Kelamin</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['jeniskelamin']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Agama</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['agama']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Alamat Email</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['email']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>No. Telp</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['telp']}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Sekolah Asal</b></td>
                                                                                <td>:</td>
                                                                                <td>{{$details['sekolahasal']}}</td>
                                                                            </tr>
                                                                        </table>
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