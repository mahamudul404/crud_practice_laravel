@extends('layouts.app')

@section('content')
    <div class="container">
        <form action=" {{ route('humans.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="name">Picture</label>
                <input type="file" name="picture" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">User Create</button>
        </form>

    </div>
@endsection
