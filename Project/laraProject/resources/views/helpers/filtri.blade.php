<h1 style="margin: 10px">Filtri ricerca</h1>
<hr style="margin: 10px">
<h2 class="subtitle-filtri">Città</h2>
    <input type="text" id="citta" name="citta" value="Ancona"><br>
<h2 class="subtitle-filtri">Fascia di Prezzo</h2>
    <input type="text" placeholder="100" id="min-prezzo">
    <label for="min-prezzo">&#8364; Minimi</label>
    <input type="text" placeholder="1000" id="max-prezzo">
    <label for="max-prezzo">&#8364; Massimi</label>
<h2 class="subtitle-filtri">Periodo locazione</h2>
    <input type="radio" name="gender" id="12">
    <label for="12"> 12 mesi</label>
    <input type="radio" name="gender" id="9">
    <label for="9"> 9 mesi</label>
    <input type="radio" name="gender" id="6">
    <label for="6"> 6 mesi</label>
<h2 class="subtitle-filtri">Superficie</h2>
    <input type="text" placeholder="10" id="min-mq">
    <label for="min-mq">Mq minimi</label>
    <input type="text" placeholder="1000" id="max-mq">
    <label for="max-mq">Mq massimi</label>
<h2 class="subtitle-filtri">Numero di camere</h2>
    <input type="text" id="num_camere" name="num_camere" value="1"><br>
<h2 class="subtitle-filtri">Genere ammesso</h2>
    <input type="radio" name="gender" id="female">
    <label for="female"> Femmine</label>
    <input type="radio" name="gender" id="male">
    <label for="male"> Maschi</label>
    <input type="radio" name="gender" id="all">
    <label for="all"> Tutti</label>
<h2 class="subtitle-filtri">Piano</h2>
    <input type="text" id="num_piano" name="num_piano" value="1"><br>
<h2 class="subtitle-filtri">Num. posti letto appartamento</h2>
    <input type="text" id="num_posti_letto" name="num_posti_letto" value="1"><br>
<h2 class="subtitle-filtri">Num. posti letto camera</h2>
    <input type="text" id="num_posti_letto_camera" name="num_posti_letto_camera" value="1"><br>
<h2 class="subtitle-filtri">Servizi</h2>
    <input type="checkbox" id="check1" name="check1">
    <label for="check1"> Bagno</label><br>
    <input type="checkbox" id="check2" name="check2">
    <label for="check2"> Cucina</label><br>
    <input type="checkbox" id="check3" name="check3">
    <label for="check3"> Lavanderia   </label> <h2></h2>
    <input type="checkbox" id="check4" name="check4">
    <label for="check4"> Ripostiglio</label><br>
    <input type="checkbox" id="check5" name="check5">
    <label for="check5"> Garage</label><br>
    <input type="checkbox" id="check6" name="check6">
    <label for="check6"> Giardino</label>
<h2 class="subtitle-filtri">Tipo posto letto</h2>
    <input type="radio" name="tipo" id="singola">
    <label for="singola"> Singola</label>
    <input type="radio" name="tipo" id="doppia">
    <label for="doppia"> Doppia</label>
<h2 style="margin: 20px"></h2>

<button type="submit" onclick="alert('Filtraggio...')" value="Filtra" class="filter_stats_button">Filtra</button>
