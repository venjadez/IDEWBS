<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category;
    public $product;
    public $prodColorSelectedQuantity;

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
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
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
