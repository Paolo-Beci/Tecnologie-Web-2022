$('.contact').on('click', function(){

    let contact = $(this).data('contact');

    let alloggio = $(this).data('alloggio');

    $("[data-chat-contact]").each(function(){
            $(this).css('display', 'none');
    })

    let chat = $("[data-chat-contact='" + contact + "'][data-chat-alloggio='" + alloggio + "']");

    let profile_img = chat.children('.chat-top-bar').children('div').children('img');

    profile_img.attr('src', $(this).children('img').attr('src'));

    chat.css('display', 'block');

    let chat_content = chat.children('.chat-content');

    chat_content.scrollTop(chat_content[0].scrollHeight);

})

function sendMessage(route, form) {

    let formData = new FormData(form.get(0));

    $.ajax({
        type: 'POST',
        url: route,
        data: formData,
        dataType: "json",
        success: function (data) {

            let date = new Date( data.data_invio);

            let container = form.parent() //chat-bottom-bar
                        .prev() //chat-content
                        .children(':last-child') //day-chat
                        .children(':last-child'); //sent-container o received-container

            if(container.hasClass('sent-container')) {

                let lastMessage = container.children(':last-child');

                let sent = `
                <div class="sent">
                    <span class="chat-text">` + formData.get('contenuto') + `</span>
                    <div class="chat-extra">
                        <span class="time">` + date.getHours() + ':' + date.getMinutes() + `</span>
                    </div>
                </div>`;

                lastMessage.after(sent);

                lastMessage.next()[0].scrollIntoView(true);

                form.children('[name=contenuto]').val('');

            } else {

                let sent = `
                    <div class="sent-container">
                        
                            <div class="sent">
                                <span class="chat-text">` + formData.get('contenuto') + `</span>
                                <div class="chat-extra">
                                    <span class="time">` + date.getHours() + ':' + date.getMinutes() + `</span>
                                </div>
                            </div>

                        </div>`;

                container.after(sent);


            }
        },
        contentType: false,
        processData: false
    });
}