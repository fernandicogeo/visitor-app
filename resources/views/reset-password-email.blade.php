<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <p>Hai, {{ $user->name }}!</p>
    
    <p>Kami menerima permintaan untuk mereset kata sandi akun Anda.</p>
    
    <p>Password baru Anda: {{ $token }}</p>
    
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
    
    <p>Terima kasih!</p>
</body>
</html>