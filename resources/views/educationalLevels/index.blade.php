@extends('layouts.dashboard')

@section('content')
<div id="app">
    <section class="content-header">
        <h1 class="pull-left">Listado para nivel de educación</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click.prevent="modal('POST')">Create</a>
       </h1>
    </section>
   <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('educationalLevels.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('educationalLevels.form')
    @include('educationalLevels.show')
    @include('educationalLevels.delete') 
    @include('layouts.modals.info')
    <pre>@{{ $data }}</pre>
</div>
@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/educationalLevel/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = {
            store: "{{ route('api.educationalLevels.store') }}/",
            update: "{{ route('api.educationalLevels.update') }}/",
            show: "{{ route('api.educationalLevels.show') }}/",
            delete: "{{ route('api.educationalLevels.delete') }}/"
        };
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;
        //console.log(JSON.stringify(vm.row));
    </script>
@endpush