<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('Verifikasi Data', 'Verifikasi Data') }}</title>

  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Favicon -->
  <link href="{{ asset('img/hexa.png') }}" rel="icon" type="image/png">
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <style>
    body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 1rem;
    width: 11%;
    margin-top: -3%;
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
  </style>
</head>
<body>
  <div class="container contact-form rounded-lg">
    <div class="contact-image">
        <img src="{{ asset('img/ibad-logo.png') }}" alt="Logo Ibadurrahman">
    </div>
    <form method="post" action="{{ route('email.kirim2') }}" enctype="multipart/form-data">
      @csrf
        <h3 class="text-uppercase">Verifikasi Data</h3>
          <div class="row">
            <div class="col">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                  @elseif (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <div class="form-group">
                  <label for="kode">Kode Registrasi<span class="small text-danger">*</span></label>
                  <input class="form-control @error('kode') is-invalid @enderror" type="text" name="kode" placeholder="Masukkan Kode Registrasi Yang Anda Dapat Dari Email">
                  @error('kode')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama">
                  @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email Saya</label>
                  <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Pastikan Email Anda Sama Dengan Yang Sebelumnya">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="telp">No. Telp<span class="small text-danger">*</span></label>
                  <input class="form-control @error('telp') is-invalid @enderror" type="text" name="telp" placeholder="Masukkan No. Telp Anda">
                  @error('telp')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="image">Bukti Transfer</label>
                  <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </div>
    </form>
  </div>

  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
