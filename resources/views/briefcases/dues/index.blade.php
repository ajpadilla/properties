@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de cuotas para cartega de conjunto </h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{{ route('briefcases') }}" style="margin-top: -10px;margin-bottom: 5px">Carteras</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('briefcases.dues.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('briefcases.dues.form')
    @include('briefcases.dues.show')
    @include('briefcases.dues.delete')
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/briefcase/due/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.briefcases.store') }}/",
            show: "{{ route('api.v1.briefcases.dues.show', $briefcase->id) }}/",
            update: "{{ route('api.briefcases.update') }}/",
            delete: "{{ route('api.briefcases.delete') }}/",
            foreign: {
                due: {
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.briefcases.dues.show', $briefcase->id) }}/"
                    }, 
                    update: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.briefcases.dues.update', $briefcase->id) }}/"
                    },
                    delete: {
                        method: 'DELETE' ,
                        url: "{{ route('api.v1.briefcases.dues.delete', $briefcase->id) }}/"
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