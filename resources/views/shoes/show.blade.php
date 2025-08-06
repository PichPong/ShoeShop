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

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="text-end m-2">
                    <a href="{{ route('Auth.logout') }}" class="btn btn-danger" onclick="return confirm('Are you sure to logout account?')">Logout</a>
                    <a href="{{ route('shoes.create') }}" class="btn btn-primary">Add Products</a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Product List</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock_qty</th>
                                    <th>Brand</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shoes as $shoe)
                                    <tr>
                                        <td>{{ $shoe->id }}</td>
                                        <td><img src="{{ asset('/uploads/' . $shoe->image) }}" width="60" height="70"
                                                alt="Product Photo"></td>
                                        <td>{{ $shoe->name }}</td>
                                        <td>${{ number_format($shoe->price, 2) }}</td>
                                        <td>{{ $shoe->stock_qty }}</td>
                                        <td>{{ $shoe->brand }}</td>
                                        <td>{{ Str::limit($shoe->description, 40) }}</td>
                                        <td>{{ $shoe->created_at->diffForHumans() }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('shoes.edit', $shoe->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('shoes.delete', $shoe->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>