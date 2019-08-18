@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6"><p class="h2 my-auto py-auto">Категории</p></div>
                            <div class="col-6">
                                <a href="{{ route('planer.admin.categories.create') }}" class="btn btn-outline-success float-right">Добавить</a>
                            </div>
                        </div>
                        <table class="table table-hover table-sm mt-3">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Slug</th>
                                <th>Описание</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ route('planer.admin.categories.edit', $item->id) }}">
                                            <span class="badge"
                                                  style="background:#{{ $item->webColor->background }};color:#{{ $item->webColor->color }}">
                                                {{ $item->name }}
                                            </span>
                                        </a>
                                    </td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->description }}</td>
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
