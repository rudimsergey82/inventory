@extends('layouts.pageTemplate')

@section('content')
<div class="container">
    <div class="body_item_form">
        <h2>ALl items</h2>
        <table class="table-all-items" border="1">
            <tr class="header-table-all-items">
                <th class="header-table-">Name item</th>
                <th class="header-table-">Identification number item</th>
                <th class="header-table-">Serial number item</th>
                <th class="header-table-">Day create item</th>
                <th class="header-table-">Coast item</th>
                <th class="header-table-">Specifications item</th>
                <th class="header-table-">Day create item</th>
                <th class="header-table-">Date buy item</th>
                <th class="header-table-">Day create item</th>
                <th class="header-table-">Day create item</th>
                <th class="header-table-">Day create item</th>
                <th class="header-table-">Day create item</th>
            </tr>
            <tr>

            </tr>
            {{--                @foreach($allItems as $item)
                            <tr>
                            <td>{{$item->item_id}}
                            </td>
                            </tr>
                            @endforeach--}}

        </table>

            <label>Day create item</label>
            <input type="text" class="form-item">
            <label>Date buy item</label>
            <input type="text" class="form-item">
            <br>
            <label>Coast item</label>
            <input type="text" class="form-item">
            <label>Date input use item</label>
            <input type="text" class="form-item">
            <br>
            <label>Date output use item</label>
            <input type="text" class="form-item">
            <label>Date output use item</label>
            <input type="text" class="form-item">
        </form>
    </div>
</div>
@endsection
