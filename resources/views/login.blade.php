<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#0d6efd,#1e90ff);
    font-family: Arial, sans-serif;
    overflow:hidden;
}

/* GARIS ANIMASI */
.lines{
    position:absolute;
    width:100%;
    height:100%;
}

.lines span{
    position:absolute;
    width:2px;
    height:100%;
    background:rgba(255,255,255,0.15);
    animation:gerak 6s linear infinite;
}

.lines span:nth-child(1){ left:20%; }
.lines span:nth-child(2){ left:40%; animation-delay:1s;}
.lines span:nth-child(3){ left:60%; animation-delay:2s;}
.lines span:nth-child(4){ left:80%; animation-delay:3s;}

@keyframes gerak{
    0%{ transform:translateY(-100%);}
    100%{ transform:translateY(100%);}
}

/* BOX LOGIN */
.login-box{
    width:380px;
    background:white;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    z-index:1;
}

/* BUTTON LOGIN */
.btn-primary{
    background:#0d6efd;
    border:none;
}

.btn-primary:hover{
    background:#0b5ed7;
}

/* SOCIAL BUTTON */
.btn-social{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    font-weight:600;
}

/* GOOGLE STYLE */
.btn-google{
    background:#ffffff;
    color:#333;
    border:1px solid #ddd;
}

.btn-google:hover{
    background:#f5f5f5;
}

/* FACEBOOK STYLE */
.btn-facebook{
    background:#1877f2;
    color:white;
}

.btn-facebook:hover{
    background:#0d6efd;
}

/* DIVIDER */
.divider{
    text-align:center;
    margin:20px 0;
    position:relative;
}

.divider::before,
.divider::after{
    content:"";
    position:absolute;
    top:50%;
    width:40%;
    height:1px;
    background:#ccc;
}

.divider::before{ left:0; }
.divider::after{ right:0; }

.divider span{
    background:white;
    padding:0 10px;
    color:#777;
}
</style>

</head>

<body>

<!-- GARIS -->
<div class="lines">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>

<!-- LOGIN BOX -->
<div class="login-box">

    <form action="{{ route('log') }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
        </div>

        <div class="d-flex justify-content-between mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label">Remember</label>
            </div>

            <a href="#">Forgot?</a>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>

        <div class="divider">
            <span>OR</span>
        </div>

        <!-- GOOGLE -->
        <a href="#" class="btn btn-social btn-google w-100 mb-2">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" width="20">
            Login with Google
        </a>

        <!-- FACEBOOK -->
        <a href="#" class="btn btn-social btn-facebook w-100">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" width="20">
            Login with Facebook
        </a>

    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>