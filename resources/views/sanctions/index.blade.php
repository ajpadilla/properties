@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de sanciones</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('sanctions.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('sanctions.form')
    @include('sanctions.show')
    @include('sanctions.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/sanction/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.sanctions.store') }}/",
            update: "{{ route('api.sanctions.update') }}/",
            show: "{{ route('api.sanctions.show') }}/",
            delete: "{{ route('api.sanctions.delete') }}/",
            foreign: {
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;
    </script>
@endpush