@extends('layout.main')

@section('title')
    Create Product
@endsection

@section('content')
    {{--Show Error Messages--}}
    <div class="w-50 d-flex flex-column justify-content-center align-items-center mb-2">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="m-1 bg-danger d-flex justify-content-center w-100 p-1 rounded ">{{$error}}</div>
            @endforeach
        @endif
    </div>

    <h5 class="align-items-center">Create New Product</h5>
    <form enctype="multipart/form-data" method="POST" action="{{ route('products.create') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="number" class="form-control" id="price" placeholder="Price" name="price">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="guaranty" placeholder="guaranty" name="guaranty">
            </div>

            <div class="form-group col-md-4">
                <input type="number" class="form-control" id="points" max="5" min="0" step="0.5" placeholder="points" name="points">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="seller">Seller</label>
                <select id="seller" class="form-control" name="seller_id">
                    <option selected disabled>Choose...</option>
                    @if($sellers)
                        @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}">{{ $seller->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="category">Category</label>
                <select id="category" class="form-control" name="category_id">
                    <option selected disabled>Choose...</option>
                    @if($categories)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="photos">Product Photo</label>
            <input type="file" class="form-control" id="photos" name="photos[]" multiple accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
