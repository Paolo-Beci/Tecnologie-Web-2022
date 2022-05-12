<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>FlatMate</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="LaraProject/public/css/animations.css">
    <link rel="stylesheet" href="LaraProject/public/css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="LaraProject/resources/js/menu-script.js" defer></script>
    <script src="LaraProject/resources/js/forms-script.js" defer></script>
</head>
<body>
    <header class="header-anim">
        <a class="logo" href="index.html">
            <img src="LaraProject/public/images/images/FlatMate_Logo_mini.png" alt="FlatMate Logo">
        </a>
        <nav>
            <ul class="menu">
                <li>
                    <a class="active" href="#home">Home</a>
                </li>
                <li>
                    <a href="#servizi">Servizi</a>
                </li>
                <li>
                    <a href="#chisiamo">Chi siamo</a>
                </li>
                <li>
                    <a href="catalogo.html">Annunci</a>
                </li>
                <li>
                    <a href="#login">Login</a>
                </li>
            </ul>
        </nav>
    </header>
    <section id="home" class="home">
        <article class="title title-anim">
            <span>Benvenuto su</span>
            <img src="LaraProject/public/images/images/FlatMate_Titolo.png" alt="">
            <span>Cercare alloggi per studenti
                <br>
                non è mai stato così facile!</span>
        </article>
        <article class="forms forms-anim" id="login">
            <div class="container">
                <form class="login active.form" action="">
                    <h1>Login</h1>
                    <fieldset class="login-fieldset">
                        <div class="username">
                            <label for="login-username">Username</label>
                            <input type="text" id="login-username" name="login-username">
                            <span class="underline"></span>
                        </div>
                        <div class="password">
                            <label for="login-password">Password</label>
                            <input type="text" id="login-password" name="login-password">
                            <span class="underline"></span>
                        </div>
                    </fieldset>
                    <div class="login-extra">
                        <a class="forgot" href="">Password dimenticata?</a>
                        <button class="submit" type="submit">Login</button>
                        <span>Non sei un membro? <a data-form="toSignUp">Registrati</a></span>
                    </div>
                </form>
                <form class="sign-up inactive-form" action="">
                    <h1>Registrazione</h1>
                    <fieldset class="sign-up-fieldset">
                        <div class="username">
                            <label for="sign-up-username">Username</label>
                            <input type="text" id="sign-up-username" name="sign-up-username">
                            <span class="underline"></span>
                        </div>
                        <div class="password">
                            <label for="sign-up-password">Password</label>
                            <input type="text" id="sign-up-password" name="sign-up-password">
                            <span class="underline"></span>
                        </div>
                        <div class="confirm-password">
                            <label for="confirm-password">Conferma password</label>
                            <input type="text" id="confirm-password" name="confirm-password">
                            <span class="underline"></span>
                        </div>
                    </fieldset>
                    <div class="sign-up-extra">
                        <button class="submit" type="submit">Continua</button>
                        <span>Sei già registrato? <a data-form="toLogin">Effettua il login</a></span>
                    </div>
                </form>
                <div class="circle-to-sign-up"></div>
                <div class="circle-to-login"></div>
            </div>  
        </article>
    </section>
    <section id="middle" class="middle"></section>
    <section id="bottom" class="bottom"></section>

    <footer>
        <ul class="info">
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Chi siamo</a></li>
            <li><a href="#">Assistenza</a></li>
            <li><a href="#">Città</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
        <span class="copyright">Copyright © 2022 Tavernelle Dev Company.
            <br>All Rights Reserved.</span>
    </footer>
</body>
</html>