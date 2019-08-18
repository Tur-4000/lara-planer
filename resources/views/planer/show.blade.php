@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="display-4 mb-0">
                                {{ $task->title }}
                            </h1>
                            <h3>
                                <span class="badge" style="background:#{{ $task->category->webColor->background }};color:#{{ $task->category->webColor->color }}">{{ $task->category->name }}</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="lead mb-0"><b>Срок завершения:</b> {{ Date::parse($task->due_date)->format('j F Y г.') }}</p>
                            <p class="lead"><strong>Дата закрытия:</strong>
                                {{ isset($task->end_date) ? Date::parse($task->end_date)->format('j F Y г.') : 'в работе' }}
                            </p>
                            @isset($task->note)
                                <p>{{ $task->note }}</p>
                            @endisset

                            <fieldset class="px-2">
                                <legend>Завершить задачу</legend>
                                <form action="" method="get" class=""><div class="form-group mt-2">
                                        <label for="end_date">Дата завершения</label>
                                        <input type="date"
                                               name="end_date"
                                               id="end_date"
                                               class="form-control"
                                               required>
                                    </div>
                                    <div class="card">
                                        <div class="card-body pb-1">
                                            <div class="card-title">
                                                <h4>Создать новую задачу из текущей</h4>
                                            </div>
                                            <div class="form-check">
                                                <input name="is_clone"
                                                       type="hidden"
                                                       value="0">
                                                <input name="is_clone"
                                                       type="checkbox"
                                                       class="form-check-input"
                                                       value="1"
                                                       checked="checked">
                                                <label class="form-check-label" for="is_clone">Создать новую задачу</label>
                                            </div>

                                            <div class="form-group mt-1">
                                                <label for="due_date">Следующий крайний срок</label>
                                                <input type="date"
                                                       name="due_date"
                                                       id="due_date"
                                                       class="form-control"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="note">Примечание к новой задаче</label>
                                                <textarea name="note"
                                                          id="note"
                                                          class="form-control"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 my-3" role="group">
                                        <button type="submit" class="btn btn-warning">
                                            <span class="icon icon-floppy"></span>
                                            Сохранить</button>
                                        <a href="/" class="btn btn-info float-right">
                                            <span class="icon icon-reply"></span> Назад к задачам</a>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
