@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Category $item */
    @endphp

    @if($item->exists)
        <form action="{{ route('planer.admin.categories.update', $item->id) }}" method="post">
            @method('PATCH')
    @else
        <form action="{{ route('planer.admin.categories.store') }}" method="post">
    @endif
            @csrf
            <div class="container">
                @include('planer.admin.categories.includes.item_messages')

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('planer.admin.categories.includes.item_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('planer.admin.categories.includes.item_edit_add_col')
                    </div>
                </div>

            </div>
        </form>
@endsection
