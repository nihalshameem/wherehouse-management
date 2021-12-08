@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('receipt/add') }}" method="post" id="addForm">
        @csrf
        <div class="container row single-page">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="wb_slip_no" class="col-sm-4">WB SLIP NO</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="wb_slip_no" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="po_id" class="col-sm-4">PURCHASE ORDER</label>
                    <div class="col-sm-8">
                        <select name="po_id" id="po_id" class="form-control" required>
                            <option value="" selected disabled>--Select--</option>
                            @foreach($pos as $item)
                                <option value="{{ $item->id }}">{{ $item->order_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location_id" class="col-sm-4">LOCATION</label>
                    <div class="col-sm-8">
                        <select name="location_id" id="location_id" class="form-control" required>
                            <option value="" selected disabled>--Select--</option>
                            @foreach($locations as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="wh_name" class="col-sm-4">WH NAME</label>
                    <div class="col-sm-8">
                        <select name="wh_name" id="wh_name" class="form-control" required>
                            <option value="" selected disabled>--Select--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lot_number" class="col-sm-4">LOT NUMBER</label>
                    <div class="col-sm-8">
                        <select name="lot_number" id="lot_number" class="form-control" required>
                                <option value="">--Select--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="variety" class="col-sm-4">VARIETY</label>
                    <div class="col-sm-8">
                        <select name="variety" id="variety" class="form-control" required>
                            <option value="" selected disabled>--Select--</option>
                            @foreach($varieties as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="date" class="col-sm-4">DATE</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bags" class="col-sm-4">NO OF BAGS</label>
                    <div class="col-sm-8">
                        <input type="number" name="bags" id="bags" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="truck_no" class="col-sm-4">TRUCK NO</label>
                    <div class="col-sm-8">
                        <input type="number" name="truck_no" id="truck_no" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="weight" class="col-sm-4">WEIGHT</label>
                    <div class="col-sm-8">
                        <input type="number" name="weight" id="weight" class="form-control" value="0" min="0" max="0" required>
                    </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Save</button>
                </div>
            </div>
        </div>
    </form>
    <div class="justify-content-center" id="poDetails">
        <table class="table table-sm">
        </table>
    </div>
</div>
@endsection
