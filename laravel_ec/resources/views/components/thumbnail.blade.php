@php
    if($type==='shops'){
        $path='storage/shops/';
    }
    if($type==='products'){
        $path='storage/products';
    }
@endphp
<div>
    @if (empty($filename))
    <img src="{{ asset('images/bikkuri_me_tobideru_man.png') }}" alt="">
    @else
    <img src="{{ asset('storage/shops/'.$filename) }}" alt="">

    @endif
</div>
