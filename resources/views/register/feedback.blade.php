<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="max-w-xl mx-auto bg-white p-6 border rounded-lg">
        <h1 class="text-2xl font-semibold mb-4 text-blue-500">Feedback Form - Horizon Express</h1>
        <p class="text-gray-700 mb-6">We value your feedback. Please fill out the form below to help us improve our services.</p>

        <form action="/feedbacks" method="POST" class="space-y-6">
            @csrf
            <!-- Name -->
            <div>
                <label for="name" class="block font-medium text-gray-700">Your Name</label>
                <input type="text" name="name" value="{{ request()->get('name') ?? old('name') }}" placeholder="Enter your name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3" required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block font-medium text-gray-700">Your Email</label>
                <input type="email" name="email" placeholder="Enter your email" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3" required>
            </div>

            <!-- Feedback -->
            <div>
                <label for="feedback" class="block font-medium text-gray-700">Your Feedback</label>
                <textarea name="feedback" placeholder="Share your thoughts" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3" rows="4" required></textarea>
            </div>

            <!-- Rating -->
            <div class="space-y-2">
                <label for="rating" class="block font-medium text-gray-700">How would you rate your experience?</label>
                <div class="flex items-center space-x-4 pt-3">
                    <label class="flex items-center">
                        <input type="radio" name="rating" value="very_bad" class="text-blue-500 focus:ring-blue-500" required>
                        <span class="ml-2">Very Bad</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="rating" value="bad" class="text-blue-500 focus:ring-blue-500" required>
                        <span class="ml-2">Bad</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="rating" value="good" class="text-blue-500 focus:ring-blue-500" required>
                        <span class="ml-2">Good</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="rating" value="very_good" class="text-blue-500 focus:ring-blue-500" required>
                        <span class="ml-2">Very Good</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                    Submit Feedback
                </button>
            </div>
        </form>
    </div>
</x-layout>
