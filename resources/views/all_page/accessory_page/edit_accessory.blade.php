@include('all_page.app.app')
@include('all_page.app.navbar')

<div class="container">
    <h3></h3>
    <div class="card mb-3 mt-3">
        <div class="card-body" style="background: rgb(244, 244, 242)">
            <form action="{{ route('accessory.update', $accessory) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <legend>Update Accessory</legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Category</label>
                    <input type="text" id="category" name="category"
                        value="{{ old('category', $accessory->category) }}" class="form-control">
                    @error('category')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Brand</label>
                    <input type="text" id="brand" name="brand" value="{{ old('brand', $accessory->brand) }}"
                        class="form-control">
                    @error('brand')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Model</label>
                    <input type="text" id="model" name="model" value="{{ old('model', $accessory->model) }}"
                        class="form-control">
                    @error('model')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Color</label>
                    <input type="text" id="color" name="color" value="{{ old('color', $accessory->color) }}"
                        class="form-control">
                    @error('color')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Price</label>
                    <input type="text" id="price" name="price" value="{{ old('price', $accessory->price) }}"
                        class="form-control">
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Quantity</label>
                    <input type="text" id="quantity" name="quantity" class="form-control"
                        value="{{ old('quantity', $accessory->quantity) }}">
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
