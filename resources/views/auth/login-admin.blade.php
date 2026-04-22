<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDRRMO - Administrator Login</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Instrument Sans', system-ui, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .login-brand {
            background: linear-gradient(135deg, #091236 0%, rgba(4, 12, 53, 0.67) 100%);
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .login-brand-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
        }
        .login-brand-icon svg { width: 48px; height: 48px; fill: white; }
        .login-brand-title { font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; }
        .login-brand-subtitle { font-size: 0.9rem; color: #fee2e2; margin-bottom: 2rem; line-height: 1.6; }
        .login-badge {
            display: inline-block;
            background: rgba(220, 38, 38, 0.2);
            color: #fecaca;
            padding: 0.5rem 1rem;
            border-radius: 24px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(220, 38, 38, 0.3);
        }
        .login-form {
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-header { margin-bottom: 2rem; }
        .form-title { font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem; }
        .form-subtitle { color: #6b7280; font-size: 0.9rem; }
        .form-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
        }
        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .form-input {
            padding: 0.875rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            font-family: inherit;
        }
        .form-input:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }
        .form-input::placeholder { color: #9ca3af; }
        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        .form-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #dc2626;
        }
        .form-checkbox label { cursor: pointer; color: #374151; font-size: 0.9rem; }
        .form-button {
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(220, 38, 38, 0.3);
            margin-bottom: 1rem;
        }
        .form-button:hover { transform: translateY(-2px); box-shadow: 0 6px 12px rgba(220, 38, 38, 0.4); }
        .form-button:active { transform: translateY(0); }
        .form-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
        }
        .form-link { color: #dc2626; text-decoration: none; font-weight: 500; }
        .form-link:hover { text-decoration: underline; }
        .back-link { display: flex; align-items: center; gap: 0.5rem; }
        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 0.875rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid #dc2626;
        }
        @media (max-width: 768px) {
            .login-container { grid-template-columns: 1fr; }
            .login-brand { padding: 2rem; }
            .login-form { padding: 2rem; }
            .login-brand-icon { width: 60px; height: 60px; }
            .login-brand-icon svg { width: 36px; height: 36px; }
            .login-brand-title { font-size: 1.25rem; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Brand Section -->
        <div class="login-brand">
            <div class="login-badge">🔐 ADMINISTRATOR ACCESS</div>
            <div class="login-brand-icon">
                <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
            </div>
            <h2 class="login-brand-title">MDRRMO System</h2>
            <p class="login-brand-subtitle">Camalaniugan Municipality Disaster Risk Reduction & Management Office</p>
            <p style="font-size: 0.8rem; color: #cbd5e1; margin-top: 1rem;">
                Secure access for system administrators only
            </p>
        </div>

        <!-- Login Form Section -->
        <div class="login-form">
            <div class="form-header">
                <h3 class="form-title">Administrator Login</h3>
                <p class="form-subtitle">Sign in to your admin account to manage the system</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <strong>Login Failed!</strong><br>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="role" value="admin">

                <div class="form-group">
                    <label class="form-label">📧 Email Address</label>
                    <input type="email" class="form-input @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" placeholder="admin@mdrrmo.gov.ph" required>
                </div>

                <div class="form-group">
                    <label class="form-label">🔑 Password</label>
                    <input type="password" class="form-input @error('password') is-invalid @enderror" 
                           name="password" placeholder="Enter your password" required>
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember me on this device</label>
                </div>

                <button type="submit" class="form-button">Sign In as Administrator</button>

                <div class="form-links">
                    <a href="{{ route('welcome') }}" class="form-link back-link">
                        ← Back to Role Selection
                    </a>
                    <a href="#" class="form-link">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>