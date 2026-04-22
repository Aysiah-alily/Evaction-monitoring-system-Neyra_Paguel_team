<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDRRMO - Evacuation Admin Login</title>
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
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
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
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .login-brand-icon svg { width: 48px; height: 48px; stroke: white; stroke-width: 2; fill: none; }
        .login-brand-title { font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; }
        .login-brand-subtitle { font-size: 0.9rem; color: #fed7aa; margin-bottom: 2rem; line-height: 1.6; }
        .login-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: #fef3c7;
            padding: 0.5rem 1rem;
            border-radius: 24px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
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
            border-color: #ea580c;
            box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.1);
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
            accent-color: #ea580c;
        }
        .form-checkbox label { cursor: pointer; color: #374151; font-size: 0.9rem; }
        .form-button {
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(234, 88, 12, 0.3);
            margin-bottom: 1rem;
        }
        .form-button:hover { transform: translateY(-2px); box-shadow: 0 6px 12px rgba(234, 88, 12, 0.4); }
        .form-button:active { transform: translateY(0); }
        .form-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
        }
        .form-link { color: #ea580c; text-decoration: none; font-weight: 500; }
        .form-link:hover { text-decoration: underline; }
        .back-link { display: flex; align-items: center; gap: 0.5rem; }
        .error-message {
            background: #ffedd5;
            color: #92400e;
            padding: 0.875rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid #ea580c;
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
            <div class="login-badge">🚨 EVACUATION ADMIN ACCESS</div>
            <div class="login-brand-icon">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
            </div>
            <h2 class="login-brand-title">Emergency Response</h2>
            <p class="login-brand-subtitle">Real-time Evacuation Center Management System</p>
            <p style="font-size: 0.8rem; color: #fed7aa; margin-top: 1rem;">
                For authorized evacuation response teams
            </p>
        </div>

        <!-- Login Form Section -->
        <div class="login-form">
            <div class="form-header">
                <h3 class="form-title">Evacuation Admin Login</h3>
                <p class="form-subtitle">Access evacuation center operations dashboard</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="error-message">
                    <strong>Login Failed!</strong><br>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="role" value="evacuation_admin">

                <div class="form-group">
                    <label class="form-label">📧 Email Address</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus class="form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="you@example.com">
                </div>

                <div class="form-group">
                    <label class="form-label">🔑 Password</label>
                    <input type="password" name="password" required class="form-input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password">
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label for="remember">Remember me on this device</label>
                </div>

                <button type="submit" class="form-button">Sign In as Evacuation Admin</button>

                <div class="form-links">
                    <a href="<?php echo e(route('welcome')); ?>" class="form-link back-link">
                        ← Back to Role Selection
                    </a>
                    <a href="#" class="form-link">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\proto\Prototype_compy - Copy - Copy\resources\views/auth/login-evacuation.blade.php ENDPATH**/ ?>