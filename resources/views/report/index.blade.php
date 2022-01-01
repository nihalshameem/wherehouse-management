@extends('layouts.app')

@section('content')
<div class="">

{{-- <a href="{{ url('receipt/add') }}" type="button" class="btn btn-primary d-inline">Add Receipt</a> --}}

    <div class="container-fluid">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Receipt</th>
                <th>consumption</th>
                <th>Shifting</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
@endsection

@section('datatables')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('report') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'receipt', name: 'receipt'},
            {data: 'consumption', name: 'consumption'},
            {data: 'shifting', name: 'shifting'},
            {data: 'date', name: 'date'},
        ]
    });
    
  });
</script>
@endsection
