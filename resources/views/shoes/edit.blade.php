<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container w-50 mt-3">
        <h2 class="text-center">Update Shoes</h2>
        <form action="{{ route('shoes.update', $shoe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="" class="form-label">Name:</label>
                <input type="text" class="form-control" placeholder="name" name="name" value="{{ $shoe->name }}">
            </div>
            <div class="form-group mt-2">
                <label for="" class="form-label">Price:</label>
                <input type="text" class="form-control" placeholder="price" name="price" value="{{ $shoe->price }}">
            </div>
            <div class="form-group mt-2">
                <label for="" class="form-label">Stock Quantity:</label>
                <input type="text" class="form-control" placeholder="stock" name="stock_qty"
                    value="{{ $shoe->stock_qty }}">
            </div>
            <div class="form-group mt-2">
                <label for="" class="form-label">Brand:</label>
                <select class="form-select" name="brand" id="">
                    <option value="Nike" {{ $shoe->brand == 'Nike' ? 'selected' : '' }}>Nike
                    </option>
                    <option value="Adidas" {{ $shoe->brand == 'Adidas' ? 'selected' : '' }}>Adidas
                    </option>
                    <option value="Puma" {{ $shoe->brand == 'Puma' ? 'selected' : '' }}>Puma
                    </option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="" class="form-label">Picture:</label>
                <input type="file" name="image" class="form-control mb-2">
                @if ($shoe->image)
                    <img src="{{ asset('uploads/' . $shoe->image) }}" alt="" width="80px">
                @endif
            </div>
            <div class="form-group mt-2">
                <label for="" class="form-label">Description:</label>
                <textarea name="description" id="" class="form-control">{{ $shoe->description }}</textarea>
            </div>
            <div class="form-group mt-2">
                <a href="{{ route('shoes.show') }}" class="btn btn-danger p-2">Back</a>
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>