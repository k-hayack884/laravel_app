<p class="mb-4">{{ $product['ownerName'] }}様</p>
<p class="mb-4">シャークさんが乱入してきました</p>

サービス内容
<ul class="mb-4">
    <li>商品名:{{ $product['name'] }}</li>
    <li>商品金額:{{ number_format($product['price']) }}円</li>
    <li>商品数:{{ $product['quantity'] }}</li>
    <li>合計金額:{{ number_format($product['price']*$product['quantity']) }}</li>
</ul>    
<div class="mb-4">購入者情報</div>
<ul>
    <li>{{ $user->name }}</li>
</ul>