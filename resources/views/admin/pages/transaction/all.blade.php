@extends('admin.layouts.master')

@section('title')All Transactions @endsection

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>All Transactions</strong></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Fee</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function () {
          
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('transaction.all') }}",
          columns: [
              {data: 'date', name: 'date'},
              {data: 'transaction_type', name: 'transaction_type'},
              {data: 'amount', name: 'amount'},
              {data: 'fee', name: 'fee'},
              {data: 'created_at', name: 'created_at'},
          ]
      });
          
    });
  </script>
@endsection


