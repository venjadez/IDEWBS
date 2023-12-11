<div>
    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    Home
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane"
                    type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                    SEO tags
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane"
                    type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                    Details
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane"
                    type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                    Product Image
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane"
                    type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                    Product Attribute <!-- Changes from color to Attribute-->
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                aria-labelledby="home-tab" tabindex="0">
                <div class="mb-3">
                    <label>Select Category</label>
                    <select name="category_id" class="form-control" wire:model="selectedCategory">
                        <option selected><--Select Category--></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-rel="1">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label>Product Slug </label>
                    <input type="text" name="slug" class="form-control" />
                </div>
                @if (!is_null($brands))
                    <div class="mb-3">
                        <label>Select Brand</label>
                        <select name="brand" class="form-control" wire:model="selectedBrand">
                            <option selected><--Select Brand--></option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->name }}">{{ $brand->name }} ({{ $brand->category->name }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="mb-3">
                    <label>Small Description</label>
                    <textarea rows="4" name="small_description" class="form-control" placeholder="500 Words"></textarea>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea rows="4" name="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                tabindex="0">
                <div class="mb-3">
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" />
                    </div>
                    <label> Meta Description</label>
                    <textarea rows="4" name="meta_description" class="form-control"></textarea>
                </div>
                <label> Meta Keyword</label>
                <textarea rows="4" name="meta_keyword" class="form-control"></textarea>
            </div>
            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                aria-labelledby="details-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Original Price</label>
                            <input type="text" name="original_price" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Trending</label>
                            <br />
                            <input type="checkbox" name="trending" style="width: 30px; height: 30px;" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Status</label>
                            <br />
                            <input type="checkbox" name="status" style="width: 30px; height: 30px;" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Featured</label>
                            <br />
                            <input type="checkbox" name="featured" style="width: 30px; height: 30px;" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                tabindex="0">
                <div class="mb-3">
                    <label>Upload Product Images</label>
                    <input type="file" name="image[]" multiple class="form-control" />
                </div>

            </div>
            <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                tabindex="0">
                <div class="mb-3">
                    <label>Select Attr.</label>
                    <div class="row">
                        @forelse ($colors as $data)
                            <div class="col-md-3">
                                <div class="p-2 border">
                                    Color: <input type="checkbox" name="colors[{{ $data->id }}]"
                                        value="{{ $data->id }}" />{{ $data->name }}
                                    <br />
                                    Quantity: <input type="number" name="colorquantity[{{ $data->id }}]"
                                        style="width:70px; border:1px solid" />

                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <h1>No Colors Found</h1>
                            </div>
                        @endforelse

                    </div>

                </div>

            </div>
        </div>
        <div class="py-2 float-end">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>

    </form>
</div>
