<div class="flex flex-col items-center justify-start min-h-screen">
    <div class="shadow-lg border bg-white w-full md:w-2/3 rounded-lg m-10">
    <div class="flex flex-col gap-5 items-center justify-center m-5">
    <h1 class="text-5xl font-light"> {{$team->team_name}} </h1>
    <h1 class="text-2xl font-light"> Striker Candidates: </h1>

    <div class="flex flex-col lg:flex-row justify-center items-center flex-wrap w-full">
        <div class="flex justify-start flex-wrap gap-1">
    @foreach($alternatif as $alternatifs)
    <div class="flex flex-row items-center gap=2 bg-slate-50 border p-3 shadow-md rounded-lg">
    <a href="{{url('showCandidate/'.$alternatifs->id)}}">
    <img class="relative inline-block h-12 w-12 rounded-full object-cover object-center" src="{{asset('storage/'.$alternatifs->image_path)}}">
    {{$alternatifs->name}}
</a>
</div>
    @endforeach
        </div>
</div>
    </div>
    </div>
</div>
