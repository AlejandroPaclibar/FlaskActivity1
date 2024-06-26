@extends('templates.base')

@section('content')
    <div class="d-flex justify-content-between bg-gray-300 p-2 align-items-center w-100">
        <div>
            <h1 class="text-4xl">Products</h1>
        </div>
        <div class="d-flex align-items-center">
            <div>
                <button type="button" class="btn bg-green-200 text-green-900 hover:bg-green-400 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" 
                                hx-post="/api/products"
                                hx-trigger="submit"
                                hx-target="#products_list"
                                hx-swap="innerHTML"
                                hx-on::after-request="this.reset(); document.getElementById('closeButton').style.display = 'block';"
                            >
                            @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" >
                                        <div id = "name_error" hx-swap-oob="true"> </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" ></textarea>
                                        <div id = "desc_error" hx-swap-oob="true"> </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" >
                                        <div id = "price_error" hx-swap-oob="true"> </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" >
                                        <div id = "qty_error" hx-swap-oob="true"> </div>
                                    </div>
                                </div>
                                <div id="addProductMessage" hx-swap-oob="true"></div>
                                <div class="modal-footer border-0 justify-start">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary hidden" id="closeButton" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script>
                        function resetModal() {
                            document.getElementById('name_error').innerHTML = '';
                            document.getElementById('desc_error').innerHTML = '';
                            document.getElementById('price_error').innerHTML = '';
                            document.getElementById('qty_error').innerHTML = '';
                            document.getElementById('addProductMessage').innerHTML = '';
                        }

                        document.getElementById('staticBackdrop').addEventListener('hidden.bs.modal', function() {
                            document.getElementById('addProductMessage').innerHTML = '';
                            document.getElementById('closeButton').style.display = 'none';
                        });
                    </script>
                </div>
            </div>
            <div>
                <form hx-get="/api/products" hx-trigger="submit" hx-target="#products_list" hx-reset="true">
                    <input type="text" name="filter" class="p-2 border border-gray-300 rounded mt-3">
                </form>
            </div>
        </div>
    </div>
    <div id="products_list" class="p-5 bg-gray-200" hx-get="/api/products" hx-trigger="load delay:500ms" hx-swap="innerHTML">
        <!-- Product list will be loaded here -->
    </div>
@endsection
