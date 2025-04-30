<div class="w-[420px]">
    <form action="/search" method="GET" class="bg-white p-5 flex flex-col rounded bg-white/[0.85] shadow-md">

        <h1 class="text-center text-xl font-bold mb-2">SEARCH TRIPS</h1>

        <!-- Origin Field -->
        <label class="mb-1 text-xs font-medium font-['Montserrat']" for="origin">ORIGIN</label>
        <select id="origin" class="border-2 mb-2 p-2 outline-none capitalize" name="origin">
            @foreach($origins as $origin)
                <option class="capitalize" value="{{$origin->id}}">{{$origin->origin_name}}</option>
            @endforeach
        </select>

        <!-- Destination Field -->
        <label class="mb-1 text-xs font-medium font-['Montserrat']" for="destination">DESTINATION</label>
        <select id="destination" required class="border-2 mb-2 p-2 outline-none capitalize" name="destination">
            @foreach($destinations as $destination)
                <option class="capitalize" value="{{$destination->id}}">{{$destination->destination_name}}</option>
            @endforeach
        </select>

        <!-- Date Field -->
        <label class="mb-1 text-xs font-medium font-['Montserrat']" for="date">DATE</label>
        <input class="border-2 mb-8 p-1.5 outline-none" type="date" name="date" required>


        <!-- Search Button -->
        <button id="search_button" class="bg-yellow-400 px-1 py-2 hover:bg-yellow-500 font-['Montserrat'] disabled:bg-yellow-300" type="submit">SEARCH</button>

        

    </form>
</div>

<script>
    const originSelect = document.getElementById('origin');
    const destinationSelect = document.getElementById('destination');
    const searchButton = document.getElementById('search_button');

    function toggleSearchButton() {
        if (originSelect.value === destinationSelect.value) {
            searchButton.disabled = true;
            searchButton.classList.add('bg-gray-400', 'cursor-not-allowed');
            searchButton.classList.remove('bg-yellow-400', 'hover:bg-yellow-300');
        } else {
            searchButton.disabled = false;
            searchButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
            searchButton.classList.add('bg-yellow-400', 'hover:bg-yellow-300');
        }
    }

    // Add event listeners to check when origin or destination changes
    originSelect.addEventListener('change', toggleSearchButton);
    destinationSelect.addEventListener('change', toggleSearchButton);

    // Initial check on page load
    toggleSearchButton();
</script>
