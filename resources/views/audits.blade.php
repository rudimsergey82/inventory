@extends('layouts.pageTemplate')

@section('content')
    <div class="container">

        <p>Date: <input type="text" id="datepicker"></p>

        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Places</a></li>
                <li><a href="#tabs-2">Place items </a></li>
                <li><a href="#tabs-3">All items</a></li>

            </ul>
{{--            <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-primary">Apple</a>
                <a href="#" class="btn btn-primary">Samsung</a>
                <a href="#" class="btn btn-primary">Sony</a>
            </div>--}}
            <div id="tabs-1">















                <div class="demo">
                    <form action="#">
                        <h2>Selectmenu with framework icons</h2>
                        <fieldset>
                            <label for="filesA">Select a File:</label>
                            <select name="filesA" id="filesA">
                                <option value="jquery" data-class="ui-icon-script">jQuery.js</option>
                                <option value="jquerylogo" data-class="ui-icon-image">jQuery Logo</option>
                                <option value="jqueryui" data-class="ui-icon-script">ui.jQuery.js</option>
                                <option value="jqueryuilogo" selected="selected" data-class="ui-icon-image">jQuery UI
                                    Logo
                                </option>
                                <option value="somefile" disabled="disabled" data-class="ui-icon-help">Some unknown
                                    file
                                </option>
                            </select>
                        </fieldset>

                        <h2>Selectmenu with custom icon images</h2>
                        <fieldset>
                            <label for="filesB">Select a podcast:</label>
                            <select name="filesB" id="filesB">
                                <option value="mypodcast" data-class="podcast">John Resig Podcast</option>
                                <option value="myvideo" data-class="video">Scott González Video</option>
                                <option value="myrss" data-class="rss">jQuery RSS XML</option>
                            </select>
                        </fieldset>

                        <h2>Selectmenu with custom avatar 16x16 images as CSS background</h2>
                        <fieldset>
                            <label for="people">Select a Person:</label>
                            <select name="people" id="people">
                                <option value="1" data-class="avatar"
                                        {{--data-style="background-image: url(&apos;http://www.gravatar.com/avatar/b3e04a46e85ad3e165d66f5d927eb609?d=monsterid&amp;r=g&amp;s=16&apos;);"--}}>
                                    John Resig
                                </option>
                                <option value="2" data-class="avatar"
                                        {{--data-style="background-image: url(&apos;http://www.gravatar.com/avatar/e42b1e5c7cfd2be0933e696e292a4d5f?d=monsterid&amp;r=g&amp;s=16&apos;);"--}}>
                                    Tauren Mills
                                </option>
                                <option value="3" data-class="avatar"
                                        {{--data-style="background-image: url(&apos;http://www.gravatar.com/avatar/bdeaec11dd663f26fa58ced0eb7facc8?d=monsterid&amp;r=g&amp;s=16&apos;);"--}}>
                                    Jane Doe
                                </option>
                            </select>
                        </fieldset>
                    </form>

                </div>
            </div>
            <div id="tabs-2">
                <div class="body_item_form">
                    <h2>All items</h2>
                    <table class="table-all-items" border="1">
                        <tr class="header-table-all-items">
                            <th class="header-table"></th>
                            <th class="header-table">Number</th>
                            <th class="header-table">Name</th>
                            <th class="header-table">Identification number</th>
                            <th class="header-table">Serial number</th>
                            <th class="header-table">Specifications</th>
                            <th class="header-table">Date create</th>
                            <th class="header-table">Date buy</th>
                            <th class="header-table">Coast</th>
                            <th class="header-table">Date input use</th>
                            <th class="header-table">Guarantee</th>
                            <th class="header-table">Place</th>
                        </tr>
                        {{--@foreach($items as $item)
                            <tr>
                                --}}{{--<td><submit>View</submit></td>--}}{{--
                                <td><a class="btn btn-lg btn-success" href="{{url('item')}}/{{$item->id}}" role="button">V</a></td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->identification_number }}</td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->specifications }}</td>
                                <td>{{ $item->date_create }}</td>
                                <td>{{ $item->date_buy }}</td>
                                <td>{{ $item->coast }}</td>
                                <td>{{ $item->date_input_use }}</td>
                                <td>{{ $item->guarantee }}</td>
                                <td>place</td>
                            </tr>
                        @endforeach--}}
                    </table>
                </div>
{{--                <div>
                    <p><a class="btn btn-lg btn-success" href="{{url('addAudit')}}" role="button">Add audit</a></p>
                </div>--}}
            </div>
            <div id="tabs-3">
                <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel
                    vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class
                    aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales.
                    Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium.
                    Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla
                    facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse
                    potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor
                    eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi
                    lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum
                    rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus
                    hendrerit hendrerit.</p>
            </div>
        </div>
        <div>
            <p><a class="btn btn-lg btn-success" href="{{url('addAudit')}}" role="button">Add audit</a></p>
        </div>
    </div>
@endsection
