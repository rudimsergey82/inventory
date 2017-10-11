<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
        table {
            border: 1px solid;
            border-collapse: collapse;
            width: auto;
            margin: 0 auto;
            text-align: left;
        }

        tr th {
            background: #eee;
            border: 1px solid;
        }

        tr td {
            border: 1px solid;
        }

        caption {
            text-align: left;
        }
    </style>
</head>
<body>

   {{--    <div class='row'>
        @foreach($items as $item)
            <div class='col-md-3'>
                {{$item->name}}<br>
                {{$item->identification_number}}<br>
                {!! QrCode::size(100)->generate(url('item/'.($item->id))) !!}
            </div>
    @endforeach
    </div>--}}

{{--<table>
  <tbody>

  @foreach($items as $key => $item)
      <tr>
          <td>{{$item->name}}</td>
      </tr>
      <tr>
          <td>{{$item->identification_number}}</td>
      </tr>
      <tr>
          <td> {!! QrCode::size(100)->generate(url('item/'.($item->id))) !!}</td>

      </tr>
  @endforeach
  </tbody>
  </table>--}}
</body>
</html>