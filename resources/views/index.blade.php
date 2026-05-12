<x-layout>
    <section class="product-list-page">

        <h1>商品一覧</h1>

        <table class="product-list-table">
            <thead>
                <tr>
                    <th>画像</th>
                    <th>会社名</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>

                        <td>
                            @if ($product->img_path)
                                <img src="{{ asset('storage/' . $product->img_path) }}"
                                     class="product-img">
                            @else
                                <div class="no-image">No Image</div>
                            @endif
                        </td>

                        <td>
                            {{ $product->company->company_name ?? '未登録' }}
                        </td>

                        <td>
                            {{ $product->product_name }}
                        </td>

                        <td>
                            ¥{{ number_format($product->price) }}
                        </td>

                        <td>
                            <a href="{{ route('products.show', $product->id) }}"
                               class="green-btn">
                                詳細
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
</x-layout>