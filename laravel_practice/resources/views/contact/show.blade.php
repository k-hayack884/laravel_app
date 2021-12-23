@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('みせるお！') }} <br>
                    {{ $contact->your_name }}
                    {{ $contact->title }}
                    {{ $contact->email }}
                    {{ $contact->url }}
                    {{ $gender }}
                    {{ $age }}
                    {{ $contact->contact }}

                    <form method="GET" action="{{ route('contact.edit',['id'=>$contact->id]) }}">
                        @csrf
                        <input class="btn btn-info" type="submit" value="我が書き換えたのだ">
                    </form>
                    <form method="POST" action="{{ route('contact.destory',['id'=>$contact->id])}}" id="delete_{{ $contact->id}}" >
                        @csrf
                        <a href="#" class="btn btn-danger" data-id="{{ $contact->id }}" onclick="deletePost(this)">ファイナルダンス！</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function deletePost($e){
    'use strict';
    if(confirm('本当にファイナルダンスしてもいいですか？')){
        document.getElementById('delete_'+e.datasetid).submit();
    }
}
</script>
@endsection
