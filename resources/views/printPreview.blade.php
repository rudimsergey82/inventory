<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
        table{
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
        tr td{
            border: 1px solid;
        }
        caption{
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
       {{-- <thead >
        <tr>
            <th>name</th>
        </tr>
        <tr>
            <th>identification_number</th>
        </tr>
        <tr>
            <th>qr_code</th>
        </tr>
        </thead>--}}
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

            {{--<td> {!! $QR !!}</td>>--}}
        </tr>
    @endforeach
    </tbody>
    </table>
</body>
</html>