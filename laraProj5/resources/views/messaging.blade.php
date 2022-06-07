<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Flatmate | Messagistica</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/messaging.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/messaggistica.js')}}" defer></script>
    <script>
        $(function(){

            var route = "{{ route('send-message') }}";

            $("input[type=image]").on('click', function (event) {

                event.preventDefault();

                let form = $(this).parent();
                
                sendMessage(route, form);

            });

        });
    </script>
</head>
<body>

    <section class="body-content">
        
        <article class="left-content">

            @php

                if($usersPhoto[$authUser->id] == '')
                    $usersPhoto[$authUser->id] = 'no_image.png';

            @endphp

            <div class="messaging-menu">
                <a href=""><img src="{{asset('images_profilo/' . $usersPhoto[$authUser->id])}}" alt="User"></a>
                <a href="{{route('home-' . $authUser->ruolo)}}"><img src="{{asset('images/icons_casa.png')}}" alt="Home"></a>
            </div>

            <div class="contacts">

                @foreach ($contacts as $contacts_alloggio)

                    @foreach ($contacts_alloggio as $contact)

                        @php
                            $contact_username = array_search($contact, $contacts_alloggio);
                            $contact_id = $usernameIdUsers[$contact_username];

                            if($usersPhoto[$contact_id] == '')
                                $usersPhoto[$contact_id] = 'no_image.png';

                            $last_day_contact = $contact[array_key_first($contact)];
                            $last_message = $last_day_contact[array_key_first($last_day_contact)];
                        @endphp

                        <div class="contact" data-contact="{{array_search($contact, $contacts_alloggio)}}"
                                            data-alloggio="{{array_search($contacts_alloggio, $contacts)}}">
                            <img src="{{asset('images_profilo/' . $usersPhoto[$contact_id])}}" alt="Immagine di profilo">
                            <div class="preview">
                                <div class="preview-top">
                                    {{-- username --}}
                                    <span>{{$contact_username}}</span>
                                    @php
                                        $alloggio = $alloggi->find(array_search($contacts_alloggio, $contacts));
                                        $alloggio_desc = $alloggio->citta . ', ' . $alloggio->via . ' ' .  $alloggio->num_civico;
                                        $alloggio_desc = substr($alloggio_desc, 0, 20) . '...';
                                    @endphp

                                    <span class="alloggio-desc">{{$alloggio_desc}}</span>
                                    <span class="datetime">
                                        {{ date('H:i', strtotime($last_message->data_invio)) }}
                                    </span>
                                </div>
                                <div class="last-message">{{
                                    strlen($last_message->contenuto) > 40 ? 
                                        substr($last_message->contenuto, 0, 40) . '...' : $last_message->contenuto
                                }}</div>
                            </div>
                        </div>
                    @endforeach
                    
                @endforeach

            </div>

        </article>

        <article class="right-content">
            <div class="chat-home" data-chat-contact="0">
                <img src="{{ asset('images/FlatMate_Logo.png') }}" alt="FlatMate Logo">
                <hr class="divider">
                <p class="description">
                    Benvenuto nella sezione di messaggistica di Flatmate.
                    <br>
                    Da qui puoi messagguare liberamente con gli altri utenti del portale!
                </p>
            </div>

        @foreach ($contacts as $contacts_alloggio)

            @foreach ($contacts_alloggio as $contact)
                
                @php
                    $contact_username = array_search($contact, $contacts_alloggio);
                    $contact_alloggio = array_search($contacts_alloggio, $contacts);
                @endphp

                <div class="chat" data-chat-contact="{{$contact_username}}"
                                data-chat-alloggio="{{$contact_alloggio}}">

                <div class="chat-top-bar">
                    <div>
                        <img src="" alt="User">
                        <span>{{array_search($contact, $contacts_alloggio)}}</span>
                    </div>

                    @php
                        $alloggio = $alloggi->find(array_search($contacts_alloggio, $contacts));
                    @endphp

                    <span>{{str_replace('_', ' ', $alloggio->tipologia)}} situato in {{
                        $alloggio->via . ' ' .  $alloggio->num_civico . ', '
                        . $alloggio->citta . ' ' . $alloggio->cap}}
                    </span>
                </div>               

                <div class="chat-content">

                    @foreach (array_reverse($contact) as $day_contact)

                        <div class="day-chat">

                            <div class="date">{{array_search($day_contact, $contact)}}</div>

                            @php
                                $day_contact = array_reverse($day_contact);
                            @endphp

                            @while (!empty($day_contact))

                                @if (current($day_contact)->mittente == $authUser->username)

                                    <div class="sent-container">                                           

                                        @foreach ($day_contact as $message)

                                            @if ($message->mittente == $authUser->username)
                                                <div class="sent">
                                                    <span class="chat-text">{{$message->contenuto}}</span>
                                                    <div class="chat-extra">
                                                        <span class="time">{{ date('H:i', strtotime($message->data_invio)) }}</span>
                                                    </div>
                                                </div>
                                                @php
                                                    $key = array_search($message, $day_contact);
                                                    unset($day_contact[$key]);
                                                @endphp
                                            @else
                                                @break
                                            @endif

                                        @endforeach

                                    </div>
                                @else

                                    <div class="received-container">

                                        @foreach ($day_contact as $message)

                                            @if ($message->mittente != $authUser->username)
                                                
                                                <div class="received">
                                                    <span class="chat-text">{{$message->contenuto}}</span>
                                                    <div class="chat-extra">
                                                        <span class="time">{{ date('H:i', strtotime($message->data_invio)) }}</span>
                                                    </div>
                                                </div>
                                                @php
                                                    $key = array_search($message, $day_contact);
                                                    unset($day_contact[$key]);
                                                @endphp
                                                
                                            @else
                                                @break
                                            @endif

                                        @endforeach
                                    </div>
                                @endif

                            @endwhile

                        </div>
                    @endforeach

                </div>

                <div class="chat-bottom-bar">

                    {{ Form::open(array('route' => 'send-message', 'class' => 'send-message', 'data-form' => $contact_username)) }}
                        {{ Form::text('contenuto', '', ['placeholder' => 'Scrivi un messaggio']) }}
                        {{ Form::hidden('mittente', $authUser->id) }}
                        {{ Form::hidden('destinatario', App\Models\Resources\User::where('username', $contact_username)->first()->id) }}
                        {{ Form::hidden('alloggio', $contact_alloggio) }}
                        <input type="image" src="{{asset('images/send-button.png')}}" alt="Invia messaggio">
                    {{ Form::close() }}

                </div>

            </div>

            @endforeach

        @endforeach

        </article>
    </section>
</body>
</html>