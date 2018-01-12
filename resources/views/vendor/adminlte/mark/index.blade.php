@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Lista de Montadora
@endsection

@section('contentheader_title')
    LISTA DE MONTADORA
@endsection

@section('contentheader_description')
    MÓDULO DE CADASTRO
@endsection

@section('main-content')
    <div class="box-body">
        <div class="col-md-12">
            @if (Session::has('msg'))
                <div class="alert alert-success alert-dismissible" role="alert"
                     style="margin-top: 10px; margin-bottom: 1px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p>{{ Session::get('msg') }}</p>
                </div>
            @endif
            <br>
            <div class="box box-success">
                <div class="box-header">
                    <div class="row form-group">
                        <div class="col-md-2">
                            <a href="{{ route('mark.create') }}">
                                <button type="submit" class="btn pull-left btn-block btn-success">
                                    <span class="fa fa-plus"></span> CADASTRAR
                                </button>
                            </a>
                        </div>
                        <form action="{{ route('mark.index') }}" method="get" class="col-md-10">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="search"
                                       placeholder="PESQUISAR ..." style="text-transform:uppercase"
                                value="{{ isset($search) ? $search: '' }}" >
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        </form>
                        {{--{!! Form::open(['route'=>'mark.index', ]) !!}--}}
                        {{--<div class="input-group custom-search-form col-xs-10">--}}
                            {{--{!! Form::text('search', null, ['class'=>'form-control', 'placeholder'=>'PESQUISAR', 'style'=>'text-transform:uppercase']) !!}--}}
                        {{--</div>--}}
                        {{--{!! Form::close() !!}--}}
                    </div>
                </div>
                {{--<div class="panel-body">--}}
                <div class="box-body table-responsive">
                    @if($marks->count() > 0)
                    <table class="table table-striped" id="tbl-mark">
                        <thred>
                            <tr>
                                <th class="col-xs-3">MARCA</th>
                                <th class="col-xs-6">NOME</th>
                                <th class="col-xs-3">AÇÃO</th>
                            </tr>
                        </thred>
                        <tbody>
                        @foreach($marks as $mark)
                            <tr>
                                <td class="center"><img height="75" src="{{ asset($mark->image )}}"></td>
                                <td style="text-transform:uppercase">{{ $mark->name }}</td>
                                <td>
                                    <a href="{{ route('mark.edit', ['id' => $mark->id])}}">
                                        <button class="btn btn-info">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#viewModal{{$mark->id}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{$mark->id}}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>

                            {{--DIALOG DELETAR--}}
                            <div class="modal fade" id="deleteModal{{$mark->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-padrao4">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"><i
                                                        class="fa fa-exclamation-triangle"></i> ATENÇÃO</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>DESEJA REALMENTE DELETAR <b
                                                        style="text-transform:uppercase">{{$mark->name}}</b>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                CANCELAR
                                            </button>
                                            <a href="{{route('mark.delete', ['id' => $mark->id])}}"
                                               class="btn btn-danger">EXCLUIR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--MODAL VISUALIZAR--}}
                            <div class="modal fade" id="viewModal{{$mark->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-padrao2">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel" style="text-transform:uppercase">INFORMAÇÕES DA MONTADORA
                                                - {{$mark->name}}</h4>
                                        </div>
                                        <div class="modal-body">

                                            <p style="text-transform:uppercase"><b>NOME:</b> {{$mark->name}}</p>
                                            <p style="text-transform:uppercase"><b>DESCRIÇÃO:</b> {{$mark->description}}</p>
                                            <img height="300" src="{{ asset($mark->image )}}">
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                SAIR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <p>SEM INFORMAÇÕES CADASTRADAS DE MONTADORAS</p>
                        @endif
                        </tbody>
                    </table>
                    <div class="box-footer">
                        <div class="col-md-4">
                            {{ $marks->appends(['search' => $search])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


