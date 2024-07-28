<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #e8f0fe;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .title {
            text-align: center;
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333333;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 5px;
            border: 1px solid #cccccc;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .page-link {
            text-align: right;
            font-size: 0.875rem;
        }

        .page-link-label {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .page-link-label:hover {
            text-decoration: underline;
        }

        .form-btn {
            padding: 0.75rem;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-btn:hover {
            background-color: #0056b3;
        }

        .sign-up-label {
            text-align: center;
            font-size: 0.875rem;
            color: #666666;
            margin-top: 1rem;
        }

        .sign-up-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .sign-up-link:hover {
            text-decoration: underline;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .social-login-button {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.75rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: box-shadow 0.3s;
            box-sizing: border-box;
        }

        .social-login-button svg {
            margin-right: 0.5rem;
        }

        .apple-login-button {
            background-color: #000000;
            color: #ffffff;
            border: none;
        }

        .google-login-button {
            background-color: #ffffff;
            color: #444444;
            border: 1px solid #cccccc;
        }

        .apple-login-button:hover,
        .google-login-button:hover {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="title">Bienvenue</h1>
        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
            <input type="email" id="email" name="email" class="input" placeholder="Adresse e-mail" required>
            <input type="password" id="password" name="password" class="input" placeholder="Mot de passe" required>
            <div class="page-link">
                <a href="#" class="page-link-label">Mot de passe oublié ?</a>
            </div>
            <button type="submit" class="form-btn">Se connecter</button>
        </form>
        <p class="sign-up-label">
            Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="sign-up-link">S'inscrire</a>
        </p>
        <div class="buttons-container">
            <div class="social-login-button apple-login-button">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" class="apple-icon" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M747.4 535.7c-.4-68.2 30.5-119.6 92.9-157.5-34.9-50-87.7-77.5-157.3-82.8-65.9-5.2-138 38.4-164.4 38.4-27.9 0-91.7-36.6-141.9-36.6C273.1 298.8 163 379.8 163 544.6c0 48.7 8.9 99 26.7 150.8 23.8 68.2 109.6 235.3 199.1 232.6 46.8-1.1 79.9-33.2 140.8-33.2 59.1 0 89.7 33.2 141.9 33.2 90.3-1.3 167.9-153.2 190.5-221.6-121.1-57.1-114.6-167.2-114.6-170.7zm-105.1-305c50.7-60.2 46.1-115 44.6-134.7-44.8 2.6-96.6 30.5-126.1 64.8-32.5 36.8-51.6 82.3-47.5 133.6 48.4 3.7 92.6-21.2 129-63.7z"></path>
                </svg>
                <span>Se connecter avec Apple</span>
            </div>
            <div class="social-login-button google-login-button">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" class="google-icon" viewBox="0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                    c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                    c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                    C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                    c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                    c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                </svg>
                <span>Se connecter avec Google</span>
            </div>
        </div>
    </div>
</body>
</html>
