<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halo</title>
</head>
<body>
    @include('directives.loop')
    @include('directives.loop', ['name' => 'jong koding'])

    @includeIf('directives.conditional')
    @includeWhen($boolean, 'directives.conditional')
    @includeUnless($boolean, 'directives.conditional')

    @includeFirst(['view.name', 'variable'], ['data' => 'additional'])
    {{-- <h1>halo aku {{$name}}</h1> --}}
    {{-- if statment blade --}}
    @if ($name == "")
        <h1>Maaf aku tidak punya nama</h1>
    @elseif($nama == "Jong Koding")
        <h1>Halo, aku {{$nama}}</h1>
    @else
        <h1>Halo Aku bukan jong koding</h1>
    @endif
{{-- switch statement blade --}}
    @switch($name)
        @case("jong koding")
            <h1>Halo, aku {{$nama}}</h1>
            @break
        @case("")
            <h1>Maaf aku tidak punya nama</h1>
            @break
        @default
            <h1>Halo Aku bukan jong koding</h1>
    @endswitch ()
    {{-- auth statement blade --}}
    @auth
        <h1>user sudah login</h1>
    @endauth
    @guest
        <h1>user tidak login</h1>
    @endguest

    {{-- loops --}}
    {{-- for loops --}}
    @for ($i =0 ;$i  <body 10 ; $i++)
        the current value is {{$i}}
    @endfor
    {{-- foreach --}}
    @foreach ($users as $user )
    @if ($loop->first)
           Ini adalah index pertama
       @endif 
       @if ($loop->last)
           Ini adalah index terakhir
       @endif 
        <p>This user {{$user->id}}</p>
    @endforeach
    @forelse ($users as $user )
        <p>This user {{$user->id}}</p>
    @empty
    <p>No users</p>
    @endforelse
    @while (true)
        <p>I'm looping forever</p>
    @endwhile

    {{--Raw PHP--}}
    @php
        $count = 1;
    @endphp
    @php
    $isActive = false;
    $isError = true;
    @endphp

    <span @class([
        'p-4', 'font-bold' => $isActive,
        'text-gray-500' => $isActive,
        'bg-red' => $isError,
    ])></span>
    <span class="p-4 text-gray-500 bg-red"></span>

    {{-- forms --}}
    <form action="" method="POST" action="/users">
        @csrf
    </form>

    <form action="" method="POST" action="/users">
        @csrf
        @method('PUT')
    </form>

    {{-- label --}}
    <form action="" method="POST" action="/users">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" class="@error('name') is-invalid @enderror">

        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </form>
</body>
</html>