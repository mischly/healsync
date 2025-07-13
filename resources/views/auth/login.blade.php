<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Healsync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo1-white.png') }}?v=1">
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

                <!-- Left Side - Login Form -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white">
                    <div class="w-100" style="max-width: 420px; padding: 2rem;">
                        <div class="mb-5">
                            <h1 class="fw-bold mb-2" style="font-size: 2.5rem; color: #2c3e50; line-height: 1.2;">Selamat Datang Kembali</h1>
                            <h1 class="fw-bold mb-4" style="font-size: 2.5rem; color: #2c3e50; line-height: 1.2;">di <span style="color: #667eea;">Healsync</span></h1>
                            <p class="text-muted mb-0" style="font-size: 1.1rem;">
                                Belum punya Akun?
                                <a href="{{ route('register') }}" class="text-decoration-none" style="color: #667eea; font-weight: 500;">Daftar, Yuk!</a>
                            </p>

                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
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
                                    style="background-color: #f8f9fb; border: 2px solid #e1e5e9; padding: 1rem 1.25rem; border-radius: 12px; font-size: 1rem;">
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
                                    placeholder="Masukan Password"
                                    required 
                                    autocomplete="current-password"
                                    style="background-color: #f8f9fb; border: 2px solid #e1e5e9; padding: 1rem 1.25rem; border-radius: 12px; font-size: 1rem;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="border: 2px solid #dee2e6;">
                                    <label class="form-check-label text-muted" for="remember" style="font-size: 0.95rem;">
                                        Ingat saya
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}" style="color: #667eea; font-weight: 500; font-size: 0.95rem;">
                                        Lupa Password?
                                    </a>
                                @endif
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn w-100 text-white fw-medium shadow-sm" 
                                    style="background: linear-gradient(135deg, #ff6b6b, #ee5a52); border: none; padding: 1rem 2rem; border-radius: 50px; font-size: 1.1rem;">
                                Masuk
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Side - Blue Gradient Background -->
            <div class="col-lg-6 d-none d-lg-block" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img src="{{ asset('img/vektor2.png') }}" alt="" class="rounded">
                </div>
                <a href="{{ url('/') }}" class="btn btn-outline-light position-absolute top-0 end-0 m-3">
                    Kembali →
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
