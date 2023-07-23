<div class="flex flex-col items-center w-full min-h-screen">
    <div class="flex w-full flex-col items-center justify-center m-10">
        <div class="w-full md:w-10/12">
            <div class="w-full">
                <ul wire:ignore class="flex m-auto list-none w-3/4 flex-wrap rounded-xl bg-slate-400 p-1" data-tabs="tabs"
                    role="list">
                    <li class="z-30 flex-auto text-center">
                        <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                            data-tab-target="" active="" role="tab" aria-selected="true"
                            aria-controls="addCandidates">
                            <span class="ml-1 text-white">Candidates</span>
                        </a>
                    </li>
                    <li class="z-30 flex-auto text-center">
                        <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                            data-tab-target=""  role="tab" aria-selected="false" aria-controls="addTeam">
                            <span class="ml-1 text-white">Teams</span>
                        </a>
                    </li>
                </ul>
                <div data-tab-content="" class="p-5">

                    <!-- Add Team -->
                    <div class="hidden opacity-0 flex flex-col gap-5 items-center justify-center w-full" wire:ignore.self id="addTeam" role="tabpanel">
                        <div class="flex flex-col w-full items-center justify-center">
                            <div class="shadow-md border bg-white w-full md:w-full rounded-lg">
                                <div class="flex flex-col gap-10 justify-center w-full items-center mt-10">
                                    <div class="relative h-11 w-11/12">
                                        <input type="text" wire:model="team_name" placeholder="Team Name"
                                            class="peer h-full w-full border-b border-blue-gray-400 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-400 focus:border-blue-700 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                        <label
                                            class="after:content[' '] pointer-events-none absolute left-0 -top-2.5 flex h-full w-full select-none text-sm font-normal leading-tight text-blue-gray-700 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-blue-700 after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-700 peer-focus:text-sm peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:after:scale-x-100 peer-focus:after:border-blue-700 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                            Team Name
                                        </label>
                                        @error('team_name')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror

                                        @if (session()->has('message'))
                                            <span class="text-green-700">{{ session('message') }}</span>
                                        @endif
                                    </div>


                                    <button wire:click.prevent="insertTeam"
                                        class="middle none center rounded-lg bg-blue-700 py-3 w-11/12 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-700/20 transition-all hover:shadow-lg hover:shadow-blue-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        data-ripple-light="true">
                                        Add Team
                                    </button>
                                </div>
                                </form>

                                <div class="flex flex-col gap-1 mt-10 w-full items-center justify-center">
                                    <h3
                                        class="block font-sans mb-5 text-2xl font-thin leading-snug tracking-normal text-inherit antialiased">
                                        Teams
                                    </h3>

                                    <div class="flex flex-col items-center w-full">
                                        <div class="relative mb-5 h-11 w-11/12">
                                            <input type="text" wire:model="searchTeam"
                                                class="peer h-full w-full lg:w-1/4 rounded-lg border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-400 placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                placeholder=" " />
                                            <label
                                                class="behtmlFore:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full lg:w-1/4 select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                Search Team
                                            </label>
                                        </div>
                                        <table
                                            class="w-11/12 rounded-lg border text-center border-none shadow-lg bg-slate-50">
                                            <tr>
                                                <td> Name </td>
                                                <td> Action {{ $deleteTeamId }} </td>
                                            </tr>
                                            @foreach ($dataPaginate as $key => $team)
                                                <tr class="bg-white rounded-lg">
                                                    <td class="font-light w-fit">
                                                        
                                                            <input type="text"@if ($edit_mode_index !== $key) readonly  @endif
                                                                class=" text-center @if ($edit_mode_index === $key) border border-gray-400 @endif w-fit rounded-lg"
                                                                wire:change="updateTeam({{ $key }})"
                                                                wire:model.defer="teamsArray.{{ $key }}.team_name" />
                                                       
                                                    </td>
                                                    <td class="font-light">
                                                        <div class="flex flex-row justify-center gap-3">
                                                            <a href="{{ url('showTeam/' . $team['id']) }}"> <i
                                                                    class="material-icons"> visibility </i> </a>
                                                            <button wire:click.prevent="editMode({{ $key }})">
                                                                <i class="material-icons"> edit </i> </button>
                                                            <button
                                                                onclick="confirm('Are you sure you want to delete this team?') || event.stopImmediatePropagation()"
                                                                wire:click="deleteTeamId({{ $team['id'] }})"> <i
                                                                    class="material-icons"> delete </i> </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="m-3">
                                        {{ $dataPaginate->links() }}
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col gap-5 items-center justify-center w-full" id="addCandidates" wire:ignore.self
                        role="tabpanel">
                        <div class="shadow-md border bg-white w-full rounded-lg">
                            <form>
                                <div class="flex flex-col gap-10 justify-center items-center mt-10 mb-5">
                                    <div class="relative h-10 w-11/12">
                                        <select wire:model="team_id"
                                            class="peer h-full w-full rounded-[7px] border border-gray-400 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-700 placeholder-shown:border-t-blue-700 empty:!bg-red-700 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                                            <option>...</option>
                                            @foreach ($teamsAll as $team)
                                                <option value="{{ value($team->id) }}">{{ $team->team_name }}</option>
                                            @endforeach
                                        </select>
                                        <label
                                            class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-400 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-400 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                            Select a Team
                                        </label>
                                        @error('team_id')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                        @if (session()->has('message'))
                                            <span class="text-green-700">{{ session('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-full flex flex-col items-center mb-5">
                                    <div class="flex flex-row items-center justify-between w-11/12">
                                        <h1> Candidates: </h1>
                                        <button
                                            class="select-none rounded-lg bg-blue-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-700/20 transition-all hover:shadow-lg hover:shadow-blue-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button" data-dialog-target="sign-in-dialog">
                                            Add
                                        </button>

                                    </div>
                                </div>
                                <!-- Add Candidate Modal -->
                                <div wire:ignore.self data-dialog-backdrop="sign-in-dialog"
                                    data-dialog-backdrop-close="true"
                                    class="flex justify-center items-center pointer-events-none fixed inset-0 z-[999] h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                                    <div wire:ignore.self data-dialog="sign-in-dialog"
                                        class="relative mx-auto flex w-3/4 lg:w-1/2 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">

                                        <div class="flex flex-col gap-4 p-3 lg:p-6">

                                            <h3
                                                class="block font-sans text-2xl font-light leading-snug tracking-normal text-black antialiased">
                                                Add Striker Candidate
                                            </h3>

                                            <div class="flex flex-col items-center justify-center">
                                                <input wire:model="photo" type="file"
                                                    accept="image/png, image/jpeg, image/jpg" class="hidden"
                                                    id="photo">
                                                <label for="photo">
                                                    @if ($success == 1)
                                                        <img class="relative inline-block h-36 w-36 rounded-full object-cover object-center"
                                                            alt="Image placeholder" src="{{ asset($filepath) }}">
                                                    @else
                                                        <img class="relative inline-block h-36 w-36 rounded-full object-cover object-center"
                                                            alt="Image placeholder"
                                                            src="{{url('assets/default/default.jpg')}}">
                                                    @endif
                                                </label>
                                                @error('photo')
                                                    <span class="text-red-700">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col w-full">
                                            <div class="relative h-11 w-full">
                                                <input type="text" wire:model="candidateName"
                                                    class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                    placeholder=" " />
                                                <label
                                                    class="behtmlFore:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                    Name
                                                </label>
                                            </div>
                                            @error('candidateName')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                        </div>
                                            <div
                                                class="flex flex-col w-full lg:flex-row gap-2 lg:gap-1 lg:justify-between">
                                                <div class="flex flex-col w-full">
                                                <div class="relative h-11 w-full">
                                                    <input type="number" min="0" wire:model="stamina"
                                                        class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                        placeholder=" " />
                                                    <label
                                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                        Stamina
                                                    </label>
                                                </div>
                                                    @error('stamina')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                                </div>
                                                
                                                <div class="flex flex-col w-full">
                                                <div class="relative h-11">
                                                    <input type="number" wire:model="posture"
                                                        class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                        placeholder=" " />
                                                    <label
                                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                        Posture
                                                    </label>
                                                </div>
                                                @error('posture')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                            </div>
                                            
                                            <div class="flex flex-col w-full">
                                                <div class="relative h-11 w-full">
                                                    <input type="number" wire:model="finishing"
                                                        class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                        placeholder=" " />
                                                    <label
                                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                        Finishing
                                                    </label>
                                                </div>
                                                @error('finishing')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                            </div>
                                            </div>

                                            
                                            <div class="flex flex-col lg:flex-row gap-2 justify-between">
                                                <div class="flex flex-col w-full">
                                                <div class="relative h-11 w-full">
                                                    <input type="number" wire:model="dribbling"
                                                        class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                        placeholder=" " />
                                                    <label
                                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                        Dribbling
                                                    </label>
                                                </div>
                                                @error('dribbling')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                            </div>    

                                            <div class="flex flex-col w-full">
                                                <div class="relative h-11 w-full">
                                                    <input type="number" wire:model="header"
                                                        class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                        placeholder=" " />
                                                    <label
                                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                        Header
                                                    </label>
                                                </div>
                                                @error('header')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                            </div>

                                            <div class="flex flex-col w-full">
                                                <div class="relative h-11 w-full">
                                                    <input type="number" wire:model="attitude"
                                                        class="peer h-full w-full rounded-md border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-black placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                        placeholder=" " />
                                                    <label
                                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                                        Attitude
                                                    </label>
                                                </div>
                                                @error('attitude')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <div class="p-6 pt-0">
                                            <button wire:click="insertCandidate" id="closeCandidate"
                                                class="block w-full select-none rounded-lg bg-gradient-to-tr from-blue-700 to-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-700/20 transition-all hover:shadow-lg hover:shadow-blue-700/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                type="button" data-ripple-light="true">
                                                Add Candidate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Candidate Modal -->

                            <div class="flex justify-center w-full">
                                <div class="flex flex-col gap-5 items-center w-11/12">
                                    <div class="relative h-11 w-full">
                                        <input type="text" wire:model="searchCandidate"
                                            class="peer h-full w-full lg:w-1/4 rounded-lg border border-black border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-400 placeholder-shown:border-t-blue-gray-400 focus:border-2 focus:border-blue-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                            placeholder=" " />
                                        <label
                                            class="behtmlFore:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full lg:w-1/4 select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-black before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-black after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-blue-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-blue-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-700">
                                            Search Candidate
                                        </label>
                                    </div>
                                    <table wire:model="candidateTable" class="w-full rounded-lg border text-center border-none shadow-lg mb-5">
                                        <tr class="bg-slate-50">
                                            <td> No. </td>
                                            <td> Name </td>
                                            <td> Action </td>
                                        </tr>
                                        @foreach ($alternatif as $key => $alternatifs)
                                            <tr class="bg-white rounded-lg">
                                                <td class="font-light"> {{ $alternatif->firstItem() + $key }}. </td>
                                                <td class="font-light"> {{ $alternatifs->name }} </td>
                                                <td class="font-light">
                                                    <div class="flex flex-row justify-center gap-3">
                                                        <a href="{{ url('showCandidate/' . $alternatifs->id) }}"> <i
                                                                class="material-icons"> visibility </i> </button>
                                                            <a href="{{ url('editCandidate/' . $alternatifs->id) }}">
                                                                <i class="material-icons"> edit </i> </a>
                                                            <button
                                                                onclick="confirm('Are you sure you want to delete this candidate?') || event.stopImmediatePropagation()"
                                                                wire:click.prevent="deleteCandidateId({{ $alternatifs->id }})">
                                                                <i class="material-icons"> delete </i> </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="flex justify-center m-3">
                                {{ $alternatif->links() }}
                            </div>
                            </div>
                            @if($team_id !== null)
                            @if($alternatifBest !== null)
                            <div class="shadow-md border flex justify-center bg-white w-full rounded-lg">
                                <div class="flex justify-center m-5 w-11/12">
                                <h1 class="text-lg lg:text-2xl font-thin"> Best striker for {{$alternatifBest->team_name}} is: {{$alternatifBest->name}} </h1>
                                    </div>
                            </div>

                            <div class="shadow-md border flex justify-center bg-white w-full rounded-lg">
                                <div class="flex flex-col items-center justify-center m-3 w-11/12">
                                <h1 class="text-xl lg:text-3xl font-thin mb-5"> Ranking </h1>

                                <div class="flex justify-center overflow-x-scroll lg:overflow-x-auto w-full shadow-lg">
                                        <table class="w-full rounded-lg border text-center border-none shadow-lg">
                                            <tr class="bg-slate-50">
                                                <td> No. </td>
                                                <td> Name </td>
                                                <td> Stamina </td>
                                                <td> Posture </td>
                                                <td> Finishing </td>
                                                <td> Dribbling </td>
                                                <td> Header </td>
                                                <td> Attitude </td>
                                                <td> Indeks Vikor </td>
                                            </tr>
                                            @foreach ($alternatifSort as $key => $alternatifs)
                                                <tr class="bg-white rounded-lg">
                                                    <td class="font-light"> {{ $alternatif->firstItem() + $key }}. </td>
                                                    <td class="font-light"> {{ $alternatifs->name }} </td>
                                                    <td class="font-light">
                                                        {{ $alternatifs->stamina }}
                                                    </td>
                                                    <td class="font-light">
                                                        {{ $alternatifs->posture }}
                                                    </td>
                                                    <td class="font-light">
                                                        {{ $alternatifs->finishing }}
                                                    </td>
                                                    <td class="font-light">
                                                        {{ $alternatifs->dribbling }}
                                                    </td>
                                                    <td class="font-light">
                                                        {{ $alternatifs->header }}
                                                    </td>
                                                    <td class="font-light">
                                                        {{ $alternatifs->attitude }}
                                                    </td>
                                                    <td class="font-light">
                                                        {{ $alternatifs->indeks_vikor }}
                                                    </td>
    
                                                </tr>
                                            @endforeach
                                        </table>
                                        
                                   </div>
                                   <div class="mt-8">
                                    {{ $alternatifSort->links() }}
                                </div>
                                    </div>
                            </div>
                            @endif
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts
<script>
    document.addEventListener('livewire:load', function () {
        // Save data to localStorage
        function saveDataLocally(data) {
            localStorage.setItem('$team_id', data);
        }

        // Retrieve data from localStorage
        function getSavedData() {
            return localStorage.getItem('$team_id') || null;
        }

        Livewire.hook('component.initialized', function(component) {
            component.set('$team_id', getSavedData());
        });

        Livewire.on('saveData', function(data) {
            saveDataLocally(data);
        });
    });
</script>