@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('opening/update/'.$opening->id) }}" method="post" id="addForm">
        @csrf
        <div class="container row single-page">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="wh_id" class="col-sm-4">WH NAME</label>
                    <div class="col-sm-8">
                        <select name="wh_id" id="wh_name" class="form-control" required>
                            @foreach($wh_names as $item)
                                <option value="{{ $item->id }}"
                                    {{ $opening->wh_id == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="wh_sub_id" class="col-sm-4">LOT NUMBER</label>
                    <div class="col-sm-8">
                        <select name="wh_sub_id" id="lot_number" class="form-control" required>
                            @foreach($wh_names as $item)
                                <option value="{{ $item->id }}"
                                    {{ $opening->wh_sub_id == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="quantity" class="col-sm-4">QUANTITY</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="quantity" value="{{ $opening->quantity }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-sm-4">DATE</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="date" value="{{ $opening->date }}" required>
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
