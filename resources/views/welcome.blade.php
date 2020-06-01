<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rave Shop</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-black">

    <div class="flex mb-4">
  <div class="w-full bg-white-500 h-12"></div>
</div>
<div class="flex mb-4">
  <div class="w-full bg-white-500 h-12"></div>
</div>
<div class="flex mb-4">
  <div class="w-full bg-white-500 h-12"></div>
</div>


    <div class="flex mb-4">
        
  <div class="w-1/3 bg-white-400 h-12"></div>
  <div class="w-1/3 bg-white-500 h-12">

    
    <div class="max-w-sm rounded overflow-hidden bg-white">
  <img class="w-full" src="https://s3.amazonaws.com/images.ecwid.com/images/13798140/844353180.jpg" alt="Sunset in the mountains">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">Rave Tshirt</div>
    <p class="text-gray-700 text-base">
        Different sizes for legends and battle gods.......
    </p>
  </div>
  <div class="px-6 py-4 bg-white">

     <form action="{{ route('pay')}}" method="POST">
        @csrf
        <input type="hidden" name="amount" value="1000" required/>
        <input type="hidden" name="currency" value="NGN" required/>
        <input type="hidden" name="customer_email" value="olaobajua@gmail.com" required/>
        <input type="hidden" name="redirect_url" value="{{ route('checkout')}}" required/>
        <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" name="submit" value="Pay Now"/>
    </form>
  </div>
</div>


   

</div>
  <div class="w-1/3 bg-white-400 h-12"></div>
</div>





</body>
</html>