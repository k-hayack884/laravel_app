@props(['message'=>'ﾍｲﾛｰ!',
'content'=>'ｿｰﾄﾞ!',
'title'=>'ｻﾙｶﾞｯｿ!'])

<div {{ $attributes->merge([
    'class'=>'p-2 border-2 shadow-md w-1/2'
]) }}>
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div>
