@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Carros
@endsection

@section('contentheader_title')
    EDITAR CARRO
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
                <div class="box box-success">
                    {!! Form::model($car,['route'=>['car.update', $car->id], 'class'=>'form', 'method'=>'put']) !!}
                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            @include('adminlte::car._form')
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-2 pull-right">
                                <a href="{{ route('car.update', ['id' => $car->id]) }}">
                                    <button type="submit" class="btn pull-left btn-block btn-success">
                                        <span class="fa fa-plus"></span> ALTERAR
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-2 pull-right">
                                <a href="{{ route('car.index') }}">
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