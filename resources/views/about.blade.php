@extends('layouts.pageTemplate')
{{--@extends('layouts.app')--}}
{{--@extends('layouts.template')--}}

@section('content')
    {{--<h1>{{ $header }}</h1>
    <h1>{{ $message }}</h1>--}}
    <div>
        <p class="lead"> The project "Inventory" was created by students of PHP Advanced 3, A-Level</p>
        <p class="lead">Alexeyev Vladimir and Rudim Sergey for educational purposes.</p>
        <p>The project used:</p>
        <p>- PHP 7.0, Laravel 5.4, MySql 5.7, JQuery 3.2.1, JQueryUI 1.12</p>

        <p><a href="https://www.simplesoftware.io/docs/simple-qrcode/en">- BaconQrCode plugin - to generate QR code</a>
        </p>

        <p><a href="https://github.com/Maatwebsite/Laravel-Excel">- plug-in PHP Exel - import / export csv-file to
                DB</a></p>

        <p><a href="http://www.position-absolute.com/creation/print/jquery.printPage.js">- JQuery page printing
                plug-in</a></p>

        <p>
            <a href="http://itsolutionstuff.com/post/laravel-5-category-treeview-hierarchical-structure-example-with-demoexample.html">
                - ajax plugin for viewing the tree of botstraps
            </a></p>

        <p><a href="https://github.com/barryvdh/laravel-debugbar">- Debugging for Laravel</a></p>

        <p><a href="https://github.com/barryvdh/laravel-ide-helper">- IDE Assistant Laravel</a></p>

        <p><a href="https://www.jetbrains.com/phpstorm">- PHP Storm trial</a></p>

    </div>
@endsection