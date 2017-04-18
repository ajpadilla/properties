@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de personas</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('persons.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('persons.form')
    @include('persons.show')
    @include('persons.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/person/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.persons.store') }}/",
            {{--update: "{{ route('api.states.update') }}/",
            show: "{{ route('api.states.show') }}/",
            delete: "{{ route('api.states.delete') }}/",--}}
            foreign: {
               country: {
                select: {
                    method: 'GET',
                    url: "{{ route('api.v1.countries.select-list') }}/"
                }
            },
            state: {
                byCountry: {
                    method: 'GET',
                    url: "{{ route('api.v1.states.byCountry') }}/"
                }
            },
            municipality:{
                select: {
                    method: 'GET',
                    url: "{{ route('api.v1.municipalities.select-list') }}/"
                },
                byState: {
                    method: 'GET',
                    url: "{{ route('api.v1.municipalities.byState') }}/"
                }
            },
            disability:{
                select: {
                    method: 'GET',
                    url: "{{ route('api.v1.disabilities.select-list') }}/"
                },
            },
            educational_level:{
                select: {
                    method: 'GET',
                    url: "{{ route('api.v1.educationalLevels.select-list') }}/"
                },
            },
            type_identification:{
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

        var loadCountries = function () {
            vm.getForeignData(vm.url.foreign.country.select.url, 'countryOptions', 'country', 'select');
        };

        var loadStates = function () {
            console.log(vm.url.foreign.state.byCountry.url + vm.row.country_related.value);
            vm.getForeignData(vm.url.foreign.state.byCountry.url + vm.row.country_related.value, 'stateOptions', 'state', 'byCountry');
        };

        var loadMunicipalities = function () {
            vm.getForeignData(vm.url.foreign.municipality.byState.url + vm.row.state_related.value, 'municipalityOptions', 'municipality', 'byState');
        };

        var loadDisability = function () {
            vm.getForeignData(vm.url.foreign.disability.select.url, 'disabilityOptions', 'disability', 'select');
            console.log();
        }

        var loadEducationalLevel = function () {
            vm.getForeignData(vm.url.foreign.educational_level.select.url, 'educationalLevelOptions', 'educational_level', 'select');
        }

        var loadTypeIdentification = function () {
            vm.getForeignData(vm.url.foreign.type_identification.select.url, 'typeIdentificationOptions', 'type_identification', 'select');
        }


        loadCountries();
        loadDisability();
        loadEducationalLevel();
        loadTypeIdentification();

        vm.$watch('row.country_related.value', function (value) {
            loadStates();
        });

         vm.$watch('row.state_related.value', function (value) {
            loadMunicipalities();
        });

    </script>
@endpush