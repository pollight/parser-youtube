@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Список товаров</h1>
    <table id="table_id" class="table table-striped table-bordered table-hover">
        <thead>
        <th>id</th>
        <th>name</th>
        <th>link_1</th>
        <th>url_1</th>
        <th>link_3</th>
        <th>url_2</th>
        <th>link_3</th>
        <th>url_3</th>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>
                    <a target="_blank" href="{{ $product->link_id_1 }}">{{ $product->link_name_1 }}</a></td>
                <td>{{ $product->link_id_1 }}</td>
                <td><a target="_blank" href="{{ $product->link_id_2 }}">{{ $product->link_name_2 }}</a></td>
                <td>{{ $product->link_id_2 }}</td>
                <td><a target="_blank" href="{{ $product->link_id_3 }}">{{ $product->link_name_3 }}</a></td>
                <td>{{ $product->link_id_3 }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
