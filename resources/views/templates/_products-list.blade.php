@foreach($products->get() as $prod)
    <div class='flex flex-col gap-2'>
        <div class='p-4 rounded overflow-hidden shadow-md bg-blue-100 mt-3'>
            <h1 class='text-2xl'>{{$prod->name}}</h1>
            <h3 class='text-2xl'>{{$prod->description}}</h3>
            <p class='text-lg'>Price: {{$prod->price}}</p>
            <p class='text-lg'>Quantity: {{$prod->quantity}}</p>
        </div>
    </div>
    
@endforeach

<div id="name_error" hx-swap-oob="true" >
</div> 

<div id="desc_error" hx-swap-oob="true" >
</div>
 
<div id="price_error" hx-swap-oob="true" >
</div> 

<div id="qty_error" hx-swap-oob="true" >
</div>

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-500 text-white text-center p-2 rounded ml-4 items-center w-25">
        <h3>Product Added</h3>
    </div>
</div>



