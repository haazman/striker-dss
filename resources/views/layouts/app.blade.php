<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <link
  href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet"
/>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link rel="icon" href="{{url('asssets/logo.png')}}" type="image/png">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
  integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
  crossorigin="anonymous"
/>
    <title>Striker DSS</title>
    @livewireStyles
</head>
<body>
    <nav class="mx-auto block w-full max-w-screen-xl rounded-xl border border-white/80 bg-white bg-opacity-80 py-2 px-4 text-white shadow-md backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4">
        <div>
          <div class="container mx-auto flex items-center justify-between text-gray-900">
            <a
              href="#"
              class="mr-4 block cursor-pointer py-1.5 font-sans text-sm font-normal leading-normal text-inherit antialiased"
            >
              <span><img src="/assets/logo.png" class="w-24"></span>
            </a>
            <ul class="hidden items-center gap-6 lg:flex">
              <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                <a href="{{url('/')}}" class="flex items-center" href="#">
                  Home
                </a>
              </li>
              @auth
              <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                <a href="{{url('add')}}" class="flex items-center" href="#">
                  Dashboard
                </a>
              </li>
              <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                <a class="flex items-center" href="#">
                  Compare
                </a>
              </li>
              @endauth
              @guest
              <a href="{{url('signin')}}"
                class="middle none center hidden rounded-lg bg-gradient-to-tr from-blue-700 to-blue-400 py-4 px-5 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-700/20 transition-all hover:shadow-lg hover:shadow-blue-700/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
                data-ripple-light="true"
              >
                <span>Sign In</span>
          </a>
          @endguest

          @auth
        <img
        alt="tania andrew"
        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
        class="relative inline-block h-12 w-12 cursor-pointer rounded-full object-cover object-center"
        data-popover-target="profile-menu"
      />
      <ul
        role="menu"
        data-popover="profile-menu"
        data-popover-placement="bottom"
        class="absolute flex min-w-[180px] flex-col gap-2 overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-700 shadow-lg shadow-blue-gray-700/10 focus:outline-none"
      >
        <button
          tabIndex="-1"
          role="menuitem"
          class="flex z-50 w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            aria-hidden="true"
            class="h-4 w-4"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
            ></path>
          </svg>
          <p class="block font-sans text-sm font-normal leading-normal text-inherit antialiased">
            {{Auth::user()->name}}
          </p>
        </button>
        <button
          tabIndex="-1"
          role="menuitem"
          class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            aria-hidden="true"
            class="h-4 w-4"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"
            ></path>
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
            ></path>
          </svg>
          <p class="block font-sans text-sm font-normal leading-normal text-inherit antialiased">
            Edit Profile
          </p>
        </button>
       
        <hr class="my-2 border-blue-gray-50" tabindex="-1" role="menuitem" />
        <a href="{{route('logout')}}"
          tabIndex="-1"
          role="menuitem"
          class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            aria-hidden="true"
            class="h-4 w-4"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M5.636 5.636a9 9 0 1012.728 0M12 3v9"
            ></path>
          </svg>
          <p  class="block font-sans text-sm font-normal leading-normal text-inherit antialiased">
            Sign Out
          </p>
        </a>
      </ul>
        @endauth
            </ul>
           

        
            <button
              class="middle none relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] rounded-lg text-center font-sans text-xs font-medium uppercase text-blue-gray-700 transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
              data-collapse-target="nav"
            >
              <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  stroke="currentColor"
                  strokeWidth="2"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M4 6h16M4 12h16M4 18h16"
                  ></path>
                </svg>
              </span>
            </button>
          </div>
          <div
            class="block max-h-0 w-full basis-full overflow-hidden text-black transition-all duration-300 ease-in lg:hidden"
            data-collapse="nav"
          >
            <div class="container mx-auto pb-2">
              <ul class="mt-2 mb-4 flex flex-col gap-2">
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="{{url('/')}}">
                    Home
                  </a>
                </li>
                @auth
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="{{url('add')}}">
                    Dashboard
                  </a>
                </li>
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="#">
                    Compare
                  </a>
                </li>
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="#">
                    Edit Profile
                  </a>
                </li>
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a href="{{route('logout')}}"
                  class="flex items-center"
                >
                    Sign Out
                </a>
                </li>
                @endauth
              </ul>
              @guest
              <a href="{{url('signin')}}"
                class="middle none center mb-2 block w-full rounded-lg bg-gradient-to-tr from-blue-700 to-blue-400 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-700/20 transition-all hover:shadow-lg hover:shadow-blue-700/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-light="true"
              >
                <span>Sign In</span>
          </a>
          @endguest

          @auth
          <div class="flex items-center flex-row gap-2">
        <img
        alt="tania andrew"
        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
        class="relative inline-block h-12 w-12 cursor-pointer rounded-full object-cover object-center"
        data-popover-target="profile-menu"
      />

      <p class="block font-sans text-sm font-normal leading-normal text-inherit antialiased">
        {{Auth::user()->name}}
      </p>
    </div>
        @endauth
            </div>
          </div>
        </div>
      </nav>
     
      <div>
    {{$slot}}
      </div>
   
    <footer class="w-full bg-white p-8">
        <div class="flex flex-row flex-wrap items-center justify-center gap-y-6 gap-x-12 bg-white text-center md:justify-between">
          <img src="/assets/logo.png" alt="logo-ct" class="w-24" />
          <ul class="flex flex-wrap items-center gap-y-2 gap-x-8">
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-blue-700 focus:text-blue-700"
              >
                About Us
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-blue-700 focus:text-blue-700"
              >
                License
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-blue-700 focus:text-blue-700"
              >
                Contribute
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-blue-700 focus:text-blue-700"
              >
                Contact Us
              </a>
            </li>
          </ul>
        </div>
        <hr class="my-8 border-blue-gray-50" />
        <p class="block text-center font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
          © 2023 Striker DSS
        </p>
      </footer>

   

</body>
<!-- script -->
@livewireScripts
<script type="text/javascript" src="/assets/scripts/ripple.js"></script>
<script type="text/javascript" src="/assets/scripts/collapse.js"></script>
<script type="module" src="/assets/scripts/popover.js"></script>
<script type="text/javascript" src="/assets/scripts/dismissible.js"></script>
<script src="/assets/scripts/dialog.js"></script>
<script src="/assets/scripts/tabs.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>


</html>