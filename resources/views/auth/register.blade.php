<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Healsync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column vh-100">
        <!-- Main Content -->
        <div class="flex-grow-1 d-flex">
            <div class="row w-100 g-0 flex-grow-1">
                <!-- Right Side - Blue Gradient Background -->
                <div class="col-lg-6 d-none d-lg-block" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img src="{{ asset('img/vektor2.png') }}" alt="" class="rounded">
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-outline-light position-absolute top-0 start-0 m-3">
                        Kembali ←
                    </a>
                </div>

                <!-- Left Side - Login Form -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white">
                    <div class="w-100" style="max-width: 420px; padding: 2rem;">
                        <div class="mb-3">
                            <h1 class="fw-bold mb-2" style="font-size: 2.3rem; color: #2c3e50; line-height: 1.2;">Selamat Datang</h1>
                            <h1 class="fw-bold mb-4" style="font-size: 2.3rem; color: #2c3e50; line-height: 1.2;">di <span style="color: #667eea;">Healsync</span></h1>
                            <p class="text-muted mb-0" style="font-size: 1.1rem;">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-decoration-none" style="color: #667eea; font-weight: 500;">Masuk, yuk!</a>
                            </p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <!-- Name Input -->
                            <div class="mb-4">
                                <label for="name" class="form-label text-dark fw-medium mb-2" style="font-size: 1rem;">Nama</label>
                                <input type="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    placeholder="Masukan Nama"
                                    required 
                                    autocomplete="name" 
                                    autofocus
                                    style="background-color: #f8f9fb; border: 2px solid #e1e5e9; padding: .7rem 1.5rem; border-radius: 12px; font-size: 1rem;">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <!-- Email Input -->
                            <div class="mb-4">
                                <label for="email" class="form-label text-dark fw-medium mb-2" style="font-size: 1rem;">Email</label>
                                <input type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="Masukan Email"
                                    required 
                                    autocomplete="email" 
                                    autofocus
                                    style="background-color: #f8f9fb; border: 2px solid #e1e5e9; padding: .7rem 1.5rem; border-radius: 12px; font-size: 1rem;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="mb-4">
                                <label for="password" class="form-label text-dark fw-medium mb-2" style="font-size: 1rem;">Password</label>
                                <input type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Password"
                                    required 
                                    autocomplete="current-password"
                                    style="background-color: #f8f9fb; border: 2px solid #e1e5e9; padding: .7rem 1.5rem; border-radius: 12px; font-size: 1rem;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="mb-4">
                                <label for="password" class="form-label text-dark fw-medium mb-2" style="font-size: 1rem;">Konfirmasi Password</label>
                                <input type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Password"
                                    required 
                                    autocomplete="current-password"
                                    style="background-color: #f8f9fb; border: 2px solid #e1e5e9; padding: .5rem 1.5rem; border-radius: 12px; font-size: 1rem;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn w-100 text-white fw-medium shadow-sm" 
                                    style="background: linear-gradient(135deg, #ff6b6b, #ee5a52); border: none; padding: 1rem 2rem; border-radius: 50px; font-size: 1.1rem;">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
