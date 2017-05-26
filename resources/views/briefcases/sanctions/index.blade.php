@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de sanciones para cartega de conjunto </h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{{ route('briefcases') }}" style="margin-top: -10px;margin-bottom: 5px">Carteras</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('briefcases.sanctions.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('briefcases.sanctions.form')
    @include('briefcases.sanctions.show')
    @include('briefcases.sanctions.delete')
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/briefcase/sanction/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.briefcases.store') }}/",
            show: "{{ route('api.v1.briefcases.sanctions.show', $briefcase->id) }}/",
            update: "{{ route('api.briefcases.update') }}/",
            delete: "{{ route('api.briefcases.delete') }}/",
            foreign: {
                sanction: {
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.briefcases.sanctions.show', $briefcase->id) }}/"
                    }, 
                    update: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.briefcases.sanctions.update', $briefcase->id) }}/"
                    },
                    delete: {
                        method: 'DELETE' ,
                        url: "{{ route('api.v1.briefcases.sanctions.delete', $briefcase->id) }}/"
                    }
                },
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;
    </script>
@endpush