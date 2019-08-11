@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Категории</h1>
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('planer.admin.categories.create') }}" class="btn btn-primary">Добавить</a>
                </nav>
                <table class="table table-hover table-sm">
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Slug</th>
                        <th>Описание</th>
                    </tr>
                    @foreach($paginator as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('planer.admin.categories.edit', $item->id) }}">
                                    <span class="badge badge-{{ $item->color->name }}">{{ $item->name }}</span>
                                </a>
                            </td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </table>
                @if($paginator->total() > $paginator->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
