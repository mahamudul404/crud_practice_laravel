@extends('layouts.app')

@section('content')
    <div class="container">
        <form action=" {{ route('humans.update', $human->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value=" {{ $human->name }} " class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value=" {{ $human->email }} " class="form-control" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input name="age" value=" {{ $human->age }} " class="form-control" required>
            </div>

            <div class="form-group">
                <label for="name">Picture</label>
                <input type="file" name="picture" class="form-control">

                @if ($human->picture)
                    <img src="{{ asset('images/' . $human->picture) }}" width="100" alt="Human Picture">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Human Updated</button>
        </form>

    </div>
@endsection
