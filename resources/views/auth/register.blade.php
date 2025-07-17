<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Healsync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo1-white.png') }}?v=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        input {
            padding: 14px 18px;
            font-size: 16px;
            border-radius: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        input::placeholder {
            font-size: 14px;
        }
        .custom-input {
            background-color: #f8f9fb;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 16px;
        }
        form {
            gap: 20px;
        }        
    </style>
</head>
<body>
    <div class="d-flex flex-column vh-100">
        <div class="flex-grow-1 d-flex">
            <div class="row w-100 g-0 flex-grow-1">
                <div class="col-lg-6 d-none d-lg-block" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img src="{{ asset('img/register.svg') }}" alt="" class="rounded" style="width: 434px; height: 275px;">
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-outline-light position-absolute top-0 start-0 m-3">Kembali ←</a>
                </div>

                <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white">
                    <div class="w-100" style="max-width: 620px; padding: 2rem;">
                        <div class="mb-3">
                            <h1 class="fw-bold mb-2" style="font-size: 2.3rem; color: #2c3e50; line-height: 1.2;">Selamat Datang</h1>
                            <h1 class="fw-bold mb-4" style="font-size: 2.3rem; color: #2c3e50; line-height: 1.2;">di <span style="color: #667eea;">Healsync</span></h1>
                            <p class="text-muted mb-0" style="font-size: 1.1rem;">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-decoration-none" style="color: #667eea; font-weight: 500;">Masuk, yuk!</a>
                            </p>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label text-dark fw-medium mb-1">Nama</label>
                                        <input type="text" class="form-control custom-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukan Nama" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="username" class="form-label text-dark fw-medium mb-1">Username</label>
                                        <input type="text" class="form-control custom-input @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Masukan Username" required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="email" class="form-label text-dark fw-medium mb-1">Email</label>
                                        <input type="email" class="form-control custom-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukan Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label for="phone" class="form-label text-dark fw-medium mb-1">No. Telepon</label>
                                        <input type="text" class="form-control custom-input @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Masukan Nomor Telepon" required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="password" class="form-label text-dark fw-medium mb-1">Password</label>
                                        <input type="password" class="form-control custom-input @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="password_confirmation" class="form-label text-dark fw-medium mb-1">Konfirmasi Password</label>
                                        <input type="password" class="form-control custom-input @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn w-100 text-white fw-medium shadow-sm" style="background: linear-gradient(135deg, #ff6b6b, #ee5a52); border: none; padding: .9rem 2rem; border-radius: 50px; font-size: 1rem;">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
