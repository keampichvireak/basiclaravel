@include('all_page.app.app')
@include('all_page.app.navbar')

<div class="container">
    <h3></h3>
    <div class="card mb-3 mt-3">
        <div class="card-body" style="background: rgb(244, 244, 242)">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <legend>Update Products</legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Brand</label>
                    <input type="text" id="brand" name="brand" value="{{ old('brand', $product->brand) }}"
                        class="form-control">
                    @error('brand')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Model</label>
                    <input type="text" id="model" name="model" value="{{ old('model', $product->model) }}"
                        class="form-control">
                    @error('model')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Processor</label>
                    <input type="text" id="processor" name="processor"
                        value="{{ old('processor', $product->processor) }}" class="form-control">
                    @error('processor')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Ram</label>
                    <input type="text" id="ram" name="ram" value="{{ old('ram', $product->ram) }}"
                        class="form-control">
                    @error('ram')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Storange_Capcity</label>
                    <input type="text" id="storange_capcity" name="storange_capcity"
                        value="{{ old('storange_capcity', $product->storange_capcity) }}" class="form-control">
                    @error('storange_capcity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Display_Size</label>
                    <input type="text" id="display_size" name="display_size"
                        value="{{ old('display_size', $product->display_size) }}" class="form-control">
                    @error('display_size')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Graphic_Card</label>
                    <input type="text" id="graphic_card" name="graphic_card"
                        value="{{ old('graphic_card', $product->graphic_card) }}" class="form-control">
                    @error('graphic_card')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Color</label>
                    <input type="text" id="color" name="color" value="{{ old('color', $product->color) }}"
                        class="form-control">
                    @error('color')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Warranty_Period</label>
                    <input type="text" id="warranty_period" name="warranty_period"
                        value="{{ old('warranty_period', $product->warranty_period) }}" class="form-control">
                    @error('warranty_period')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-image">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Price</label>
                    <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}"
                        class="form-control">
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Quantity</label>
                    <input type="text" id="quantity" name="quantity"
                        value="{{ old('quantity', $product->quantity) }}" class="form-control">
                    @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
@include('all_page.app.footer')
