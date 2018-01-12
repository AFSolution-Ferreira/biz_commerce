
<div class="form-group col-xs-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {{--<label>Nome</label>--}}
    {{--<input type="text" class="form-control" name="name" value="{{ isset($car->name) ? $car->name : ''}} {{old('name')}}" style="text-transform:uppercase">--}}
    {{--@if($errors->has('name'))--}}
        {{--<span class="help-block">--}}
            {{--<strong>{{$errors->first('name')}}</strong>--}}
        {{--</span>--}}
    {{--@endif--}}
    {!! Form::label('Nome veículo') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group col-xs-12" >
    <div class="row">
        <div class="form-group col-xs-4 {{ $errors->has('automaker_id') ? 'has-error' : ''}}">
            {{--<label>Montadora</label>--}}
            {{--<select class="form-control" name="automaker_id" id="automaker_id" style="text-transform:uppercase">--}}
                {{--@if($marks->count() > 0)--}}
                    {{--@foreach($marks as $mark)--}}
                        {{--<option value="{{$mark->id}}" style="text-transform:uppercase">{{$mark->name}}</option>--}}
                    {{--@endforeach--}}
                {{--@else--}}
                    {{--<option value="">--- SEM MONTADORA ---</option>--}}
                {{--@endif--}}
            {{--</select>--}}
            {{--@if($errors->has('automaker_id'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{$errors->first('automaker_id')}}</strong>--}}
                {{--</span>--}}
            {{--@endif--}}
            @if($marks->count() > 0)
                {!! Form::label('Fabricante') !!}
                {!! Form::select('automaker_id', $marks, 'name', ['class'=>'form-control', 'placeholder' => '--- SELECIONE UMA FABRICANTE ---']) !!}
            @else
                {!! Form::label('automaker_id', 'Fabricante') !!}
                {!! Form::select('automaker_id', $marks, 'name', ['class'=>'form-control', 'placeholder' => '--- SELECIONE UMA FABRICANTE ---']) !!}
            @endif
        </div>
        <div class="form-group col-xs-4 {{ $errors->has('year') ? 'has-error' : ''}}">
            {{--<label>Ano de Fabricação</label>--}}
            {{--<input class="form-control" name="year" type="text"--}}
                   {{--value="{{ isset($car->year) ? $car->year : ''}} {{old('year')}}">--}}
            {{--@if($errors->has('year'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{$errors->first('year')}}</strong>--}}
                {{--</span>--}}
            {{--@endif--}}
            {!! Form::label('Ano de Fabricação') !!}
            {!! Form::text('year', null, ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-xs-4 {{ $errors->has('price') ? 'has-error' : ''}}">
            {{--<label>Preço</label>--}}
            {{--<input class="form-control" type="text" name="price"--}}
                   {{--value="{{ isset($car->price) ? $car->price : ''}}--}}
                   {{--{{old('price')}}">--}}
            {{--@if($errors->has('price'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{$errors->first('price')}}</strong>--}}
                {{--</span>--}}
            {{--@endif--}}
            {!! Form::label('Preço') !!}
            {!! Form::text('price', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group col-xs-12 {{ $errors->has('description') ? 'has-error' : ''}}">
    {{--<label>Descrição</label>--}}
    {{--<input type="text" class="form-control" name="description"--}}
           {{--value="{{ isset($car->description) ? $car->description : ''}} {{old('description')}}" style="text-transform:uppercase">--}}
    {{--@if($errors->has('description'))--}}
        {{--<span class="help-block">--}}
            {{--<strong>{{$errors->first('description')}}</strong>--}}
        {{--</span>--}}
    {{--@endif--}}
    {!! Form::label('Descrição') !!}
    {!! Form::textarea('description', null, ['class'=> 'form-control']) !!}
</div>
@if(isset($car->image))
    <img width="100" src="{{ asset( $car->image) }}">
@endif
<div class="form-group col-xs-12 {{ $errors->has('image') ? 'has-error' : ''}}">
    {{--<label>Inserir foto do Veículo</label>--}}
    {{--<input type="file" name="image">--}}
    {{--@if($errors->has('image'))--}}
        {{--<span class="help-block">--}}
            {{--<strong>{{$errors->first('image')}}</strong>--}}
        {{--</span>--}}
    {{--@endif--}}
    {!! Form::label('Inserir foto do Veículo') !!}
    {!! Form::file('image', ['class'=>'form-control']) !!}
</div>



