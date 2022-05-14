<!DOCTYPE html>
<html>
<head>
    <title>Registrazione</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/sign-up-continue.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../resources/js/sign-up-continue.js" defer></script>
</head>
<body>
    <form class="sign-up" action="{{route('homepage')}}">
        <div class="sign-up-step active active-anim" data-step="0">
            <h1>Dati personali</h1>
            <fieldset class="form-group">
                <img class="profile" src="{{asset('images/profile-default.png')}}" alt="Foto profilo default">
                <div class="underline">
                    <input type="text" placeholder="Nome">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Cognome">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Luogo di nascita">
                </div>
                <div class="underline">
                    <input type="datetime-local" placeholder="Data di nascita">
                </div>
                <div class="gender">
                    <div>
                        <input type="radio" name="gender" id="male">
                        <label for="male">Uomo</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" id="female">
                        <label for="female">Donna</label>
                    </div>
                </div>
                <div class="underline">
                    <input type="text" placeholder="Codice fiscale">
                </div>
            </fieldset>
            <div class="buttons">
                <button type="button" data-next>Prossimo step</button>
            </div>
        </div>
        <div class="sign-up-step" data-step="1">
            <h1>Indirizzo di residenza</h1>
            <fieldset class="form-group">
                <div class="underline">
                    <input type="text" placeholder="Città">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Via">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Numero civico">
                </div>
                <div class="underline">
                    <input type="text" placeholder="CAP">
                </div>
            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                <button type="button" data-next>Prossimo step</button>
            </div>
        </div>
        <div class="sign-up-step" data-step="2">
            <h1>Informazioni opzionali</h1>
            <fieldset class="form-group">
                <div class="underline">
                    <input type="email" placeholder="E-mail">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Cellulare">
                </div>
            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                <button type="submit">Registrati</button>
            </div>
        </div>
    </form>
</body>
</html>