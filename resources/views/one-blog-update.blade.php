{{--@if(auth()->user()->email === $data->email)--}}
@extends('layouts.standard')

@section('title-block')
    Редактировать блог
@endsection

@section('content')
    <h1>Редактировать блог</h1>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-left: 10%; width: 500px;height: 50px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('one-blog-update-post', $blog->id)}}" method="post">

        @csrf
        <div class="form-group" style="margin-left: 10%; width: 500px;height: 100px;">
            <label for="message"> Блог </label>
            <textarea name="message" id="message" class="form-control" placeholder="Enter your message">{{ $blog->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success" style="margin-left: 500px">Редактировать</button>
    </form>

@endsection
{{--@endif--}}
