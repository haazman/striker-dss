<div class="min-h-screen">
  <div class="flex flex-col items-center justify-center m-10">
  <div class="w-full md:w-1/2">
    <div class="relative right-0 w-full">
      <ul wire:ignore
        class="relative flex list-none flex-wrap rounded-xl bg-slate-400 p-1"
        data-tabs="tabs"
        role="list"
      >
        <li class="z-30 flex-auto text-center">
          <a
            class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
            data-tab-target=""
            active=""
            role="tab"
            aria-selected="true"
            aria-controls="addTeam"
          >
            <span class="ml-1 text-white">Add Team</span>
          </a>
        </li>
        <li class="z-30 flex-auto text-center">
          <a
            class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
            data-tab-target=""
            role="tab"
            aria-selected="false"
            aria-controls="addCandidates"
          >
            <span class="ml-1 text-white">Add Candidates</span>
          </a>
        </li>
      </ul>
      <div data-tab-content="" class="p-5">
        <div class="block opacity-100" id="addTeam" role="tabpanel">

            <div class="flex flex-col w-full items-center">
              <div class="shadow-md border bg-white w-full md:w-full rounded-lg">
                  <form>
                  <div class="flex flex-col gap-10 justify-center items-center m-5">
                    <div class="relative h-11 w-full min-w-[200px]">
                      <input type="text" wire:model="team_name"
                        placeholder="Team Name"
                        class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                      />
                      <label class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-500 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-500 after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:after:scale-x-100 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Team Name
                      </label>
                      @error('team_name') <span class="text-red-500">{{ $message }}</span>@enderror

                      @if (session()->has('message'))
                      <span class="text-green-500">{{ session('message') }}</span>
                      @endif
                    </div>
          
          
                    <button wire:click.prevent="insertTeam"
            class="middle none center rounded-lg bg-blue-500 py-3 w-full font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            data-ripple-light="true"
          >
           Add Team
          </button>
                    </div>
                  </form>
                  </div>
          </div>
          </p>
        </div>
        <div class="hidden opacity-0 flex justify-center w-full" id="addCandidates" role="tabpanel">
            <div class="shadow-md border bg-white w-full rounded-lg">
              <form>
              <div class="flex flex-col gap-10 justify-center items-center m-5">
                <div class="relative h-10 w-full min-w-[200px]">
                  <select class="peer h-full w-full rounded-[7px] border border-black border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-200 empty:!bg-red-500 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                    <option value="brazil">Brazil</option>
                    <option value="bucharest">Bucharest</option>
                    <option value="london">London</option>
                    <option value="washington">Washington</option>
                  </select>
                  <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Select a Team
                  </label>
                </div>
                <!-- Modal -->
                <div class="flex flex-row items-center justify-between w-full">
                  <h1> Candidate: </h1>
                <button
    class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
    type="button"
    data-dialog-target="sign-in-dialog"
  >
    Add
  </button>
                </div>
  <button type="submit" wire:click.prevent=""
      class="middle none center rounded-lg bg-blue-500 py-3 w-full font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
      data-ripple-light="true"
      >
      Submit
      </button>
    </form>

    <!-- Modal -->
  <div
    data-dialog-backdrop="sign-in-dialog"
    data-dialog-backdrop-close="true"
    class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300"
  >
    <div
      data-dialog="sign-in-dialog"
      class="relative mx-auto flex w-full max-w-[24rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md"
    >
        
      <div class="flex flex-col gap-4 p-6">
          <h3 class="block font-sans text-2xl font-light leading-snug tracking-normal text-black antialiased">
              Add Striker Candidate
            </h3>
        <div class="relative h-11 w-full min-w-[200px]">
          <input
            class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
            placeholder=" "
          />
          <label class="behtmlFore:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Name
          </label>
        </div>
        <div class="relative h-11 w-full min-w-[200px]">
          <input
            class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
            placeholder=" "
          />
          <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Goal Per Match
          </label>
        </div>
      </div>
      <div class="p-6 pt-0">
        <button
          class="block w-full select-none rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button"
          data-ripple-light="true"
        >
          Sign In
        </button>
      </div>
    </div>
    <!-- Modal -->
  </div>
          </p>
        </div>
      </div>
    </div>
  </div>      
      
    
            </div>
      </div>
    </div>
