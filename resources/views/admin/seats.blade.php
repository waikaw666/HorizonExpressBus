
<x-admin-layout>
<div class="col-span-8 w-full border p-12 grid grid-cols-4 gap-6 bg-gray-50 rounded w-[500px] mx-auto">
    @foreach($seats as $seat)
        <button
            type="button"
            class="border h-24 seat-button bg-white rounded"

        >
            Seat {{ $seat->seat_number }}
        </button>
    @endforeach
</div>

</x-admin-layout>
