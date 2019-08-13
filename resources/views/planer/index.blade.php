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
                            <td>{{ \Carbon\Carbon::parse($item->due_date)->format('d.M.Y') }}</td>
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

                @foreach($paginator as $item)
                <div class="row mb-1">
                    <div class="col-2 pr-1">
                        <div class="card">
                            <div class="card-body">
                                {{ \Carbon\Carbon::parse($item->due_date)->format('d.M.Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pl-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    {{ $item->title }}
                                    <a href="">
                                        <span class="badge badge-{{ $item->category->webColor->name }}">{{ $item->category->name }}</span>
                                    </a>
                                </div>
                                {{ $item->note }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

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
