@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Features
                        <a class="btn btn-sm btn-outline-primary float-right" href="{{route('features.create')}}">+</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="{{ route('features.edit', ['feature' => $item->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('features.destroy', ['feature' => $item->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" onclick="return confirm('Do you really want to delete a record?');"
                                                   class="btn btn-sm btn-outline-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection