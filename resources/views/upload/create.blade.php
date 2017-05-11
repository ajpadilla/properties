@extends('layouts.dashboard')

@section('content')


    <section class="content-header">
        <h1 class="pull-left">Cargar archivo comuniadades</h1>
     </h1>
    </section>
    <section class="content" style="padding-top: 30px;">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'upload.import', 'method' => 'POST', 'role' => 'form','files' => true]) !!}
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    {!! Form::file('file') !!}
                    {!! Form::submit('submit'); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@push('vue-scripts')

@endpush