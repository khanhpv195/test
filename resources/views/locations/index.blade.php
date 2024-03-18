@extends('layouts.app')

@section('content')
<div class="panel panel-flat">
    <h1>Locations</h1>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu sẽ được thêm bằng JavaScript -->
        </tbody>
    </table>


    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route("locations.data") }}',
                type: 'GET',
                success: function (response) {
                    $.each(response.data, function (index, location) {
                        $('table.datatable-basic tbody').append('<tr>' +
                            '<td>' + location.id + '</td>' +
                            '<td>' + location.name + '</td>' +
                            '<td>' + location.address + '</td>' +
                            '<td>' +
                            '<a href="{{ url("locations") }}/' + location.id + '" class="btn btn-info btn-xs">View</a>' +
                            '<a href="{{ url("locations") }}/' + location.id + '/edit" class="btn btn-primary btn-xs">Edit</a>' +
                            '<form action="{{ url("locations") }}/' + location.id + '" method="POST" style="display: inline;">' +
                            '@csrf' +
                            '@method("DELETE")' +
                            '<button type="submit" class="btn btn-danger btn-xs">Delete</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>');
                    });
                }
            });
        });
    </script>

</div>


@endsection