<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category;
    public $product;
    public $prodColorSelectedQuantity;
    public $productColorId;
    public $quantityCount = 1;

    public function addToWishList($productId)
    {
        // dd($productId);
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item Already added',
                    'type' => 'warning',
                    'status' => 409,
                ]);

                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                  ]);
                $this->emit('wishlistAddedUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item Added',
                    'type' => 'success',
                    'status' => 200,
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Kindly Login to Continue',
                'type' => 'info',
                'status' => 401,
            ]);

            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            --$this->quantityCount;
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            ++$this->quantityCount;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            // dd($productId);
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                // check for product color quantity
                if ($this->product->productColors()->count() > 1) {
                    if ($this->prodColorSelectedQuantity != null) {
                        if (Cart::where('user_id', auth()->user()->id)
                                            ->where('product_id', $productId)
                                            ->where('product_color_id', $this->productColorId)
                                            ->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Item already added',
                                'type' => 'info',
                                'status' => 200,
                            ]);
                        } else {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantityCount) {
                                    // insert cart
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount,
                                    ]);
                                    $this->emit('CartAdded');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Item Added to Cart',
                                        'type' => 'success',
                                        'status' => 200,
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only'.$productColor->quantity.'Pcs. Available',
                                        'type' => 'info',
                                        'status' => 401,
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of stock',
                                    'type' => 'info',
                                    'status' => 401,
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Item Color',
                            'type' => 'info',
                            'status' => 401,
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Item already added',
                            'type' => 'info',
                            'status' => 200,
                        ]);
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity > $this->quantityCount) {
                                // insert cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                $this->emit('CartAdded');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Item Added to Cart',
                                    'type' => 'success',
                                    'status' => 200,
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only'.$this->product->quantity.'Pcs. Available',
                                    'type' => 'info',
                                    'status' => 401,
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of stock',
                                'type' => 'info',
                                'status' => 401,
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product not found',
                    'type' => 'warning',
                    'status' => 404,
                ]);
            }

            return false;
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Kindly Login to Continue',
                'type' => 'info',
                'status' => 401,
            ]);
        }

        return false;
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
