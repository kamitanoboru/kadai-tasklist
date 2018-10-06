@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <h1>{{ Auth::user()->name }}さんのタスク一覧</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                    <!--
                    <td>{{ $task->user_id }}({{ optional($task->user)->name }})</td>
                    -->
                    <td>{{ $task->updated_at }}</td>
                </tr>            
        @endforeach
            </tbody>
        </table>
    @endif

   {!! link_to_route('tasks.create', '新規タスクの投稿', null, ['class' => 'btn btn-primary']) !!}
@endsection