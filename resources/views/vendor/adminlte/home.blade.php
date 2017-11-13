@extends('adminlte::layouts.app')

@section('htmlheader_title')
	DASHBOARD
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Painel de Controle</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="box box-widget widget-user-2">
									<div class="widget-user-header bg-green">
										<div class="widget-user-image">
											<img class="img-circle" src="{{ asset('img/montadora_128x128.png') }}" alt="User Avatar">
										</div>
										<h3 class="widget-user-username">Montadora</h3>
										<h5 class="widget-user-desc">Mais Informações</h5>
									</div>
									<div class="box-footer no-padding">
										<ul class="nav nav-stacked">
											<li><a href="{{route('mark.index')}}">Visualizar <span class="pull-right badge">
														<i class="fa fa-arrow-circle-right"></i>
													</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="box box-widget widget-user-2">
									<div class="widget-user-header bg-primary">
										<div class="widget-user-image">
											<img class="img-circle" src="{{ asset('img/carro.png') }}" alt="User Avatar">
										</div>
										<h3 class="widget-user-username">Carros</h3>
										<h5 class="widget-user-desc">Mais Informações</h5>
									</div>
									<div class="box-footer no-padding">
										<ul class="nav nav-stacked">
											<li><a href="{{ route('car.index') }}">Visualizar <span class="pull-right badge">
 													<i class="fa fa-arrow-circle-right"></i>
													</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
