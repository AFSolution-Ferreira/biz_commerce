@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Carro
@endsection

@section('contentheader_title')
    CADASTRO DE CARRO
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
                    <form role="form" action="{{ route('car.save') }}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            @include('adminlte::car._form')
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-2 pull-right">
                                <a href="{{ route('car.save') }}">
                                    <button type="submit" class="btn pull-left btn-block btn-success">
                                        <span class="fa fa-plus"></span> CADASTRAR
                                    </button>
                                </a>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection