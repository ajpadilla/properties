@extends('layouts.dashboard')

@section('content')
    Blade Type Property
    <my-vuetable url="{{ route('api.typeProperties.index') }}" :columns="columns">
    </my-vuetable>
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
        //var vm = window.vm;
    </script>
@endpush