<?php
/**
 * Created by PhpStorm.
 * User: VolandsUA
 * Date: 12.09.2017
 * Time: 21:32
 */
?>

{{--    <div>
            {{ $viewTreePlaces }}
        </div>--}}

{{--@if($tree === 0)
            <div class="container">
                <p> Place not exist!</p>
                <a href="{{url('addPlace')}}">Add place</a>
            </div>
    @else--}}
{{--    if (empty($arr[$parent_id])) {
    return;
}
        ?>--}}
{{--<div class="container">
    <div class="block">
        <div class="article__info">
            <ul>
                @for($i = 0, $parent_id = 0; $i < count($tree[$parent_id]); $i++)
                <li>
                    <h3>
                        <?= isset($tree[$parent_id][$i]['comment_username']) ? htmlspecialchars($tree[$parent_id][$i]['comment_username']) : '' ?>
                    </h3>
                    <div class="article__info__meta">
                        <small>
                            <?= isset($tree[$parent_id][$i]['comment_datetime']) ? htmlspecialchars($tree[$parent_id][$i]['comment_datetime']) : '' ?>
                        </small>
                    </div>
                    <div class="article__info__preview">
                        <p> <?= isset($tree[$parent_id][$i]['comment_text']) ? htmlspecialchars($tree[$parent_id][$i]['comment_text']) : '' ?></p>
                    </div>
                    <div>
                        <a href="http://localhost/blog-Twig/public/index.php?action=add_comment&post_id=<?= $tree[$parent_id][$i]['post_id'] ?>&comment_id=<?= $arr[$parent_id][$i]['comment_id'] ?>">Add
                            comment</a>
                        <a href="http://localhost/blog-Twig/public/index.php?action=edit_comment&post_id=<?= $tree[$parent_id][$i]['post_id'] ?>&comment_id=<?= $arr[$parent_id][$i]['comment_id'] ?>">Edit</a>
                        <a href="http://localhost/blog-Twig/public/index.php?action=delete_comment&post_id=<?= $tree[$parent_id][$i]['post_id'] ?>&comment_id=<?= $arr[$parent_id][$i]['comment_id'] ?>">Delete</a>
                    </div>
                    <?php
                    viewComments($arr, $arr[$parent_id][$i]['comment_id']);
                    ?>
                </li>
                @endfor
            </ul>
        </div>
    </div>
</div>

@endif--}}.

{{--<table class="table-all-places" border="1">
    <tr class="header-table-all-places">
        <th class="header-table">Number</th>
        <th class="header-table">Name</th>
        <th class="header-table">Identification number</th>
        <th class="header-table">Serial number</th>
        <th class="header-table">Specifications</th>
        <th class="header-table">Date create</th>
        <th class="header-table">Date buy</th>
        <th class="header-table">Coast</th>
        <th class="header-table">Date input use</th>
        <th class="header-table">Service </th>
    </tr>
    {{--@foreach($places as $place)
    <tr>
        <td>{{ $place->id }}</td>
        <td>{{ $place->name }}</td>
        <td>{{ $place->identification_number }}</td>
        <td>{{ $place->serial_number }}</td>
        <td>{{ $place->specifications }}</td>
        <td>{{ $place->date_create }}</td>
        <td>{{ $place->date_buy }}</td>
        <td>{{ $place->coast }}</td>
        <td>{{ $place->date_input_use }}</td>
        <td>{{ $place->service_life }}</td>
    </tr>
    @endforeach
</table>--}}

{{--    Example row of columns
<div class="row">
    <div class="col-lg-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
    </div>
</div>--}}


{{--    <div style="left: 100px; width: 779px; position: absolute; top: 2096px; height: 152px;" class="style-iw6ho7go"
             data-state="  field3Hidden field4Hidden   desktop left" id="comp-iw6hfr7g"
             data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g"
             data-dcf-columns="4">
    <form role="form" aria-label="contact form" id="comp-iw6hfr7gform-wrapper" class="style-iw6ho7goform-wrapper"
          data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper">
        <div id="comp-iw6hfr7gwrapper" class="style-iw6ho7gowrapper"
             data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper">
            <ul class="style-iw6ho7go_row style-iw6ho7go_form"
                data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0">
                <li class="style-iw6ho7go_col style-iw6ho7go_left"
                    data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.0">
                    <div data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.0.0">
                        <input id="field1" type="text" required="" aria-invalid="false" name="Ваше имя"
                               class="style-iw6ho7go_required" placeholder="Ваше имя" data-aid="nameField"
                               data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.0.0.$field1"><input
                                id="field2" type="text" required="" aria-invalid="false" name="Email"
                                class="style-iw6ho7go_required" placeholder="Email" data-aid="emailField"
                                data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.0.0.$field2"><input
                                id="field3" type="tel" aria-invalid="false" name="Phone"
                                class="style-iw6ho7go_hidden style-iw6ho7go_hiddenField" placeholder="Phone"
                                data-aid="phoneField"
                                data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.0.0.$field3"><input
                                id="field4" type="text" aria-invalid="false" name="Address"
                                class="style-iw6ho7go_hidden style-iw6ho7go_hiddenField" placeholder="Address"
                                data-aid="addressField"
                                data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.0.0.$field4"><input
                                id="field5" type="text" aria-invalid="false" name="Тема" class="" placeholder="Тема"
                                data-aid="subjectField"
                                data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.0.0.$field5">
                    </div>
                </li>
                <li class="style-iw6ho7go_col style-iw6ho7go_right"
                    data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.1">
                        <textarea name="Напишите, как мы могли бы Вам помочь..." required=""
                                  class="style-iw6ho7go_required style-iw6ho7gofieldMessage"
                                  placeholder="Напишите, как мы могли бы Вам помочь..." data-aid="messageField"
                                  id="comp-iw6hfr7gfieldMessage"
                                  data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.0.1.$fieldMessage"></textarea>
                </li>
            </ul>
            <div class="style-iw6ho7go_foot"
                 data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.1">
                    <span aria-live="polite" class="style-iw6ho7go_success style-iw6ho7gonotifications"
                          id="comp-iw6hfr7gnotifications"
                          data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.1.$notifications"></span>
                <button type="submit" id="comp-iw6hfr7gsubmit" class="style-iw6ho7gosubmit"
                        data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.$centeredContent.$inlineContent.$SITE_PAGES.$u7tem_DESKTOP.$inlineContent.$comp-iw6hfr7g.$form-wrapper.$wrapper.1.$submit">
                    Отправить
                </button>
            </div>
        </div>
    </form>
</div>--}}
{{--</div>--}}
{{--
{!! Form::model($place, ['action' => 'PlaceController@store']) !!}

<div class="form-group">
    {!! Form::label('make', 'Make') !!}
    {!! Form::text('make', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('model', 'Model') !!}
    {!! Form::text('model', '', ['class' => 'form-control']) !!}
</div>

<button class="btn btn-success" type="submit">Add the Place!</button>

{!! Form::close() !!}
--}}

/*Route::get('/', function () {
return view('welcome');
} );*/