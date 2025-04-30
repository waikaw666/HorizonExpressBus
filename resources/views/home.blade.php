<x-layout>
    <x-slot:heading>
        <header class="bg-white shadow px-6 py-24 bg-fixed bg-contain overflow-auto bg-cover"
                style="background-image: url('/img/homewall.jpg')">
            <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 flex">
                <div class="flex-1">
                    <h1 class="text-5xl mb-2 text-white font-['Oswald']">Book Online Bus Ticket </h1>
                    <h1 class="text-5xl mb-8 text-white font-['Oswald']">Around Myanmar</h1>
                    <p class="mb-1 text-white/90">One of the leading providers in the express bus transportation
                        industry.</p>
                    <p class="text-white/90">Find the bus price for your ticket.</p>
                </div>


                <x-hero-search-form
                    :origins="$originList"
                    :destinations="$destinationList"
                ></x-hero-search-form>
            </div>
        </header>
    </x-slot:heading>
    <div class="flex justify-between py-6">
        <x-card>
            <x-slot:cardImg><img src="/img/booking-icon.png" class="w-12 h-12" alt="booking icon"></x-slot:cardImg>
            <x-slot:cardHeading>Easy Booking</x-slot:cardHeading>
            <x-slot:cardDesc>Quickly book your tickets with a streamlined and intuitive process.</x-slot:cardDesc>

        </x-card>
        <x-card>
            <x-slot:cardImg><img src="/img/route-icon.png" class="w-12 h-12" alt="route icon"></x-slot:cardImg>
            <x-slot:cardHeading>Route Selection
            </x-slot:cardHeading>
            <x-slot:cardDesc>Choose from a wide range of routes tailored to your travel needs.</x-slot:cardDesc>

        </x-card>
        <x-card>
            <x-slot:cardImg><img src="/img/support-icon.png" class="w-12 h-12" alt="support icon"></x-slot:cardImg>
            <x-slot:cardHeading>24/7 Support</x-slot:cardHeading>
            <x-slot:cardDesc>Get assistance anytime with our round-the-clock customer support.</x-slot:cardDesc>

        </x-card>
        <x-card>
            <x-slot:cardImg><img src="/img/secure-icon.png" class="w-12 h-12" alt="secure icon"></x-slot:cardImg>
            <x-slot:cardHeading>Secure Payment</x-slot:cardHeading>
            <x-slot:cardDesc>Safe and secure transactions with Master and VISA</x-slot:cardDesc>

        </x-card>
        <x-card>
            <x-slot:cardImg><img src="/img/review-icon.png" class="w-12 h-12" alt=""></x-slot:cardImg>
            <x-slot:cardHeading>Customer Reviews</x-slot:cardHeading>
            <x-slot:cardDesc>Share experiences on our review platform.</x-slot:cardDesc>

        </x-card>
    </div>
    <div class="flex mt-4">
        <div>
            <img src="/img/expressbus1.jpg" alt="image of buses" class="max-w-xl rounded-md">
        </div>
        <div class="max-w-2xl p-7 ml-2">
            <h1 class="font-bold text-2xl mb-4">Warmly Welcome to Horizon Express</h1>
            <p class="leading-7">
                Welcome to Horizon Express, your trusted partner in comfortable and reliable travel. With a rich history
                of providing safe and efficient transportation, we are committed to connecting you to your destinations
                with ease and convenience. Our fleet of modern buses, equipped with top-notch amenities, ensures that
                every journey is a pleasant experience.

                At Horizon Express, we understand that your time is valuable, which is why we offer a seamless booking
                process, competitive fares, and a variety of routes to meet your travel needs. Whether you are commuting
                for business, visiting family, or exploring new places, we are here to make your journey hassle-free.
            </p>
        </div>
    </div>
    <h1 class="text-3xl font-bold text-center mt-12 mb-6 font-['Oswald']">We Accept</h1>
    <div class="flex justify-between max-w-4xl mx-auto mb-2 py-3">
        <div>
            <img class="w-24 h-24" src="/img/visa-icon.png" alt="visa icon">
        </div>
        <div>
            <img class="w-24 h-24" src="/img/american-express-icon.png" alt="american express icon">
        </div>
        <div>
            <img class="w-24 h-24" src="/img/master-icon.png" alt="master icon">
        </div>
        <div>
            <img class="w-24 h-24" src="/img/union-icon.png" alt="union icon">
        </div>
        <div>
            <img class="w-24 h-24" src="/img/jcb-icon.png" alt="jcb icon">
        </div>
    </div>

</x-layout>
