<div class="border p-8 mb-4">
    <h1 class="text-xl font-bold">
    // will render title which includes the origin and destination
    </h1>
    <h2 class="text-lg font-semibold">
        // will render subtitle which include bus information

    </h2>
    {{
$departure_time
}}
    
    {{
$arrival_time
}}
    <h3 class="text-lg font-semibold">
        // will render departure time and arrival time
    </h3>

    <p>

        // will render notes which will include everything else
        {{$note}}
    </p>

    <div class="w-full flex justify-end">
        <a href="/register/{{$id}}/seat" >
            <button class="px-4 py-3 text-lg bg-blue-600 text-white rounded ">
                Select this Trip
            </button>

        </a>
    </div>


</div>
