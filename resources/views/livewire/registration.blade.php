<div class="flex flex-col items-center min-h-screen">
    <h3 class="block font-sans mt-10 mb-5 text-2xl font-semibold leading-snug tracking-normal text-inherit antialiased">
        Sign In to Striker DSS
    </h3>
    <div class="shadow-md border w-1/2 rounded-lg">
        <form>
            <div class="flex flex-col gap-10 justify-center items-center m-5">
                <div class="relative h-11 w-full min-w-[200px]">
                    <input placeholder="Username"
                        class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                    <label
                        class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-500 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-500 after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:after:scale-x-100 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Username
                    </label>
                </div>

                <div class="relative h-11 w-full min-w-[200px]">
                    <input placeholder="Password"
                        class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-blue-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                    <label
                        class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-500 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-500 after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:after:scale-x-100 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Password
                    </label>
                </div>

                <button type="submit"
                    class="middle none center rounded-lg bg-blue-500 py-3 w-full font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true">
                    Sign In
                </button>
            </div>
        </form>
        <div class="m-5 text-sm">
            Alreadt have an accout? <a href="{{ 'signin' }}" class="text-blue-500"> Sign In </a>
        </div>
    </div>
</div>
