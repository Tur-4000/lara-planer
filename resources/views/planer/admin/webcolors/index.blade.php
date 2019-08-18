@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-xl-7 col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6 align-middle">
                                <p class="h2">Цвета категорий</p>
                            </div>
                            <div class="col-6 align-middle">
                                <a href="{{ route('planer.admin.colors.create') }}" class="btn btn-outline-success float-right">Добавить</a>
                            </div>
                        </div>
                        <table class="table table-hover table-sm mt-3">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Цвет</th>
                                    <th>Код фона</th>
                                    <th>Код текста</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colors as $color)
                                    <tr>
                                        <td class="align-middle">{{ $color->id }}</td>
                                        <td class="align-middle">{{ $color->title }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('planer.admin.colors.edit', $color->id) }}" class="h3">
                                                 <span class="badge"
                                                       style="background:#{{ $color->background }};color:#{{ $color->color }}">
                                                    {{ $color->name }}
                                                </span>
                                            </a>
                                        </td>
                                        <td class="align-middle">{{ $color->background }}</td>
                                        <td class="align-middle">{{ $color->color }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
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
        </div>
@endsection
