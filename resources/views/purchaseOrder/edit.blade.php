@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('purchase-order/update/'.$purchaseOrder->id) }}" method="post" id="addForm">
        @csrf
        <div class="container row single-page">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="order_number" class="col-sm-4">ORDER NUMBER</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="order_number" value="{{ $purchaseOrder->order_number }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="supplier" class="col-sm-4">SUPPLIER</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="supplier" value="{{ $purchaseOrder->supplier }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="quantity" class="col-sm-4">QUANTITY</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="quantity" value="{{ $purchaseOrder->quantity }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loading_to" class="col-sm-4">LOADING TO</label>
                    <div class="col-sm-8">
                        <select name="loading_to" id="loading_to" class="form-control" required>
                            @foreach($locations as $item)
                                <option value="{{ $item->id }}"
                                    {{ $purchaseOrder->loading_to == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expected_loading" class="col-sm-4">EXPECTED LOADING</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="expected_loading" value="{{ $purchaseOrder->expected_loading }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loading_last_date" class="col-sm-4">LAST DATE FOR LOADING</label>
                    <div class="col-sm-8">
                        <input type="date" name="loading_last_date" id="loading_last_date" class="form-control" value="{{ $purchaseOrder->loading_last_date }}"
                            required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="order_date" class="col-sm-4">ORDER DATE</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="order_date" value="{{ $purchaseOrder->order_date }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="variety" class="col-sm-4">VARIETY</label>
                    <div class="col-sm-8">
                        <select name="variety" id="variety" class="form-control" required>
                            @foreach($varieties as $item)
                                <option value="{{ $item->id }}"
                                    {{ $purchaseOrder->variety == $item->id ? 'selected':'' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loading_from" class="col-sm-4">LOADING FROM</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="loading_from" value="{{ $purchaseOrder->loading_from }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mode" class="col-sm-4">MODE</label>
                    <div class="col-sm-8">
                        <select name="mode" id="mode" class="form-control" required>
                                <option value="Road" {{ $purchaseOrder->mode == 'Road' ? 'selected':'' }}>Road</option>
                                <option value="Rail" {{ $purchaseOrder->mode == 'Rail' ? 'selected':'' }}>Rail</option>
                                <option value="Container" {{ $purchaseOrder->mode == 'Container' ? 'selected':'' }}>Container</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expected_arrival" class="col-sm-4">EXPECTED ARRIVAL</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="expected_arrival" value="{{ $purchaseOrder->expected_arrival }}"
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
