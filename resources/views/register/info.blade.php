<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="max-w-xl mx-auto bg-white p-6 border rounded-lg">
        <h1 class="text-2xl font-semibold mb-4 text-blue-500">Seat Reservation Confirmation</h1>
        <p class="text-gray-700 mb-6">You've reserved seats with your name. Please fill out your payment information to confirm your booking.</p>

        <form action="/bookings/{{$booking->id}}/info" method="POST" class="space-y-6">
            @csrf

            <!-- Display User Information -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Your Details</h2>
                <p class="text-gray-700 mt-4"><strong>Name:</strong> {{ $booking->name }}</p>
                <p class="text-gray-700 mt-4"><strong>Phone Number:</strong> {{ $booking->phone_number }}</p>
            </div>

            <!-- Payment Method -->
            <div class="space-y-2">
                <label for="payment_method" class="block font-medium text-gray-700">Payment Method</label>
                <div class="flex items-center space-x-4 pt-3">
                    <label class="flex items-center">
                        <input type="radio" name="payment_method" value="credit_card" class="text-blue-500 focus:ring-blue-500" required>
                        <span class="ml-2">Credit Card</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="payment_method" value="paypal" class="text-blue-500 focus:ring-blue-500" required>
                        <span class="ml-2">PayPal</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="payment_method" value="bank_transfer" class="text-blue-500 focus:ring-blue-500" required>
                        <span class="ml-2">Bank Transfer</span>
                    </label>
                </div>
            </div>

            <!-- Payment Information -->
            <div>
                <label for="payment_information" class="block font-medium text-gray-700">Payment Information</label>
                <input type="text" name="payment_information" placeholder="Enter your card or payment details" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3" required>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                    Confirm Payment
                </button>
            </div>
        </form>
    </div>
</x-layout>
