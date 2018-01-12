
<div class="form-group col-xs-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('Nome veículo') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group col-xs-12" >
    <div class="row">
        <div class="form-group col-xs-4 {{ $errors->has('automaker_id') ? 'has-error' : ''}}">
            @if($marks->count() > 0)
                {!! Form::label('Fabricante') !!}
                {!! Form::select('automaker_id', $marks, null, ['class'=>'form-control', 'placeholder' => '--- SELECIONE UMA FABRICANTE ---']) !!}
            @else
                {!! Form::label('automaker_id', 'Fabricante') !!}
                {!! Form::select('automaker_id', $marks, null, ['class'=>'form-control', 'placeholder' => '--- CADASTRE UMA MONTADORA ---']) !!}
            @endif
        </div>
        <div class="form-group col-xs-4 {{ $errors->has('year') ? 'has-error' : ''}}">
            {!! Form::label('Ano de Fabricação') !!}
            {!! Form::text('year', null, ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-xs-4 {{ $errors->has('price') ? 'has-error' : ''}}">
            {!! Form::label('Preço') !!}
            {!! Form::text('price', null, ['class'=> 'form-control', 'placeholder'=>'180.000.00']) !!}
        </div>
    </div>
</div>
<div class="form-group col-xs-12 {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('Descrição') !!}
    {!! Form::textarea('description', null, ['class'=> 'form-control']) !!}
</div>
@if(isset($car->image))
    <img width="100" src="{{ asset( $car->image) }}">
@endif
<div class="form-group col-xs-12 {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('Inserir foto do Veículo') !!}
    {!! Form::file('image', ['class'=>'form-control']) !!}
</div>



