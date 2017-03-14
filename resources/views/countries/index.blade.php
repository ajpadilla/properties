@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de países</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('countries.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('countries.form')
    @include('countries.show')
    @include('countries.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}

    @include('countries.currencies.add')

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/country/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.countries.store') }}/",
            update: "{{ route('api.countries.update') }}/",
            show: "{{ route('api.countries.show') }}/",
            delete: "{{ route('api.countries.delete') }}/",
            foreign: {
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

        var loadCurrencies = function () {
            vm.getForeignData(vm.url.foreign.currency.select.url, 'currencyOptions', 'currency', 'select');
        };

        loadCurrencies();

        /**
         * Load currecies list after add new currency from add new item form
        */
        vm.$watch('localModals.currency_ADD_inform', function (value) {
            if ( !value ) {
                loadCurrencies();
            }
        });

    </script>
@endpush