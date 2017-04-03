@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de comunidades</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('communities.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('communities.form')
    @include('communities.show')
    @include('communities.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    @include('communities.photos.add')

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/community/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.communities.store') }}/",
            update: "{{ route('api.communities.update') }}/",
            show: "{{ route('api.communities.show') }}/",
            delete: "{{ route('api.communities.delete') }}/",
            foreign: {
                currency: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.currencies.select-list') }}/"
                    },
                    store: {
                        method: 'POST',
                        url: "{{ route('api.currencies.store') }}/"
                    }
                },
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
                type_community:{
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.typeCommunities.select-list') }}/"
                    }
                }
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

        var loadTypeCommunities = function () {
            vm.getForeignData(vm.url.foreign.type_community.select.url, 'typeCommunityOptions', 'type_community', 'select');
        };

        loadCountries();
        loadTypeCommunities();

        vm.$watch('row.country_related.value', function (value) {
            loadStates();
        });

         vm.$watch('row.state_related.value', function (value) {
            loadMunicipalities();
        });





    </script>
@endpush