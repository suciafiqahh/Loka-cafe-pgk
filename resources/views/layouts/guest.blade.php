<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Loka Cafe') }}</title>

       
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

       
        <script src="https://cdn.tailwindcss.com"></script>
        
       
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        animation: {
                            blob: "blob 7s infinite",
                        },
                        keyframes: {
                            blob: {
                                "0%": { transform: "translate(0px, 0px) scale(1)" },
                                "33%": { transform: "translate(30px, -50px) scale(1.1)" },
                                "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
                                "100%": { transform: "translate(0px, 0px) scale(1)" },
                            },
                        },
                    },
                },
            }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        
     
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-500 to-indigo-600 relative overflow-hidden">
            
        
            <div class="absolute top-0 left-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>

          
            <div class="relative z-10 w-full sm:max-w-md flex flex-col items-center">
                
              
                <div class="mb-6">
                    <a href="/" class="flex flex-col items-center group">
                        <div class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center shadow-2xl transform transition-transform group-hover:scale-110">
                            <span class="text-4xl font-extrabold text-blue-600">L</span>
                        </div>
                        <span class="mt-3 text-white text-xl font-bold tracking-wider drop-shadow-md">Loka Cafe</span>
                    </a>
                </div>

             
                <div class="w-full px-8 py-10 bg-white/90 backdrop-blur-sm shadow-2xl overflow-hidden sm:rounded-3xl border border-white/50">
                    {{ $slot }}
                </div>

         
                <div class="mt-8 text-blue-100 text-sm font-medium">
                    &copy; {{ date('Y') }} Loka Cafe. All rights reserved.
                </div>
            </div>
        </div>
    </body>
</html>