//implementa l'iniezione nel DOM di uno/più mex di errore legati ad un singolo elemento della form
function getErrorHtml(elemErrors) {
    //nel caso in cui non ci siano errori non tornare niente
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors">';
    //stampa ogni errore
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

//funzione che si occupa della validazione dell'elemento della form di cui ho passato l'id
function doElemValidation(id, actionUrl, formId) {

    var formElems;

    //aggiunge allo scheletro della form il token
    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    //attiva la utility function AJAX
    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,
            dataType: "json",
            //funzione da attivare nel caso in cui la risposta all'inoltro contiene un codice di errore
            error: function (data) {
                if (data.status === 422) {
                    //trasformazione in array associativo dei mex di errore
                    var errMsgs = JSON.parse(data.responseText);
                    //elimino i mex di errore vecchi associati ad un determinato elemento
                    $("#" + id).parent().find('.errors').remove();
                    //inserisco i nuovi mex di errore
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                }
            },
            //disattivo l'inoltro del content type standard insieme ai dati della form
            contentType: false,
            //disattivo il meccanismo automatico che ha la utility function AJAX di semplificare il dato passato dalla form al S
            processData: false
        });
    }

    var elem = $("#" + id);
    if (elem.attr('type') === 'file') {
        // se l'elemento di input è di tipo file allora dobbiamo costruire il valore da inviare al S
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    //struttura dati (scheletro) di tipo form da inviare al S
    formElems = new FormData();
    //aggiungo dati
    formElems.append(id, inputVal);
    //definisce il csrf token
    addFormToken();
    sendAjaxReq();

}

//funzione che si attiva al click sul bottone di submit. Validazione dell'intera form.
function doFormValidation(actionUrl, formId) {

    //oggetto che rappresenta la form
    var form = new FormData(document.getElementById(formId));
    //attiva la utility function AJAX
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    //elimino i mex di errore vecchi associati ad un determinato elemento
                    $("#" + id).parent().find('.errors').remove();
                    //inserisco i nuovi mex di errore
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        //nel caso i dati siano validati
        success: function (data) {
            //ridirezione dell'utente nella view apposita
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });
}

function changeEta(etaMinima) {
    console.log($(this).val());

}
