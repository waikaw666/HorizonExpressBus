<div class="flex flex-col border-2 rounded-md w-52 items-center p-6 justify-between hover:shadow-lg cursor-pointer">
    <div>
        {{$cardImg}}
    </div>
    <div class="text-center">
        <h1 class="text-xl font-medium mt-3 mb-3 font-['Oswald']">{{$cardHeading}}</h1>
        <p class="font-['Montserrat'] text-sm">{{$cardDesc}}</p>
    </div>
    <div class="mt-4">
        <a href="/contact"><button class="bg-yellow-400 rounded-3xl px-4 py-2 hover:bg-yellow-300">Learn More</button></a>
    </div>
</div>
