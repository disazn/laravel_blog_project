@extends('layouts.standard')

@section('title-block')
            Мой блог
@endsection

@section('content')
    <h1>Мой блог</h1>

    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('my-blog', ['sort' => 'desc']) }}"
        style="margin-left: 10%; width: 500px;height: 200px;" ><button class="btn btn-info"> сначала новые </button></a>

    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('my-blog', ['sort' => 'asc']) }}"
        style="margin-left: 10%; width: 500px;height: 200px;" ><button class="btn btn-secondary"> сначала старые </button></a>

    @foreach($data as $el)
        <div class="alert alert-info" style="margin-left: 10%; width: 500px;height: 200px;">
            <h3>{{ $el->message }}</h3>
            <p>{{ $el->email }}</p>
            <p><small>{{ $el->created_at }}</small></p>
            <a href="{{ route('one-blog', $el->id) }}"><button class="btn btn-warning">Детально</button></a>
        </div>
    @endforeach

@endsection
