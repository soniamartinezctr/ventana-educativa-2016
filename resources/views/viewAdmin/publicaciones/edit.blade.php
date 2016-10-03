@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Publicacion {{ $Publicacion->id }}</h1>

    {!! Form::model($Publicacion, [
        'method' => 'PATCH',
        'url' => ['/admin/publicaciones', $Publicacion->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
                {!! Form::label('imagen', 'Imagen', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('imagen', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('imagen', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                {!! Form::label('titulo', 'Titulo', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('titulo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('autor') ? 'has-error' : ''}}">
                {!! Form::label('autor', 'Autor', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('autor', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('autor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
                {!! Form::label('categoria', 'Categoria', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('categoria', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('url_descarga') ? 'has-error' : ''}}">
                {!! Form::label('url_descarga', 'Url Descarga', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('url_descarga', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('url_descarga', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pais') ? 'has-error' : ''}}">
                {!! Form::label('pais', 'Pais', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('pais', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pais', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
                {!! Form::label('created_at', 'Created At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'created_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('updated_at') ? 'has-error' : ''}}">
                {!! Form::label('updated_at', 'Updated At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'updated_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('updated_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection