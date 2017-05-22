@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de intereses</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('interests.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('interests.form')
    @include('interests.show')
    @include('interests.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/interest/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.interests.store') }}/",
            update: "{{ route('api.interests.update') }}/",
            show: "{{ route('api.interests.show') }}/",
            delete: "{{ route('api.interests.delete') }}/",
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
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;

        var loadCountries = function () {
            vm.getForeignData(vm.url.foreign.country.select.url, 'countryOptions', 'country', 'select');
        };

    </script>
@endpush