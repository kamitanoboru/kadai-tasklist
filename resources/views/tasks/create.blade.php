@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
    <h1>タスク新規作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
        <div class="form-group">
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">        
        {!! Form::label('status', 'ステータス:') !!}
        
        {{--セレクトボックスに変更
        {!! Form::text('status',null,['class'=>'form-control']) !!}
        --}}
        
        {{--新規作成は、startに決っているので、hiddenで渡そうかな--}}
        {{Form::select('status', [
           '新規' => '新規',
           '着手中' => '着手中',
           '保留中' => '保留中',
           '終了' => '終了'],'新規'
        )}}
        
        </div>
        {!! Form::submit('タスク追加', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
</div>

@endsection