<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="w-full grid grid-cols-12 gap-6">
        <!-- Seat Selection Section -->
        <div class="col-span-8 w-full border p-12 grid grid-cols-4 gap-6 bg-gray-50 rounded">
            @foreach($seats as $seat)
                @if(collect($reserved_seats_id_list)->contains($seat['id']))
                    <button
                        type="button"
                        class="border h-24 seat-button bg-red-500 text-white rounded"
                        data-seat="{{ $seat['id'] }}"
                        data-price="{{ $schedule->price }}"
                        disabled
                    >
                        Seat {{ $seat['id'] }} Reserved
                    </button>
                @else
                    <button
                        type="button"
                        class="border h-24 seat-button bg-white rounded"
                        data-seat="{{ $seat['id'] }}"
                        data-price="{{ $schedule->price }}"
                        onclick="toggleSeatSelection(this)"
                    >
                        Seat {{ $seat['id'] }} ({{ $schedule->price }})
                    </button>
                @endif
            @endforeach
        </div>

        <!-- Booking Form Section -->
        <div class="col-span-4 space-y-8">
            <form class="border p-12 grid gap-4" action="/prebook" method="POST">
                @csrf
                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                <input type="hidden" name="selected_seats" id="selected_seats">
                <input type="hidden" name="total_price" id="total_price_input">

                <!-- Display selected seats and price dynamically -->
                <p>Selected Seats: <span id="selected_seats_display">None</span></p>
                <p>Total Price: <span id="total_price_display">0</span></p>

                <label for="name">Your Name</label>
                <input class="p-2 border" type="text" name="name" required>

                <label for="phone_number">Your Phone Number</label>
                <input class="p-2 border" type="text" name="phone_number" required>

                <!-- Submit button -->
                <button id="submit_button" class="p-2 bg-blue-500 hover:bg-blue-600 disabled:bg-blue-300 mt-4" type="submit" disabled>Proceed to Payment</button>
            </form>
        </div>
    </div>

    <script>
        let selectedSeats = [];
        let totalPrice = 0;

        function toggleSeatSelection(button) {
            const seatId = button.getAttribute('data-seat');
            const seatPrice = parseFloat(button.getAttribute('data-price'));

            if (selectedSeats.includes(seatId)) {
                // Deselect the seat
                selectedSeats = selectedSeats.filter(id => id !== seatId);
                totalPrice -= seatPrice;
                button.classList.remove('bg-green-500');
            } else {
                // Select the seat
                selectedSeats.push(seatId);
                totalPrice += seatPrice;
                button.classList.add('bg-green-500');
            }

            // Update displayed data
            document.getElementById('selected_seats').value = selectedSeats.join(',');
            document.getElementById('selected_seats_display').textContent = selectedSeats.length > 0 ? selectedSeats.join(', ') : 'None';
            document.getElementById('total_price_display').textContent = totalPrice.toFixed(2);
            document.getElementById('total_price_input').value = totalPrice.toFixed(2);

            // Enable/disable the submit button based on seat selection
            document.getElementById('submit_button').disabled = selectedSeats.length === 0;
        }
    </script>
</x-layout>
