@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de propiedades</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('properties.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('properties.form')
    @include('properties.show')
    @include('properties.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    @include('properties.photos.add')

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/property/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.properties.store') }}/",
            show: "{{ route('api.properties.show') }}/",
            update: "{{ route('api.properties.update') }}/",
            delete: "{{ route('api.properties.delete') }}/",
            foreign: {
               type_property: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.typeProperties.select-list') }}/"
                    }
                },
                community: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.communities.select-list') }}/"
                    }
                },
                person: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.persons.select-list') }}/"
                    }
                },
                property_photo:{
                    store: {
                        method: 'POST',
                        url: "{{ route('api.properties.addPhoto') }}/"
                    }
                }
            }
    };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;

        var loadtypeProperties = function () {
            vm.getForeignData(vm.url.foreign.type_property.select.url, 'typePropertyOptions', 'type_property', 'select');
        };

        var loadCommunity = function () {
            vm.getForeignData(vm.url.foreign.community.select.url, 'communityOptions', 'community', 'select');
        };

        var loadPersons = function () {
            vm.getForeignData(vm.url.foreign.person.select.url, 'personOptions', 'person', 'select');
        };

        loadtypeProperties();
        loadCommunity();
        loadPersons();
    </script>
@endpush