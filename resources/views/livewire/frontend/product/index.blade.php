<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach($category->brands as $data)
                    <label for="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $data->name }}"/> {{ $data->name }}
                    </label>
                    <br/>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label for="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"/> High to Low
                    </label><br/>
                    <label for="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"/> Low to High
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $data)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($data->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif
                                @if ($data->productImages->count() > 0)
                                    <a href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                        <img src="{{ asset($data->productImages[0]->image) }}"
                                            alt="{{ $data->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $data->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                        {{ $data->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">₱{{ $data->selling_price }}</span>
                                    <span class="original-price">₱{{ $data->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-6">
                        <div class="p-3">
                            <h4>No Product Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
