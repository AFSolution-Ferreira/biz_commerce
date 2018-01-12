<div class="form-group col-xs-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {{--<label>Nome</label>--}}
    {{--<input type="text" class="form-control" name="name" value="{{ isset($mark->name) ? $mark->name : ''}} {{old('name')}}" style="text-transform:uppercase">--}}
    {{--@if($errors->has('name'))--}}
        {{--<span class="help-block">--}}
            {{--<strong>{{$errors->first('name')}}</strong>--}}
        {{--</span>--}}
    {{--@endif--}}
    {!! Form::label('Nome') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group col-xs-12 {{ $errors->has('description') ? 'has-error' : ''}}">
    {{--<label>Descrição</label>--}}
    {{--<input type="text" class="form-control" name="description"--}}
              {{--value="{{ isset($mark->description) ? $mark->description : ''}}--}}
              {{--{{old('description')}}" style="text-transform:uppercase">--}}
    {{--@if($errors->has('description'))--}}
        {{--<span class="help-block">--}}
            {{--<strong>{{$errors->first('description')}}</strong>--}}
        {{--</span>--}}
    {{--@endif--}}
    {!! Form::label('Descrição') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

@if(isset($mark->image))
    <img width="100" src="{{ asset( $mark->image) }}">
@endif
<div class="form-group col-xs-12 {{ $errors->has('image') ? 'has-error' : ''}}">
    {{--<label>Inserir Logomarca</label>--}}
    {{--<input type="file" name="image">--}}
    {{--@if($errors->has('image'))--}}
        {{--<span class="help-block">--}}
            {{--<strong>{{$errors->first('image')}}</strong>--}}
        {{--</span>--}}
    {{--@endif--}}
    {!! Form::label('Inserir Logo Marca') !!}
    {!! Form::file('image', ['class'=>'form-control']) !!}
</div>







