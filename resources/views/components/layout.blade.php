<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIGS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <header class="flex justify-between items-center p-2" >
        <div>
        <a href="/" ><img src="{{asset('images/logo.png')}}" alt="" class="h-24 w-24"></a>
        </div>
        @auth

        <div class="flex text-xl items-center gap-4 font-bold">
          <h2>welcome {{auth()->user()->name}} !!</h2>  

          <a href="/listings/manage">Manage listings</a>
          <form action="/logout" class="inline" method="POST">
                @csrf
                <button class="submit text-green-500 font-bold">
                  Logout
                </button>
              </form>
        </div>
        @else
        <div class="space-x-2  font-bold">
            <a href="/register">REGISTER</a>
            <a href="/login">LOGIN</a>


        </div>
        @endauth

       

     
    </header>

    <div class="">

{{  $slot }}


</div>

    <footer
    class="fixed bottom-1  w-full flex items-center justify-start font-bold bg-red-500 text-white h-12  opacity-90 md:justify-center">
    <p class="">Copyright &copy; sharmaviney608@gmail.com , All Rights reserved</p>

    <a href="/create" class="absolute text-sm right-10 bg-black text-white py-2 px-5">Post Job</a>
  </footer>
  <x-flash-message/>
</body>
</html>