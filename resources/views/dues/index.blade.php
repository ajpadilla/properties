@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de cuotas</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('dues.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('dues.form')
    @include('dues.show')
    @include('dues.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/due/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.dues.store') }}/",
            update: "{{ route('api.dues.update') }}/",
            show: "{{ route('api.dues.show') }}/",
            delete: "{{ route('api.dues.delete') }}/",
            foreign: {
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;
    </script>
@endpush