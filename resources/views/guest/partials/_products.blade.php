@foreach ($products as $product)
<div class="col-6 col-md-4">
    <div class="grid_item">
        <figure>
            <a href="{{ route('catalogue.show', $product->id) }}">
                @if ($product->productPhotos->isNotEmpty())
                <img class="img-fluid lazy" src="/storage/{{ $product->productPhotos[0]->path }}"
                    data-src="/storage/{{ $product->productPhotos[0]->path }}" alt="{{ $product->name }}">
                @else
                <img class="img-fluid lazy"
                    src="{{ asset('assets/img/products/product_placeholder_square_medium.jpg') }}"
                    data-src="{{ asset('assets/img/products/product_placeholder_square_medium.jpg') }}"
                    alt="Default Image">
                @endif
            </a>
        </figure>
        <a href="{{ route('catalogue.show', $product->id) }}">
            <h3>{{ $product->name }}</h3>
        </a>
        <div class="price_box">
            <span class="new_price">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
        </div>
        <ul>
            <li><a href="{{ route('catalogue.show', $product->id) }}" class="tooltip-1"><i
                        class="ti-eye"></i><span>Lihat Detail</span></a></li>
            <li>
                <form class="form-to-cart">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="path-img" value="/storage/{{ $product->productPhotos[0]->path }}">
                    <a href="javascript:void(0)" class="submit-cart tooltip-1 btn_open_top_panel"><i
                            class="ti-shopping-cart"></i><span>Tambah ke keranjang</span></a>
                </form>
            </li>
        </ul>
    </div>
</div>
@endforeach
