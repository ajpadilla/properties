@extends('layouts.dashboard')

@section('content')
    Blade Type Property
    
    {{-- Include Table --}}
    @include('typeProperties.table');

    {{-- Modals --}}
    @include('typeProperties.form');
    @include('typeProperties.show');
    @include('typeProperties.delete');


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
        console.log(JSON.stringify(vm.algo));
    </script>
@endpush