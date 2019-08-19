@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('planer.includes.messages')
                        <div class="card-title">
                            <h1>{{ $title }}</h1>
                        </div>
                        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                            <a href="{{ route('tasks.create') }}" class="btn btn-outline-success">
                                <span class="icon icon-list-add"></span>
                                Добавить задачу
                            </a>
                            <a href="{{ route('tasks.closed') }}" class="btn btn-outline-secondary float-right">
                                <span class="icon icon-check"></span>
                                Закрытые задачи
                            </a>
                        </nav>
                        <table class="table table-hover table-sm">
                            <thead class="thead-light">
                            <tr>
                                <th width="40px"></th>
                                <th width="200px">Срок</th>
                                <th width="140px"></th>
                                <th>Задача</th>
                                <th>Примечание</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                <tr>
                                    <td><a href="{{ route('tasks.edit', $item->id) }}">
                                            <span class="icon icon-pencil"></span>
                                        </a>
                                    </td>
                                    <td>{{ Date::parse($item->due_date)->format('(D) j F Y') }}</td>
                                    <td><span class="badge badge-{{ $item->category->webColor->name }}">{{ $item->category->name }}</span></a>
                                    </td>
                                    <td><a href="{{ route('tasks.show', $item->id) }}">{{ $item->title }}</a></td>
                                    <td>{{ $item->note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
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
        </div>

@endsection
