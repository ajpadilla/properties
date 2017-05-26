@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de carteras</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('briefcases.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('briefcases.form')
    @include('briefcases.show')
    @include('briefcases.delete') 
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    @include('briefcases.interests.add')
    @include('briefcases.sanctions.add')
    @include('briefcases.dues.add')

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/briefcase/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.briefcases.store') }}/",
            show: "{{ route('api.briefcases.show') }}/",
            update: "{{ route('api.briefcases.update') }}/",
            delete: "{{ route('api.briefcases.delete') }}/",
            foreign: {
                community: {
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.communities.select-list') }}/"
                    },
                },
                property: {
                    byCommunity: {
                        method: 'GET',
                        url: "{{ route('api.v1.properties.byCommunity') }}/"
                    },
                },
                interest:{
                    index: {
                        method: 'GET',
                        url: "{{ route('briefcases.interests.index') }}/"
                    },
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.interests.select-list') }}/"
                    },
                    store: {
                        method: 'POST',
                        url: "{{ route('api.briefcases.interests.store') }}/"
                    }
                },
                sanction:{
                    index:{
                        method: 'GET',
                        url: "{{ route('briefcases.sanctions.index') }}/"
                    },
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.sanctions.select-list') }}/"
                    },
                    store: {
                        method: 'POST',
                        url: "{{ route('api.briefcases.sanctions.store') }}/"
                    }
                },
                due:{
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.dues.select-list') }}/"
                    },
                    store: {
                        method: 'POST',
                        url: "{{ route('api.briefcases.dues.store') }}/"
                    }
                }
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;

        var loadComminities = function () {
            vm.getForeignData(vm.url.foreign.community.select.url, 'communityOptions', 'community', 'select');
        };

        var loadInterests = function () {
            vm.getForeignData(vm.url.foreign.interest.select.url, 'interestOptions', 'interest', 'select');
        }

        var loadSanctions = function () {
            vm.getForeignData(vm.url.foreign.sanction.select.url, 'sanctionOptions', 'sanction', 'select');
        }

        var loadDues = function () {
            vm.getForeignData(vm.url.foreign.due.select.url, 'dueOptions', 'due', 'select');
        }

        loadComminities();
        loadInterests();
        loadSanctions();
        loadDues();

        var loadProperties = function () {
            vm.getForeignData(vm.url.foreign.property.byCommunity.url + vm.row.community_related.value, 'propertyOptions', 'property', 'byCommunity');
        };

        vm.$watch('row.community_related.value', function (value) {
            loadProperties();
        });

    </script>
@endpush