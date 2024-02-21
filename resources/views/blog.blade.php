@extends('layouts.standard')

@section('title') Написать блог @endsection

@section('content')
    <br>
    <br>
    <br>

    <h1>Написать блог</h1>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-left: 10%; width: 500px;height: 50px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blog-create') }} " method="post">
        @csrf
        <div class="form-group" style="margin-left: 10%">
            <textarea name="message" style="width: 500px; height: 100px" id="message" class="form-control" placeholder="Блогынызды жазыныз"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="margin-left: 580px">Сақтау</button>
    </form>
@endsection
