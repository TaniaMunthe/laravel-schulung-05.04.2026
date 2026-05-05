<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- style: Ensure x-cloak (Alpine.js) works before JS loads -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 md:p-12">
<div class="max-w-7xl mx-auto">
    {{ $slot }}
</div>
@livewireScripts
</body>
</html>
