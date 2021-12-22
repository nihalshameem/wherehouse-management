@extends('layouts.app')

@section('content')
<div class="">

<button type="button" class="btn btn-primary d-inline" data-toggle="modal" data-target="#addPurchaseOrderModal">Add Opening</button>

    <div class="container-fluid">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Qty</th>
                <th>Expected Loading</th>
                <th>Expected Arrival</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addPurchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="addPurchaseOrderModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addConsumptionModalLabel">Add Opening</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('opening/add')}}" method="post" id="addForm">
        @csrf
        <div class="container">
            <div class="form-group row">
                <label for="order_number" class="col-sm-4">ORDER NUMBER</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="order_number" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="order_date" class="col-sm-4">ORDER DATE</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="order_date" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="supplier" class="col-sm-4">SUPPLIER</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="supplier" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="variety" class="col-sm-4">VARIETY</label>
                <div class="col-sm-8">
                    <select name="variety" id="variety" class="form-control" required>
                        <option value="" selected disabled>--Select--</option>
                        @foreach ($varieties as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="wh_name" class="col-sm-4">QUANTITY</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="quantity" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="lot_number" class="col-sm-4">LOADING FROM</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="loading_from" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="loading_to" class="col-sm-4">LOADING TO</label>
                <div class="col-sm-8">
                    <select name="loading_to" id="loading_to" class="form-control" required>
                        <option value="" selected disabled>--Select--</option>
                        @foreach ($locations as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="mode" class="col-sm-4">MODE</label>
                <div class="col-sm-8">
                    <select name="mode" id="mode" class="form-control" required>
                        <option value="Road">Road</option>
                        <option value="Rail">Rail</option>
                        <option value="Container">Container</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="expected_loading" class="col-sm-4">EXPECTED LOADING</label>
                <div class="col-sm-8">
                    <input type="date" name="expected_loading" id="expected_loading" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="expected_arrival" class="col-sm-4">EXPECTED ARRIVAL</label>
                <div class="col-sm-8">
                    <input type="date" name="expected_arrival" id="expected_arrival" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="loading_last_date" class="col-sm-4">LAST DATE FOR LOADING</label>
                <div class="col-sm-8">
                    <input type="date" name="loading_last_date" id="loading_last_date" class="form-control" required>
                </div>
            </div>
        </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="addForm" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('datatables')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('opening') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'order_number', name: 'order_number'},
            {data: 'order_date', name: 'order_date'},
            {data: 'quantity', name: 'quantity'},
            {data: 'expected_loading', name: 'expected_loading'},
            {data: 'expected_arrival', name: 'expected_arrival'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection
