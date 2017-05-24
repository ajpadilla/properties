@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado de intereses para cartega de conjunto {{ $briefcase->id }}</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{{ route('briefcases') }}" style="margin-top: -10px;margin-bottom: 5px">Carteras</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('briefcases.interests.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('briefcases.interests.form')
    @include('briefcases.interests.show')
    @include('briefcases.interests.delete')
    @include('layouts.modals.info')

    {{-- Relation Modals --}}
    

    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/briefcase/interest/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.briefcases.store') }}/",
            show: "{{ route('api.v1.briefcases.interests.show', $briefcase->id) }}/",
            update: "{{ route('api.briefcases.update') }}/",
            delete: "{{ route('api.briefcases.delete') }}/",
            foreign: {
            }
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;
    </script>
@endpush