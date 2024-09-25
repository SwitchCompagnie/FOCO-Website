<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Tron - Service - FOCO</title>
    <meta name="description" content="T-Tron FOCO beautifie le code dans plusieurs langages de programmation pour améliorer la lisibilité et la maintenance.">
    <meta name="keywords" content="T-Tron FOCO, beautifier, code, multi-langage, HTML, CSS, JavaScript, PHP, JSON, Python, TypeScript, Ruby, Go, C++">
    <meta name="author" content="T-Tron Team">
    <meta property="og:title" content="T-Tron FOCO - Beautificateur De Code Multi-Langage">
    <meta property="og:description" content="T-Tron FOCO vous aide à beautifier votre code dans différents langages pour une meilleure lisibilité et une organisation optimale.">
    <meta property="og:image" content="https://foco.ttron.eu/images/logo.png">
    <meta property="og:url" content="https://foco.ttron.eu">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="T-Tron FOCO - Beautificateur De Code Multi-Langage">
    <meta name="twitter:description" content="Améliorez la lisibilité de votre code avec T-Tron FOCO, le beautificateur de code pour divers langages de programmation.">
    <meta name="twitter:image" content="https://foco.ttron.eu/images/logo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    <header class="fixed top-0 left-0 w-full bg-gray-800 bg-opacity-75 p-4 shadow-lg z-10">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="T-Tron Icon" class="h-8 w-8 spin-slow" />
                <span class="text-xl font-bold">T-Tron</span>
            </div>
            <a href="https://ttron.eu" class="bg-white hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Accueil</a>
        </div>
    </header>
    <main class="flex-grow flex items-center justify-center pt-28 pb-8">
        <div class="bg-gray-800 bg-opacity-75 rounded-lg p-8 shadow-lg w-full max-w-6xl">
            <h1 class="text-3xl font-bold text-center mb-6">Beautificateur De Code</h1>

            <form id="code-form" method="POST" action="{{ route('beautify.code') }}">
                @csrf
                <div class="mb-4">
                    <label for="language" class="text-lg font-semibold">Langages :</label>
                    <select id="language" name="language" class="bg-gray-700 text-white w-full p-2 rounded-lg mt-2">
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">JavaScript</option>
                        <option value="php">PHP</option>
                        <option value="json">JSON</option>
                        <option value="python">Python</option>
                        <option value="typescript">TypeScript</option>
                        <option value="ruby">Ruby</option>
                        <option value="go">Go</option>
                        <option value="c++">C++</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="code" class="text-lg font-semibold">Votre Code :</label>
                        <textarea
                            id="code"
                            name="code"
                            rows="10"
                            class="bg-gray-700 text-white w-full p-3 rounded-lg"
                            placeholder="Collez votre code ici..."></textarea>
                    </div>
                    <div>
                        <label for="beautified-code" class="text-lg font-semibold">Code Beautifié :</label>
                        <textarea id="beautified-code" rows="10" class="bg-gray-700 text-white w-full p-3 rounded-lg" readonly>{{ session('beautified_code', 'Votre Code Beautifié Apparaîtra Ici !') }}</textarea>
                        <button 
                            id="copy-button"
                            class="mt-2 bg-white hover:bg-gray-100 text-gray-800 font-bold py-2 px-4 w-full rounded">
                            Copier Le Code
                        </button>
                    </div>
                </div>

                <button
                    type="submit"
                    class="mt-4 bg-white hover:bg-gray-100 text-gray-800 font-bold py-2 px-4 w-full rounded">
                    Beautifier
                </button>
            </form>
        </div>
    </main>
    @include('layout.footer')
    <script>
        document.getElementById("copy-button").addEventListener("click", function () {
            let code = document.getElementById("beautified-code").value;
            navigator.clipboard.writeText(code);
        });
    </script>
</body>
</html>