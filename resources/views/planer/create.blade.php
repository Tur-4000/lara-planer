@extends('layouts.app')

@section('content')

<div class="container col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h3>{{ $title }}</h3>

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="container">
            @php
                /** @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название задачи</label>
                                <input type="text"
                                       name="title"
                                       id="title"
                                       class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select name="category_id"
                                        id="category_id"
                                        class="form-control"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->category_id) selected @endif>
                                            {{ $categoryOption->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="due_date">Крайний срок</label>
                                <input type="date"
                                       name="due_date"
                                       id="due_date"
                                       class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="note">Примечание</label>
                                <textarea name="note"
                                          id="note"
                                          class="form-control"
                                          rows="3">{{ old('note', $item->note) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-1" role="group">
                    <button type="submit" class="btn btn-warning">
                        <span class="icon icon-floppy"></span>
                        Сохранить</button>
                    <a href="/" class="btn btn-info float-right">
                        <span class="icon icon-reply"></span> Назад к задачам</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
