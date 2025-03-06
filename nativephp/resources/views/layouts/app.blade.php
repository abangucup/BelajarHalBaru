<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fingerprint Management</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 text-gray-900">
   <div class="min-h-screen flex flex-col">
      <nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
         <h1 class="text-xl font-bold">Fingerprint Management</h1>
         <div>
            <a href="{{ route('user.index') }}" class="px-4">Users</a>
            {{-- <a href="{{ route('attendance.index') }}" class="px-4">Attendance</a> --}}
            {{-- <a href="{{ route('device.control') }}" class="px-4">Device Control</a> --}}
         </div>
      </nav>

      <main class="p-6">
         @yield('content')
      </main>
   </div>
</body>

</html>