<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Unit Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Actions</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($wishlist as $data)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{url('collections/'.$data->product->category->slug.'/'.$data->product->slug)}}">
                                        <label class="product-name">
                                            <img src="{{$data->product->productImages[0]->image}}"
                                             style="width: 50px; height: 50px" alt="{{$data->product->name}}" />
                                        {{$data->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">&#8369;{{$data->product->selling_price}} </label>
                                </div>

                                <div class="col-md-2 col-12 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishlistItem({{$data->id}})" class="btn btn-danger btn-sm">
                                            <span wire:loading.remove wire:target="removeWishlistItem({{$data->id}})">
                                            <i class="fa fa-trash"></i> Remove
                                        </span>
                                        <span wire:loading wire:target="removeWishlistItem({{$data->id}})"><i class="fa fa-trash"></i>Removing</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4>No Wishlist Added</h4>
                    @endforelse
</div>
