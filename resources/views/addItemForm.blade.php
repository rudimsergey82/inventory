@extends('layouts.pageTemplate')

@section('addItemForm')
<div class="container">
    <div class="body_item_form">
        <h2>Form add item</h2>
        <form class="form-horizontal" method="post" action="#">
            <label>Name item</label>
            <input type="text" class="form-item">
            <label>Identification number item</label>
            <input type="text" class="form-item">
            <br>
            <label>Serial number item</label>
            <input type="text" class="form-item">
            <label>Specifications item</label>
            <textarea type="text" class="form-item"></textarea>
            <br>
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
        </form>
    </div>
</div>
@endsection
