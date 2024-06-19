<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite('public/css/style.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="font-[Poppins] font-medium">
  <div id="navbar container" class="bg-blue-400 flex items-center pl-10 pr-10 w-full">
    <img src="{{ url('images/logo.png')}}" alt="Logo" class="w-24 scale-50 mr-auto">
    <div class="flex gap-5 items-center mr-auto">
      <h1 class="text-lg">About Us</h1>
      <h1 class="text-lg">Services</h1>
      <h1 class="text-lg">Stocks</h1>
    </div>
    <div class="flex gap-5">
      <a href="{{ url('login')}}"><h1 class="text-lg">Login</h1></a>
      <a href="{{ url('register')}}"><h1 class="text-lg">Register</h1></a>
    </div>
  </div>


  <div>
    <div class="bg-blue-500 h-72 flex justify-center items-center flex-col gap-4 w-full">
      <h1 class="text-5xl">Investkan</h1>
      <h1 class="text-3xl">A leading fintech company in Indonesia</h1>
      <h1 class="text-xl p-2 rounded-md outline outline-blue-800 bg-blue-700">Get started !</h1>
    </div>
  </div>


  <div class="mt-16">
    <h1 class="flex justify-center text-3xl">Category</h1>
    <div class="flex justify-center items-center mt-10">
      <div class="grid grid-cols-3 gap-x-24 gap-y-24">
        <div class="p-5 text-xl bg-blue-500 h-96 w-96 rounded-md">Category 1</div>
        <div class="p-5 text-xl bg-blue-500 h-96 w-96 rounded-md">Category 2</div>
        <div class="p-5 text-xl bg-blue-500 h-96 w-96 rounded-md">Category 3</div>
        <div class="p-5 text-xl bg-blue-500 h-96 w-96 rounded-md">Category 4</div>
        <div class="p-5 text-xl bg-blue-500 h-96 w-96 rounded-md">Category 5</div>
        <div class="p-5 text-xl bg-blue-500 h-96 w-96 rounded-md">Category 6</div>
      </div>
    </div>
  </div>


  <div class="flex justify-center mt-20">
    <div class="bg-blue-500 w-88.5% h-96 rounded-md">
      <h1 class="text-2xl p-5">Ini bagian saham paling trending</h1>
    </div>
  </div>


  <div class="flex justify-center bg-blue-500 w-full h-72 mt-32">
    <div class="flex flex-col items-center gap-y-8 mt-5">
      <h1 class="text-3xl">About Us</h1>
      <h1 class="text-xl w-10/12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, reiciendis! Cupiditate dolorem illum eveniet expedita nemo cum fugit maxime repellendus, a, unde soluta! Quos nihil corporis nesciunt velit adipisci. Voluptatum? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla odio reprehenderit placeat quis voluptates illum enim eius excepturi libero velit. Labore omnis ullam minima nemo animi nesciunt? Sit, aut similique.</h1>
    </div>
  </div>


  <div class="mt-32">
    <h1 class="text-3xl flex justify-center">Kenapa pilih kami?</h1>
    <div class="flex justify-center items-center">
      <div class="grid grid-cols-3 gap-x-14 mt-10">
        <div class="bg-blue-500 h-96 w-96 rounded-md">
          <h1 class="text-2xl p-5">Karena kami terpecaya</h1>
        </div>
        <div class="bg-blue-500 h-96 w-96 rounded-md">
          <h1 class="text-2xl p-5">Karena kami terpecaya</h1>
        </div>
        <div class="bg-blue-500 h-96 w-96 rounded-md">
          <h1 class="text-2xl p-5">Karena kami terpecaya</h1>
        </div>
      </div>
    </div>
  </div>


  <div class="mt-28 flex justify-start">
    <div class="flex flex-col w-80 gap-y-5 ml-32">
      <h1 class="text-5xl">FAQ</h1>
      <h1 class="text-xl">1. Apakah aman invest di Investkan?</h1>
      <h1 class="text-xl">2. Bagaimana cara investasi di Investkan?</h1>
      <h1 class="text-xl">3. Apakah Investkan sudah dapat izin?</h1>
    </div>
    <div class="w-1/2 ml-40 h-120 bg-blue-500 rounded-md">Gambar </div>
  </div>


  <div class="flex justify-center mt-28 bg-blue-400">
    <img src="{{ url('images/logo.png')}}" alt="" class="mr-auto scale-50">
    <div class="flex mr-auto gap-x-36">
      <div class="flex flex-col mt-14 gap-y-1.5">
        <h1 class="text-sm text-white">Services</h1>
        <h1 class="text-sm">Buy stocks</h1>
        <h1 class="text-sm">Sell stocks</h1>
        <h1 class="text-sm">Chatting</h1>
      </div>
      <div class="flex flex-col mt-14 gap-y-1.5">
      <h1 class="text-sm text-white">Services</h1>
      <h1 class="text-sm">Buy stocks</h1>
      <h1 class="text-sm">Sell stocks</h1>
      <h1 class="text-sm">Chatting</h1>
    </div>
    <div class="flex flex-col mt-14 gap-y-1.5">
      <h1 class="text-sm text-white">Services</h1>
      <h1 class="text-sm">Buy stocks</h1>
      <h1 class="text-sm">Sell stocks</h1>
      <h1 class="text-sm">Chatting</h1>
    </div>
    <div class="flex flex-col mt-14 gap-y-1.5">
      <h1 class="text-sm text-white">Services</h1>
      <h1 class="text-sm">Buy stocks</h1>
      <h1 class="text-sm">Sell stocks</h1>
      <h1 class="text-sm">Chatting</h1>
    </div>
    </div>
  </div>
</body>
</html>