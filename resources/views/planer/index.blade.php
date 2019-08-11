@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Скоро</h1>
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('planer.create') }}" class="btn btn-outline-success">
                        Добавить задачу
                    </a>
                </nav>
                <table class="table table-hover table-sm">
                    <tr>
                        <th>Срок</th>
                        <th></th>
                        <th>Задача</th>
                        <th>Примечание</th>
                    </tr>
                    @foreach($paginator as $item)
                        <tr>
                            <td>{{ $item->due_date }}</td>
                            <td>
                                <a href="">
                                    <span class="badge badge-{{ $item->category->webColor->name }}">{{ $item->category->name }}</span>
                                </a>
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->note }}</td>
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
