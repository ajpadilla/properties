@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de municipios</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('municipalities.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('municipalities.form')
    @include('municipalities.show')
    @include('municipalities.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    @include('municipalities.states.add')

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/municipality/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.municipalities.store') }}/",
            update: "{{ route('api.municipalities.update') }}/",
            show: "{{ route('api.municipalities.show') }}/",
            delete: "{{ route('api.municipalities.delete') }}/",
            foreign: {
                state: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.states.select-list') }}"
                    },
                    store: {
                        method: 'POST',
                        url: "{{ route('api.states.store') }}"
                    }
                },
                country: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.countries.select-list') }}"
                    },
                },
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;

        var loadStates = function () {
            vm.getForeignData(vm.url.foreign.state.select.url, 'stateOptions', 'state', 'select');
        };

        var loadCountries = function () {
            vm.getForeignData(vm.url.foreign.country.select.url, 'countryOptions', 'country', 'select');
        };

        loadStates();
        loadCountries();

        /**
         * Load currecies list after add new currency from add new item form
        */
        vm.$watch('localModals.state_ADD_inform', function (value) {
            if ( !value ) {
                loadStates();
                loadCountries();
            }
        });

    </script>
@endpush