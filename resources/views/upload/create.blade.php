@extends('layouts.dashboard')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cargar archivo comuniadades</h1>
     </h1>
    </section>
    <section class="content" style="padding-top: 30px;">
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'api.upload.file.import', 'method' => 'post', 'files' => true]) !!}
                    {!! Form::file('file') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@push('vue-scripts')

@endpush