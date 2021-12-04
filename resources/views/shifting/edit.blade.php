@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('shifting/update/'.$shifting->id) }}" method="post" id="addForm">
        @csrf
        <div class="container row single-page">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="wb_slip_no" class="col-sm-4">WB SLIP NO</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="wb_slip_no" value="{{ $shifting->wb_slip_no }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location_id" class="col-sm-4">LOCATION</label>
                    <div class="col-sm-8">
                        <select name="location_id" id="location_id" class="form-control" required>
                            @foreach($locations as $item)
                                <option value="{{ $item->id }}"
                                    {{ $shifting->location_id == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lot_number" class="col-sm-4">LOT NUMBER</label>
                    <div class="col-sm-8">
                        <select name="lot_number" id="lot_number" class="form-control" required>
                            @foreach($lot_numbers as $item)
                                <option value="{{ $item->id }}"
                                    {{ $shifting->lot_number == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="truck_no" class="col-sm-4">TRUCK NO</label>
                    <div class="col-sm-8">
                        <input type="number" name="truck_no" id="truck_no" class="form-control"
                            value="{{ $shifting->truck_no }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="weight" class="col-sm-4">WEIGHT</label>
                    <div class="col-sm-8">
                        <input type="number" name="weight" id="weight" class="form-control"
                            value="{{ $shifting->weight }}" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="date" class="col-sm-4">DATE</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="date" value="{{ $shifting->date }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="wh_name" class="col-sm-4">WH NAME</label>
                    <div class="col-sm-8">
                        <select name="wh_name" id="wh_name" class="form-control" required>
                            @foreach($wh_names as $item)
                                <option value="{{ $item->id }}"
                                    {{ $shifting->wh_name == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="variety" class="col-sm-4">VARIETY</label>
                    <div class="col-sm-8">
                        <select name="variety" id="variety" class="form-control" required>
                            @foreach($varieties as $item)
                                <option value="{{ $item->id }}"
                                    {{ $shifting->variety == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bags" class="col-sm-4">NO OF BAGS</label>
                    <div class="col-sm-8">
                        <input type="number" name="bags" id="bags" class="form-control" value="{{ $shifting->bags }}"
                            required>
                    </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-info float-right">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('datatables')
<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('receipts') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'location_id',
                    name: 'location_id'
                },
                {
                    data: 'wh_name',
                    name: 'wh_name'
                },
                {
                    data: 'bags',
                    name: 'bags'
                },
                {
                    data: 'weight',
                    name: 'weight'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });

</script>
@endsection
