@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow" x-data="{ users: [] }" x-init="fetchUsers()">
    <h2 class="text-2xl font-semibold mb-4">User List</h2>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">UID</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Role</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="user in users" :key="user.uid">
                <tr>
                    <td class="border p-2" x-text="user.uid"></td>
                    <td class="border p-2" x-text="user.name"></td>
                    <td class="border p-2" x-text="user.role"></td>
                </tr>
            </template>
        </tbody>
    </table>

    <script>
        function fetchUsers() {
            fetch('/api/users')
                .then(response => response.json())
                .then(data => this.users = data);
        }
    </script>
</div>
@endsection