@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Цвета категорий</h1>
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('planer.admin.colors.create') }}" class="btn btn-primary">Добавить</a>
                </nav>
                <table class="table table-hover table-sm">
                    <tr>
                        <th>#</th>
                        <th>Цвет</th>
                    </tr>
                    @foreach($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>
                                <a href="{{ route('planer.admin.colors.edit', $color->id) }}">
                                    {{ $color->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @if($colors->total() > $colors->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{ $colors->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
