<x-admin-layout>
    <div class="my-6 p-8 rounded-lg border grid grid-cols-1 gap-6 bg-white text-sm">
        <form method="POST" action="{{ isset($admin) ? '/admin/admins/' . $admin->id : '/admin/admins' }}" class="grid grid-cols-12 gap-6">
            @csrf
            @if(isset($admin))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Name</label>
                <input
                    type="text"
                    name="name"
                    required
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter Name"
                    value="{{ isset($admin) ? $admin->name : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Phone Number</label>
                <input
                    type="text"
                    name="phonenumber"
                    required
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter admin Phone Number"
                    value="{{ isset($admin) ? $admin->phonenumber : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Email</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter Email"
                    value="{{ isset($admin) ? $admin->email : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter the password"
                    >
            </div>


            <div class="col-span-12">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition ml-auto">
                    {{ isset($admin) ? 'Update' : 'Submit' }}
                </button>
            </div>
        </form>
    </div>

    <div class="p-8 mt-8 bg-white rounded-lg border">
        <div class="grid grid-cols-1 gap-4">
            @if($admins->isEmpty())
                <p class="text-gray-500">No admins available.</p>
            @else
                <div class="grid grid-cols-12 text-blue-500 font-semibold mb-2">
                    <div class="col-span-3">Name</div>
                    <div class="col-span-3">Phone Number</div>
                    <div class="col-span-3">Email</div>
                    <div class="col-span-3"></div>
                </div>
                @foreach($admins as $admin)
                    <div class="grid grid-cols-12 items-center py-3">
                        <div class="col-span-3">{{ $admin->name ?? 'N/A' }}</div>
                        <div class="col-span-3">{{ $admin->phonenumber ?? '-' }}</div>
                        <div class="col-span-3">{{ $admin->email ?? 'N/A' }}</div>
                        <div class="col-span-3 flex gap-5 justify-end">
                            <a href="{{ url('/admin/admins/' . $admin->id . '/edit') }}" class="px-4 py-1.5 rounded bg-white border">
                                Edit
                            </a>

                            <form action="/admin/admins/{{ $admin->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-1.5 rounded  bg-red-400 text-slate-100">
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
