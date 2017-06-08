@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de proveedores</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('suppliers.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('suppliers.form')
    @include('suppliers.show')
    @include('suppliers.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/supplier/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.suppliers.store') }}/",
            show: "{{ route('api.suppliers.show') }}/",
            update: "{{ route('api.suppliers.update') }}/",
            delete: "{{ route('api.suppliers.delete') }}/",
            foreign: {
                type_identification: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.typeIdentifications.select-list') }}/"
                    },
                },
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;

        var loadTypeIdentification = function () {
            vm.getForeignData(vm.url.foreign.type_identification.select.url, 'typeIdentificationOptions', 'type_identification', 'select');
        };

        loadTypeIdentification();

    </script>
@endpush