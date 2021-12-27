@extends('layouts.app')

@section('content')
<div class="">

<button type="button" class="btn btn-primary d-inline" data-toggle="modal" data-target="#addPurchaseOrderModal">Add Opening</button>

    <div class="container-fluid">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Wherehouse Name</th>
                <th>Lot Number</th>
                <th>Order Date</th>
                <th>Qty</th>
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
                <label for="wh_id" class="col-sm-4">WH NAME</label>
                <div class="col-sm-8">
                    <select name="wh_id" id="wh_name" class="form-control" required>
                        <option value="" selected disabled>--Select--</option>
                        @foreach ($varieties as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="wh_sub_id" class="col-sm-4">LOT NUMBER</label>
                <div class="col-sm-8">
                    <select name="wh_sub_id" id="lot_number" class="form-control" required>
                        <option value="">--Select--</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="wh_name" class="col-sm-4">QUANTITY</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="quantity" min="0" value="0" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-4">DATE</label>
                <div class="col-sm-8">
                    <input type="date" name="date" id="date" class="form-control" required>
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
            {data: 'wh_name', name: 'wh_name'},
            {data: 'lot_name', name: 'lot_name'},
            {data: 'date', name: 'date'},
            {data: 'quantity', name: 'quantity'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection
