<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>{{$title}}</title>
</head>
<body class="bg-slate-100">
    <div class="flex flex-col justify-between min-h-screen">

    <header class="sticky top-0 bg-[rgb(20,66,132)] py-4 z-50">
        <div class="grid grid-cols-3 justify-between items-center w-[60%] mx-auto ">
            <div></div>
            <a href="/"><img src="/images/logo_trans.png" alt="Logo Literie3000" class="w-80 mx-auto"></a>
            <nav class="w-fit space-x-8 text-lg mx-auto">
                <a href="/" class="text-white hover:text-[rgb(255,204,77)] duration-200 transition-all">Catalogue</a>
                <a href="/ajouter" class="text-white hover:text-[rgb(255,204,77)]  duration-200">Ajouter un matelas</a>
            </nav>
        </div>
    </header>


    <main class="mt-8 mb-auto w-[60%] mx-auto">
        @yield('content')
    </main>

    </div>


</body>
</html>