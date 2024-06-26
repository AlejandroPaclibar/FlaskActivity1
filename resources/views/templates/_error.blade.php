@include('templates._products-list', ['products' => $products]);

@if ($errors->has('name'))
    <div id="name_error" hx-swap-oob="true">
        <div class="bg-red-200 text-red-800 p-4 rounded">
            <ul class="ms-2">
                @foreach ($errors->get('name') as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>   
@endif

@if ($errors->has('description'))
    <div id="desc_error" hx-swap-oob="true" >
        <div class="bg-red-200 text-red-800 p-4 rounded">
            <ul class="ms-2">
                @foreach ($errors->get('description') as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>   
@endif

@if ($errors->has('price'))
    <div id="price_error" hx-swap-oob="true">
        <div class="bg-red-200 text-red-800 p-4 rounded">
            <ul class="ms-2">
                @foreach ($errors->get('price') as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>   
@endif

@if ($errors->has('quantity'))
    <div id="qty_error" hx-swap-oob="true">
        <div class="bg-red-200 text-red-800 p-4 rounded">
            <ul class="ms-2">
                @foreach ($errors->get('quantity') as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>   
@endif

<div id="addProductMessage" hx-swap-oob="true">

</div>