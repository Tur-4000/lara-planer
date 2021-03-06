@php
    /** @var \App\Models\Category $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h3>{{ $title }}</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название категории</label>
                        <input name="name" value="{{ old('name', $item->name) }}"
                               id="name"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Цвет выделения</label>
                        <select name="web_color_id"
                                id="web_color_id"
                                class="form-control"
                                required>
                            @foreach($colorList as $colorOption)
                                <option value="{{ $colorOption->id }}"
                                        @if($colorOption->id == $item->web_color_id) selected @endif>
                                    {{ $colorOption->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description"
                                  id="description"
                                  class="form-control"
                                  rows="2">{{ old('description', $item->description) }}</textarea>
                    </div>

                    <div class="col-md-12 mt-1" role="group">
                        <button type="submit" class="btn btn-warning">
                            <span class="icon icon-floppy"></span>
                            Сохранить</button>
                        <a href="{{ route('planer.admin.categories.index') }}" class="btn btn-info float-right">
                            <span class="icon icon-reply"></span> Назад</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
