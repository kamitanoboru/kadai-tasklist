@extends('layouts.app')

@section('content')
                    <h2 style="text-align: center;">
                    <?php $now=date('Y/m/d H:i:s');?>
                    {{ $now }}
                    </h2>
                
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        {{ $user->name }}さんがこのページに来るのは、おかしいなあ
        <div class="alert alert-warning" role="alert">こちらをクリックすると<a href="/">トップページ</a>に戻ります。</div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasklist</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection