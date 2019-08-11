@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\WebColor $item */
    @endphp

    @if($item->exists)
        <form action="{{ route('planer.admin.colors.update', $item->id) }}" method="post">
        @method('PATCH')
    @else
        <form action="{{ route('planer.admin.colors.store') }}" method="post">
    @endif

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
                    <div class="col-md-8">
                        @include('planer.admin.webcolors.includes.item_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('planer.admin.webcolors.includes.item_edit_add_col')
                    </div>
                </div>
            </div>
        </form>
@endsection
