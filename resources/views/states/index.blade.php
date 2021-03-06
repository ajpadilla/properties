@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de estados</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('states.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('states.form')
    @include('states.show')
    @include('states.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    @include('states.countries.add')

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/state/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.states.store') }}/",
            update: "{{ route('api.states.update') }}/",
            show: "{{ route('api.states.show') }}/",
            delete: "{{ route('api.states.delete') }}/",
            foreign: {
                country: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.countries.select-list') }}"
                    },
                    store: {
                        method: 'POST',
                        url: "{{ route('api.countries.store') }}"
                    }
                },
                currency: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.currencies.select-list') }}"
                    },
                    store: {
                        method: 'POST',
                        url: "{{ route('api.currencies.store') }}"
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

        var loadCurrencies = function () {
            vm.getForeignData(vm.url.foreign.currency.select.url, 'currencyOptions', 'currency', 'select');
        };

        loadCountries();
        loadCurrencies();

        /**
         * Load currecies list after add new currency from add new item form
        */
        vm.$watch('localModals.country_ADD_inform', function (value) {
            if ( !value ) {
                loadCountries();
                loadCurrencies();
            }
        });

    </script>
@endpush