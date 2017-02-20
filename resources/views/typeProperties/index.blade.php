@extends('layouts.dashboard')

@section('content')

    <section class="content-header">
        <h1 class="pull-left">List Type Property</h1>
        <h1 class="pull-right">
         <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">Create</a>
     </h1>
    </section>
    <div class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {{-- Include Table --}}
                @include('typeProperties.table')
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('typeProperties.form')
    @include('typeProperties.show')
    @include('typeProperties.delete')


<pre>@{{ $data }}</pre>

@endsection

{{--@section('title-content', 'Listing event types')--}}

@push('vue-scripts')
    {!! Html::script('js/models/typeProperty/config.js') !!}
    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        {{--var apiUrl = {
            store: "{{ route('api.eventTypes.store') }}/",
            show: "{{ route('api.eventTypes.show') }}/",
            update: "{{ route('api.eventTypes.update') }}/",
            delete: "{{ route('api.eventTypes.destroy') }}/"
        };--}}
    </script>
    {!! Html::script('js/crud.js') !!}
    <script type="text/javascript">
        var vm = window.vm;
        console.log(JSON.stringify(vm.token));
    </script>
@endpush