<x-admin-layout>
    <div class="my-6 p-8 rounded-lg border grid grid-cols-1 gap-6 bg-white text-sm">
        <form method="POST" action="{{ isset($origin) ? '/admin/origins/' . $origin->id : '/admin/origins' }}" class="grid grid-cols-12 gap-6">
            @csrf
            @if(isset($origin))
                @method('PUT')
            @endif



            <div class="grid grid-cols-1 gap-4 col-span-12">
                <label class="font-medium">Origin Name:</label>
                <input
                    type="text"
                    name="origin_name"
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter Origin Name"
                    value="{{ isset($origin) ? $origin->origin_name : '' }}">
            </div>

            <div class="col-span-12">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition ml-auto">
                    {{ isset($origin) ? 'Update' : 'Submit' }}
                </button>
            </div>
        </form>
    </div>

    <div class="p-8 mt-8 bg-white rounded-lg border">
        <div class="grid grid-cols-1 gap-4">
            @if($origins->isEmpty())
                <p class="text-gray-500">No buses available.</p>
            @else
                <div class="grid grid-cols-12 text-blue-500 font-semibold mb-2">
                    <div class="col-span-9">Origin List</div>
                    <div class="col-span-3"></div>
                </div>
                @foreach($origins as $origin)
                    <div class="grid grid-cols-12 items-center py-3">
                        <div class="col-span-9">{{ $origin->origin_name ?? 'N/A' }}</div>
                        <div class="col-span-3 flex gap-5 justify-end">
                            <a href="{{ url('/admin/origins/' . $origin->id . '/edit') }}" class="px-4 py-1.5 rounded bg-white border">
                                Edit
                            </a>

                            <form action="/admin/origins/{{ $origin->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-1.5 rounded bg-red-400 text-slate-100">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-admin-layout>
