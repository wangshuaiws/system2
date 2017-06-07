    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name','名称:',['class' => 'control-label']) !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>


    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
        {!! Form::label('display_name','显示名称:',['class' => 'control-label']) !!}
        {!! Form::text('display_name',null,['class' => 'form-control']) !!}
        @if ($errors->has('display_name'))
            <span class="help-block">
                <strong>{{ $errors->first('display_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description','描述:',['class' => 'control-label']) !!}
        {!! Form::text('description',null,['class' => 'form-control']) !!}
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

