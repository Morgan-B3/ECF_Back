<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/477e17b079.js" crossorigin="anonymous"></script>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>{{$title}}</title>
</head>
<body class="bg-slate-100">
    <div class="flex flex-col justify-between min-h-screen">

    <header class="sticky top-0 bg-[rgb(20,66,132)] py-4 z-50">
        <div class="flex justify-between items-center w-[60%] mx-auto ">
            <a href="/"><img src="/images/logo_trans.png" alt="Logo Literie3000" class="w-100 mx-auto"></a>
            <nav class="flex gap-8 text-xl w-full justify-end">
                <a href="/" class="text-white hover:text-[rgb(255,204,77)] duration-200 transition-all">Catalogue</a>
                <a href="/marques" class="text-white hover:text-[rgb(255,204,77)] duration-200 transition-all">Marques</a>
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