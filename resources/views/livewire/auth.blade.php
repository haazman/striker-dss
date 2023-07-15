<div>
  <div class="row">
  <div class="col-md-12">
  @if (session()->has('message'))
  <div class="alert alert-success">
  <h1> {{ session('message') }} </h1>
  </div>
  </div>
  @endif
  @if (session()->has('error'))
  <div
  class="font-regular relative block w-full rounded-lg bg-gradient-to-tr from-red-600 to-red-400 px-4 py-4 text-base text-white"
  data-dismissible="alert"
>
  <div class="absolute top-4 left-4">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      aria-hidden="true"
      class="h-6 w-6"
    >
      <path
        fill-rule="evenodd"
        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
        clip-rule="evenodd"
      ></path>
    </svg>
  </div>
  <div class="ml-8 mr-12">{{session('error')}}</div>
  <div
    class="absolute top-3 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
    data-dismissible-target="alert"
  >
    <div role="button" class="w-max">
      <button
        class="select-none rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white transition-all hover:bg-white/10 active:bg-white/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
        type="button"
        data-ripple-dark="true"
      >
        Close
      </button>
    </div>
  </div>
</div>
</div>
  @endif
@if($register)
<div class="flex flex-col items-center min-h-screen">
  <h3 class="block font-sans mt-10 mb-5 text-2xl font-semibold leading-snug tracking-normal text-inherit antialiased">
      Sign Up to Striker DSS
    </h3>
   

  <div class="shadow-md border bg-white w-full md:w-1/2 rounded-lg">
      <form>
        
      <div class="flex flex-col gap-10 justify-center items-center m-5">
        <div class="relative h-11 w-full min-w-[200px]">
          <input wire:model="name"
            placeholder="Full Name" type="text"
            class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-700  focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
          />
          <label class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-700  transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-700  after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-700  peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-700  peer-focus:after:scale-x-100 peer-focus:after:border-blue-700  peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700 ">
            Full Name
          </label>
          @error('name') <span class="text-red-700 ">{{ $message }}</span>@enderror
        </div>

        <div class="relative h-11 w-full min-w-[200px]">
          <input wire:model="email"
            placeholder="Email" type="email"
            class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-700  focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
          />
          <label class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-700  transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-700  after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-700  peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-700  peer-focus:after:scale-x-100 peer-focus:after:border-blue-700  peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700 ">
            Email
          </label>
          @error('email') <span class="text-red-700 ">{{ $message }}</span>@enderror
        </div>

        <div class="relative h-11 w-full min-w-[200px]">
          <input wire:model="password"
            placeholder="Password" type="password"
            class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-700  focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
          />
          <label class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-700  transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-700  after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-700  peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-700  peer-focus:after:scale-x-100 peer-focus:after:border-blue-700  peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700 ">
            Password
          </label>
          @error('password') <span class="text-red-700 ">{{ $message }}</span>@enderror
        </div>

        <button type="submit" wire:click.prevent="registerStore"
class="middle none center rounded-lg bg-blue-700  py-3 w-full font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-700 /20 transition-all hover:shadow-lg hover:shadow-blue-700 /40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
data-ripple-light="true"
>
Sign Up
</button>
        </div>
      </form>
      <div class="m-5 text-sm">
      Already have an accout? <a wire:click.prevent="registration" class="text-blue-700  cursor-pointer"> Sign In </a>
      </div>
      </div>
</div>


@else
<div class="flex flex-col items-center min-h-screen">
    <h3 class="block font-sans mt-10 mb-5 text-2xl font-semibold leading-snug tracking-normal text-inherit antialiased">
        Sign In to Striker DSS
      </h3>
    <div class="shadow-md border bg-white w-full md:w-1/2 rounded-lg">
        <form>
        <div class="flex flex-col gap-10 justify-center items-center m-5">
          <div class="relative h-11 w-full min-w-[200px]">
            <input type="email" wire:model.defer="email"
              placeholder="Email"
              class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-700  focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
            />
            <label class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-700  transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-700  after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-700  peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-700  peer-focus:after:scale-x-100 peer-focus:after:border-blue-700  peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700 ">
              Email
            </label>
            @error('email') <span class="text-red-700 ">{{ $message }}</span>@enderror
          </div>

          <div class="relative h-11 w-full min-w-[200px]">
            <input type="password" wire:model.defer="password"
              placeholder="Password"
              class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-700  focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
            />
            <label class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-700  transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-700  after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-700  peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-700  peer-focus:after:scale-x-100 peer-focus:after:border-blue-700  peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700 ">
              Password
            </label>
            @error('password') <span class="text-red-700 ">{{ $message }}</span>@enderror
          </div>

          <button data-dialog-target="dialog-xs" wire:click.prevent="login"
  class="middle none center rounded-lg bg-blue-700  py-3 w-full font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-700 /20 transition-all hover:shadow-lg hover:shadow-blue-700 /40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true"
>
  Sign In
</button>
          </div>
        </form>
        <div class="m-5 text-sm">
        Don't have an accout? <a wire:click.prevent="registration" class="text-blue-700  cursor-pointer"> Sign Up </a>
        </div>
        </div>
</div>
@endif
</div>

<div wire:loading>
  <div wire:ignore
    data-dialog-backdrop="dialog-xs"
    data-dialog-backdrop-close="true"
    class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300"
  >
    <div
      data-dialog="dialog-xs"
      class="relative m-4 w-1/4 min-w-[25%] max-w-[25%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl"
    >
      <div class="flex shrink-0 items-center p-4 font-sans text-2xl font-semibold leading-snug text-blue-gray-900 antialiased">
        Loading...
      </div>
      <div class="flex justify-center border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 p-4 font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased">
          <div class="border-t-transparent border-solid animate-spin  rounded-full border-blue-400 border-8 h-32 w-32"></div>
      </div>
     
    </div>
  </div>
</div>