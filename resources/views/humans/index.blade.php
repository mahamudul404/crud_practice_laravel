@extends('layouts.app')

@section('content')
    <div class="container">
        <a href=" {{ route('humans.create') }} " class="btn btn-primary mb-3">Add user</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($humans as $human)
                    <tr>
                        <td> {{ $human->name }} </td>
                        <td> {{ $human->email }} </td>
                        <td> {{ $human->age }} </td>
                        <td>

                            @if ($human->picture)
                                <img src="{{ asset('images/' . $human->picture) }}" width="100" alt="User Picture">
                            @endif
                        </td>
                        <td>
                            <a href=" {{ route('humans.edit', $human->id) }} " class="btn btn-warning">Edit</a>
                            <form action=" {{ route('humans.destroy', $human->id) }} " method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
