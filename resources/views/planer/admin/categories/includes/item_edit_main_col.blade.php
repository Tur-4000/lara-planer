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
                        <select name="color_id"
                                id="color_id"
                                class="form-control"
                                required>
                            @foreach($colorList as $colorOption)
                                <option value="{{ $colorOption->id }}"
                                        @if($colorOption->id == $item->color_id) selected @endif>
                                    {{ $colorOption->name }}
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
                </div>
            </div>
        </div>
    </div>
</div>
