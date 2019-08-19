@php
    /** @var \App\Models\WebColor $item */
@endphp
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h3>{{ $title }}</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название цвета</label>
                        <input name="title" value="{{ old('name', $item->title) }}"
                               id="title"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="name">WEB имя</label>
                        <input name="name" value="{{ old('name', $item->name) }}"
                               id="name"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="background">Код цвета фона</label>
                        <input name="background" value="{{ old('background', $item->background) }}"
                               id="background"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="color">Код цвета текста</label>
                        <input name="color" value="{{ old('color', $item->color) }}"
                               id="color"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>

                    <div class="col-md-12 mt-1" role="group">
                        <button type="submit" class="btn btn-warning">
                            <span class="icon icon-floppy"></span>
                            Сохранить</button>
                        <a href="{{ route('planer.admin.colors.index') }}" class="btn btn-info float-right">
                            <span class="icon icon-reply"></span> Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
