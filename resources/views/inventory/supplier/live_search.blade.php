@extends('layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <body style="background-color: #e8ffe6;">
    <div class="container">
        <div class="container box">
            <h3 align="center"></h3><br/>
            <div class="panel panel-default">
                <div class="panel-heading">Search Supplier Data</div>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control"
                               placeholder="Search Supplier Data"/>
                    </div>
                    <div class="table-responsive">
                        <h3 align="center">Total Data : <span id="total_records"></span></h3>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Supplier ID</th>
                                <th scope="col"> Email</th>
                                <th scope="col">Contact Details</th>
                                <th scope="col">Type</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 15px">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/inventory" class="btn btn-outline-info text1">INVENTORY DASHBOARD</a>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('live_search.action') }}",
                    method: 'GET',
                    data: {query: query},
                    dataType: 'json',
                    success: function (data) {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function () {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endsection