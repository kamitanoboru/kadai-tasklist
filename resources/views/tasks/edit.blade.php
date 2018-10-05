@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">

        <h1>id: {{ $task->id }} のタスク編集ページ</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        <div class="form-group">
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">   
        {!! Form::label('status', 'ステータス:') !!}
        {{--セレクトに変更
        
        {!! Form::text('status',null,['class'=>'form-control']) !!}
        --}}
        {{Form::select('status', [
           '新規' => '新規',
           '着手中' => '着手中',
           '保留中' => '保留中',
           '終了' => '終了'],$task ->status
        )}}
        </div>      

        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
        </div>
    </div>

@endsection