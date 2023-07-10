<!DOCTYPE html>
<html lang="en">
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
              <span><img src="assets/logo.png" class="w-24"></span>
            </a>
            <ul class="hidden items-center gap-6 lg:flex">
              <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                <a href="{{'/'}}" class="flex items-center" href="#">
                  Home
                </a>
              </li>
              <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                <a class="flex items-center" href="#">
                  Account
                </a>
              </li>
              <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                <a class="flex items-center" href="#">
                  Blocks
                </a>
              </li>
              <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                <a class="flex items-center" href="#">
                  Docs
                </a>
              </li>
            </ul>
            <a href="{{'signin'}}"
              class="middle none center hidden rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 py-4 px-5 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
              data-ripple-light="true"
            >
              <span>Sign In</span>
        </a>
            <button
              class="middle none relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] rounded-lg text-center font-sans text-xs font-medium uppercase text-blue-gray-500 transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
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
            class="block h-0 w-full basis-full overflow-hidden text-black transition-all duration-300 ease-in lg:hidden"
            data-collapse="nav"
            style="height:204px"
          >
            <div class="container mx-auto pb-2">
              <ul class="mt-2 mb-4 flex flex-col gap-2">
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="#">
                    Pages
                  </a>
                </li>
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="#">
                    Account
                  </a>
                </li>
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="#">
                    Blocks
                  </a>
                </li>
                <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                  <a class="flex items-center" href="#">
                    Docs
                  </a>
                </li>
              </ul>
              <button
                class="middle none center mb-2 block w-full rounded-lg bg-gradient-to-tr from-pink-600 to-pink-400 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-light="true"
              >
                <span>Buy Now</span>
              </button>
            </div>
          </div>
        </div>
      </nav>
    {{$slot}}
   
    <footer class="w-full bg-white p-8">
        <div class="flex flex-row flex-wrap items-center justify-center gap-y-6 gap-x-12 bg-white text-center md:justify-between">
          <img src="assets/logo.png" alt="logo-ct" class="w-24" />
          <ul class="flex flex-wrap items-center gap-y-2 gap-x-8">
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-pink-500 focus:text-pink-500"
              >
                About Us
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-pink-500 focus:text-pink-500"
              >
                License
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-pink-500 focus:text-pink-500"
              >
                Contribute
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased transition-colors hover:text-pink-500 focus:text-pink-500"
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

    @livewireScripts
        <script type="text/javascript" src="assets/scripts/ripple.js"></script>
        <script type="text/javascript" src="assets/scripts/collapse.js"></script>
</body>
<!-- script -->

</html>