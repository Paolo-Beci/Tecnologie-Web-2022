// Gestisce il click di un contact facendo appartire a schermo la chat-content corrispondente
// tramite i data attribute 'data-contact' -> 'data-chat-contact' e 'data-alloggio' -> 'data-chat-alloggio'
$('.contacts').on('click', '.contact', function(){

    let contact = $(this).data('contact');

    let alloggio = $(this).data('alloggio');

    $("[data-chat-contact]").each(function(){
            $(this).css('display', 'none');
    })

    let chat = $("[data-chat-contact='" + contact + "'][data-chat-alloggio='" + alloggio + "']");

    let profileImg = chat.children('.chat-top-bar').children('div').children('a').children('img');

    profileImg.attr('src', $(this).children('img').attr('src'));

    chat.css('display', 'block');

    let chatContent = chat.children('.chat-content');

    chatContent.scrollTop(chatContent[0].scrollHeight);

})

function getSentMessageHtml(contenuto, time) {

    return `
        <div class="sent">
            <span class="chat-text">` + contenuto + `</span>
            <div class="chat-extra">
                <span class="time">` + time + `</span>
            </div>
        </div>`;

}

function createMessageView(form, formData, data) {

    let date = data.data_invio;

    let time = data.ora_invio;

    let container = form.parent() //chat-bottom-bar
        .prev() //chat-content
        .children(':last-child') //day-chat
        .children(':last-child'); //sent-container o received-container

    let lastMessage = container.children(':last-child');

    let sentMessage = getSentMessageHtml(formData.get('contenuto'), time);

    let lastDayChat = lastMessage.parent() //sent-container o received-container
                                .parent(); //day-chat

    let lastDate = lastDayChat.children('.date') //date
                            .text();

    if(lastDate == date) {

        if(container.hasClass('sent-container')) {

            lastMessage.after(sentMessage);

            lastMessage.next()[0].scrollIntoView(true);

        } else {

            let sentContainer = '<div class="sent-container">' + sentMessage + '</div>';

            container.after(sentContainer);

            container.next().children('.sent')[0].scrollIntoView(true);

        }

    } else {

        let dayChat = `
            <div class="day-chat">
                <div class="date">` + date + `</div>
                <div class="sent-container">` +
                sentMessage + `
                </div>
            </div>`;

        lastDayChat.after(dayChat);

        lastDayChat.next().children('.sent-container').children('.sent')[0].scrollIntoView(true);

    }

}

function changeContactsDisposition(form, data) {

    let chat = form.parent() //chat-bottom-bar
                .parent(); //chat

    let chatContact = chat.data('chat-contact');
    let chatAlloggio = chat.data('chat-alloggio');


    let newContact;
    let oldContactsHtml = '';


    let contacts = $('.contacts');

    contacts.children('.contact').each(function() {
        if($(this).data('contact') == chatContact && $(this).data('alloggio') == chatAlloggio)
            newContact = $(this);
        else {
            oldContactsHtml += '<div class="contact" data-contact="'
            + $(this).data('contact')
            + '" data-alloggio="'
            + $(this).data('alloggio')
            + '">';

            oldContactsHtml += $(this).html();

            oldContactsHtml += '</div>';
        }
    });

    newContact.find('.preview .preview-top .datetime').text(data.ora_invio);

    let contenuto = data.contenuto;

    if(contenuto.length > 40)
        contenuto = contenuto.substring(0, 40) + '...';

    newContact.find('.preview .last-message').html(contenuto);

    newContactHtml = '<div class="contact" data-contact="' + chatContact
    + '" data-alloggio="' + chatAlloggio + '">'
    + newContact.html()
    + '</div>';

    contacts.html(newContactHtml + oldContactsHtml);

}

function sendMessage(route, form) {

    let formData = new FormData(form.get(0));

    $.ajax({
        type: 'POST',
        url: route,
        data: formData,
        dataType: "json",
        success: function (data) {

            createMessageView(form, formData, data);
            changeContactsDisposition(form, data);

            if(data.stato == 'locato')
                $('.assign-form').hide();

        },
        contentType: false,
        processData: false
    });

    form.children('[name=contenuto]').val('');

}
