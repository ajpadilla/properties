@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado tipos de identificaciones</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('typeIdentifications.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('typeIdentifications.form')
    @include('typeIdentifications.show')
    @include('typeIdentifications.delete') 
    @include('layouts.modals.info')
    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/typeIdentification/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.typeIdentifications.store') }}/",
            update: "{{ route('api.typeIdentifications.update') }}/",
            show: "{{ route('api.typeIdentifications.show') }}/",
            delete: "{{ route('api.typeIdentifications.delete') }}/"
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;
        //console.log(JSON.stringify(vm.row));
    </script>
@endpush