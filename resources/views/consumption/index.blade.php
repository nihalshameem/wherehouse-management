@extends('layouts.app')

@section('content')
<div class="">

<button type="button" class="btn btn-primary d-inline" data-toggle="modal" data-target="#addConsumptionModal">Add Consumption</button>

    <div class="container-fluid">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Location</th>
                <th>WH Name</th>
                <th>Bags</th>
                <th>Weight</th>
                <th>Date</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addConsumptionModal" tabindex="-1" role="dialog" aria-labelledby="addConsumptionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addConsumptionModalLabel">Add Consumption</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('consumption/add')}}" method="post" id="addForm">
        @csrf
        <div class="container">
            <div class="form-group row">
                <label for="wb_slip_no" class="col-sm-4">WB SLIP NO</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="wb_slip_no" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-4">DATE</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="date" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="location_id" class="col-sm-4">LOCATION</label>
                <div class="col-sm-8">
                    <select name="location_id" id="location_id" class="form-control" required>
                        <option value="" selected disabled>--Select--</option>
                        @foreach ($locations as $item)
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
                        <option value="">--select--</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="variety" class="col-sm-4">VARIETY</label>
                <div class="col-sm-8">
                    <select name="variety" id="con_variety" class="form-control" required>
                        <option value="" selected disabled>--Select--</option>
                        @foreach ($varieties as $k => $item)
                            <option value="{{ $item->id }}" data-opid="{{ $op_ids[$k] }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="truck_no" class="col-sm-4">TRUCK NO</label>
                <div class="col-sm-8">
                    <input type="number" name="truck_no" id="truck_no" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="bags" class="col-sm-4">NO OF BAGS</label>
                <div class="col-sm-8">
                    <input type="number" name="bags" id="bags" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="weight" class="col-sm-4">WEIGHT</label>
                <div class="col-sm-8">
                    <input type="number" name="weight" id="weight" min="0" class="form-control" required>
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
        ajax: "{{ url('consumption') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'location_id', name: 'location_id'},
            {data: 'wh_name', name: 'wh_name'},
            {data: 'bags', name: 'bags'},
            {data: 'weight', name: 'weight'},
            {data: 'date', name: 'date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection
