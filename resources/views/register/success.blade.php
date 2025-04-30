<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="max-w-2xl mx-auto bg-white p-8 border rounded-lg text-center">
        <h1 class="text-2xl font-bold mb-4 text-blue-500">Booking Receipt</h1>

        <p class="text-gray-700 mb-6">Thank you for booking with Horizon Express. Below is your booking receipt:</p>

        <!-- Receipt Table -->
        <table class="table-auto w-full text-left border-collapse mb-6">
            <tbody>
            <!-- Name -->
            <tr>
                <td class="font-medium text-gray-700 py-2">Name:</td>
                <td class="py-2">{{ $booking->name }}</td>
            </tr>

            <!-- Phone Number -->
            <tr>
                <td class="font-medium text-gray-700 py-2">Phone Number:</td>
                <td class="py-2">{{ $booking->phone_number }}</td>
            </tr>

            <!-- Payment Method -->
            <tr>
                <td class="font-medium text-gray-700 py-2">Payment Method:</td>
                <td class="py-2">{{ ucfirst(str_replace('_', ' ', $booking->payment_method)) }}</td>
            </tr>

            <!-- Payment Information -->
            <tr>
                <td class="font-medium text-gray-700 py-2">Payment Information:</td>
                <td class="py-2">{{ $booking->payment_information }}</td>
            </tr>

            <!-- Status -->
            <tr>
                <td class="font-medium text-gray-700 py-2">Booking Status:</td>
                <td class="py-2">{{ ucfirst($booking->status) }}</td>
            </tr>
            </tbody>
        </table>

        <!-- Redirect Button to Feedback -->
        <a href="{{ url('/feedbacks?name=' . $booking->name) }}" class="inline-block bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
            Leave Feedback
        </a>

        <p class="text-gray-600 mt-6">If you have any questions regarding your booking, please contact us at support@horizonexpress.com.</p>
    </div>
</x-layout>
