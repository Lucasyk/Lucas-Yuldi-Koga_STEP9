<x-layout>
    <section class="mypage-wrapper">
        <h1>マイページ</h1>

        <a href="{{ route('account.edit') }}" class="blue-btn">アカウント編集</a>

        <div class="user-info">
            <div>
                <p>ユーザ名: {{ session('user.name') ?? 'Cy' }}</p>
                <p>Eメール: cy.com</p>
            </div>

            <div>
                <p>名前：山田太郎</p>
                <p>カナ：ヤマダタロウ</p>
            </div>
        </div>

        <div class="section-title-row">
            <h2>＜出品商品＞</h2>
            <a href="{{ route('products.create') }}" class="blue-btn">新規登録</a>
        </div>

        <table class="mypage-table">
            <thead>
                <tr>
                    <th>商品番号</th>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>料金(¥)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($myProducts as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="green-btn">
                                詳細
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>＜購入した商品＞</h2>

        <table class="mypage-table">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>料金(¥)</th>
                    <th>個数</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchasedProducts as $sale)
                    <tr>
                        <td>{{ $sale->product->product_name }}</td>
                        <td>{{ $sale->product->description }}</td>
                        <td>{{ $sale->product->price }}</td>
                        <td>{{$sale->quantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2>＜いいねした商品＞</h2>

<table class="mypage-table">
    <thead>
        <tr>
            <th>商品名</th>
            <th>商品説明</th>
            <th>料金(¥)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($likedProducts as $like)
            <tr>
                <td>{{ $like->product->product_name }}</td>
                <td>{{ $like->product->description }}</td>
                <td>{{ $like->product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $like->product->id) }}" class="green-btn">
                        詳細
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </section>
</x-layout>