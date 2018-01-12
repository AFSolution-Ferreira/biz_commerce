@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Montadora
@endsection

@section('contentheader_title')
    CADASTRO DE MONTADORA
@endsection

@section('contentheader_description')
    MÓDULO DE CADASTRO
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                {{--VALIDACAO DE ERRROS--}}
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                {{--VALIDACOES DO FORMULARIOS--}}
                <div class="box box-primary">
                    {!! Form::open(['route' => 'mark.save', 'class'=>'form', 'files' => true]) !!}
                        <div class="box-body">
                            @include('adminlte::mark._form')
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-2 pull-right">
                                <a href="{{ route('mark.save') }}">
                                    <button type="submit" class="btn pull-left btn-block btn-success">
                                        <span class="fa fa-plus"></span> CADASTRAR
                                    </button>
                                </a>
                                </a>
                            </div>
                            <div class="col-md-2 pull-right">
                                <a href="{{ route('mark.index') }}">
                                    <button type="button" class="btn pull-left btn-block btn-danger">
                                        <span class="fa fa-times"></span> CANCELAR
                                    </button>
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection