<x-admin-layout>
    <div class="max-w-4xl mx-auto bg-white p-6 border rounded-lg mt-4">
        <h1 class="text-2xl font-semibold mb-4 text-blue-500">Feedbacks</h1>

        @if ($feedbacks->isEmpty())
            <p class="text-gray-700">No feedback available at the moment.</p>
        @else
            <ul class="space-y-4">
                @foreach ($feedbacks as $feedback)
                    <li class="border-b pb-4">
                        <p class="text-lg font-semibold text-blue-500">{{ $feedback->name }}</p>
                        <p class="text-sm text-gray-500">{{ $feedback->email }}</p>
                        <p class="mt-2 text-gray-700">{{ $feedback->feedback }}</p>
                        <div class="mt-2">
                            <span class="text-sm font-medium text-gray-600">Rating: </span>
                            <span class="text-sm {{ $feedback->status == 'very_good' ? 'text-green-500' : ($feedback->status == 'very_bad' ? 'text-red-500' : 'text-yellow-500') }}">
                                {{ ucfirst(str_replace('_', ' ', $feedback->status)) }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-admin-layout>
