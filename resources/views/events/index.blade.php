<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width:device-width, initial-scale=0.1">
        <title>{{$title}}</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-slate-100 min-h-screen p-8">

        <div class="max-w-4xl mx-auto">
            <header class="mb-10 flex justify-between items-center">
                <h1 class="text-4xl font-extrabold text-slate-800 tracking-tight">{{$title}}</h1>
            </header>

            <div class="grid gap-6">
               @foreach($events as $event)
                   <div class="bg-white rounded-xl shadow-sm border-slate-200 p-6 hover:shadow-md transition:shadow">
                       <div class="flex justify-between items-start">
                           <div>
                               <h2 class="text-2xl font-bold text-slate-900">{{$event->title}}</h2>
                               <p class="text-slate-600 mt-2">{{ $event->description }}</p>
                           </div>
                       </div>

               @endforeach
            </div>
        </div>
        </div>

    </body>
</html>
