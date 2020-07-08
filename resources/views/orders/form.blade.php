@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @isset($item->id)
                            Edit
                        @else
                            New
                        @endisset
                        Order
                    </div>

                    <form action="{{ route('orders.update', ['order' => $item->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="status">Status</label>

                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                    <option value="unpaid"
                                            @if(old('status', $item->status ?? null) === 'unpaid') selected @endif>
                                        Unpaid
                                    </option>
                                    <option value="paid"
                                            @if(old('status', $item->status ?? null) === 'paid') selected @endif>Paid
                                    </option>
                                    <option value="processing"
                                            @if(old('status', $item->status ?? null) === 'processing') selected @endif>
                                        Processing
                                    </option>
                                    <option value="send"
                                            @if(old('status', $item->status ?? null) === 'send') selected @endif>Send
                                    </option>
                                    <option value="Done"
                                            @if(old('status', $item->status ?? null) === 'done') selected @endif>Done
                                    </option>
                                </select>

                                @error('status')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_title">Title</label>
                                <input class="form-control @error('customer_title') is-invalid @enderror"
                                       id="customer_title" type="text"
                                       name="customer_title" value="{{ old('customer_title', $item->customer_title) }}">
                                @error('customer_title')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text"
                                       name="slug" value="{{ old('slug') }}">
                                @error('slug')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" id="price" type="text"
                                       name="price" value="{{ old('price', 0.01) }}" min="0.01">
                                @error('price')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                       type="text"
                                       name="quantity" value="{{ old('quantity', 0) }}">
                                @error('quantity')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-sm btn-outline-success" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection