<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="content">
        @foreach ($data as $item)
            
        <a href="{{ route('GetOne', ['id' => $item->id]) }}">
            <div>
                <p>{{$item->name}}</p>
            </div>
        </a>
       
        @endforeach
    </div>
       
    {{-- </div>
    <form method="POST" action="{{ route('new-favourite') }}">
        @csrf
        @if(Auth::check())
            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        @endif
        <input type="hidden" name="id_project" value="1">
        <button type="submit" class="btn btn-primary">Tạo</button>
    </form> --}}
</body>
</html>