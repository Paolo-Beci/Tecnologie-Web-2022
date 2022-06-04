@extends('template')

@section('link')
@show

@section('scripts')
@show

@section('title', 'Gestione alloggi')

@include('_navbar._navbar-locatore')



            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        @yield('content')
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>

            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
