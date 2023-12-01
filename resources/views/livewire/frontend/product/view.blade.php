<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="col-md-5 mt-3">

                    <div class="bg-white border">
                        @if ($product->productImages)
                            <img src="{{ asset($product->productImages[0]->image) }}" class="w-100"
                                alt="{{ $product->name }}">
                        @else
                            No Image Added
                        @endif

                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}

                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">₱{{ $product->selling_price }}</span>
                            <span class="original-price">₱{{ $product->original_price }}</span>
                        </div>
                        <div>
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $data)
                                        {{-- }<input type="radio" name="colorSelection"
                                            value="{{ $data->id }}" />{{ $data->color->name }} --}}
                                        <label
                                            class="colorSelectionLabel {{ $data->color->code == 'Black' ? 'text-white' : '' }}"
                                            style="background-color:{{ $data->color->code }}"
                                            wire:click="colorSelected({{ $data->id }})">
                                            {{ $data->color->name }}
                                        </label>
                                    @endforeach
                                @endif
                                <div>
                                    @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                    @elseif ($this->prodColorSelectedQuantity > 0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @endif
                            @endif

                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn1">
                            <span wire:loading.remove>
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishList">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
