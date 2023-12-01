<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Livewire\Component;

class Create extends Component
{
    public $selectedCategory;
    public $brands;
    public $selectedBrand;
    public $category;

    public function render()
    {
        return view('livewire.admin.product.create', [
            'categories' => Category::where('status', '0')->get(),
            'colors' => Color::where('status', '0')->get(),
            'sizes' => Size::where('status', '0')->get(),
        ]);
    }

    public function updatedSelectedCategory($category_id)
    {
        $this->brands = Brand::where('category_id', $category_id)->get();
    }
}
