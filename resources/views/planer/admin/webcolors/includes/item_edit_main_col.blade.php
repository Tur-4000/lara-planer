@php
    /** @var \App\Models\WebColor $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название цвета</label>
                        <input name="name" value="{{ old('title', $item->name) }}"
                               id="name"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
