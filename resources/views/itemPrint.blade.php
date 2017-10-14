<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
        table {
            border: 2px solid;
            border-collapse: collapse;
            width: auto;
            margin: 0 auto;
            text-align: center;
        }

        tr td {
            background: #eee;
            border: 1px solid;
        }
    </style>
</head>
<body>
<table>

    <tr>
        <td>
            {{$itemPrint->name_item}}
        </td>
    </tr>
    <tr>
        <td>
            {{$itemPrint->identification_number}}
        </td>
    </tr>
    <tr>
        <td>
            {!! QrCode::size(100)->generate(url('item/'.($itemPrint->id))) !!}
        </td>
    </tr>

</table>
</body>
