@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Lista de Carros
@endsection

@section('contentheader_title')
    LISTA DE CARROS
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
            <div class="box box-primary">
                <div class="box-header">
                    <div class="row form-group">
                        <div class="col-md-2">
                            <a href="{{ route('car.create') }}">
                                <button type="submit" class="btn pull-left btn-block btn-primary">
                                    <span class="fa fa-plus"></span> CADASTRAR
                                </button>
                            </a>
                        </div>
                        <form action="{{ route('car.index') }}" method="get" class="col-md-10">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="search"
                                       placeholder="PESQUISAR ..."
                                       value="{{ isset($search) ? $search: '' }}"
                                       style="text-transform:uppercase">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                {{--<div class="panel-body">--}}
                    <div class="box-body table-responsive">
                    @if($cars->count() > 0)
                    <table class="table table-striped" id="tbl-car">
                        <thred>
                            <tr>
                                <th>IMAGEM</th>
                                <th>NOME</th>
                                <th>PREÇO</th>
                                <th>AÇÃO</th>
                            </tr>
                        </thred>
                        <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td class="center"><img height="75" src="{{ asset($car->image )}}"></td>
                                    <td style="text-transform:uppercase">{{ $car->name }}</td>
                                    <td style="text-transform:uppercase">R$ {{ $car->price }}</td>
                                    <td>
                                        <a href="{{ route('car.edit', ['id' => $car->id]) }}">
                                            <button class="btn btn-info">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <button class="btn btn-warning" data-toggle="modal"
                                                data-target="#viewModal{{$car->id}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{$car->id}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            {{--DIALOG DELETAR--}}
                                <div class="modal fade" id="deleteModal{{$car->id}}" tabindex="-1" role="dialog"
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
                                            <p>DESEJA REALMENTE DELETAR O CARRO <b style="text-transform:uppercase">{{$car->name}}</b>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                CANCELAR
                                            </button>
                                            <a href="{{route('car.delete', ['id' => $car->id])}}"
                                               class="btn btn-danger">EXCLUIR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="modal fade" id="viewModal{{$car->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-padrao2">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel" style="text-transform:uppercase">INFORMAÇÕES DA MONTADORA
                                                    - {{$car->name}}</h4>
                                            </div>
                                            <div class="modal-body">

                                                <p style="text-transform:uppercase"><b>NOME:</b> {{$car->name}}</p>
                                                <p style="text-transform:uppercase"><b>DESCRIÇÃO:</b> {{$car->description}}</p>
                                                <p style="text-transform:uppercase"><b>PREÇO ATUAL:</b> R${{$car->price}}</p>
                                                <p style="text-transform:uppercase"><b>ANO DE FABRICAÇÃO:</b> {{$car->year}}</p>
                                                <img height="250" src="{{ asset($car->image )}}">
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
                            <p>SEM INFORMAÇÕES CADASTRADAS</p>
                        @endif
                        </tbody>
                    </table>
                    <div>
                        {{ $cars->appends(['search' => $search])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


