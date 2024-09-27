<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodeStat;

class CodeBeautifierController extends Controller
{
    public function index()
    {
        return view('index', [
            'beautified_code' => session('beautified_code', 'Votre Code Beautifié Apparaîtra Ici !')
        ]);
    }

    public function beautify(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'language' => 'required|string',
        ]);

        $code = $request->input('code');
        $language = $request->input('language');

        $originalLength = strlen($code);
        $beautifiedCode = $this->beautifyCode($code, $language);
        $beautifiedLength = strlen($beautifiedCode);

        CodeStat::create([
            'original_length' => $originalLength,
            'beautified_length' => $beautifiedLength,
            'original_code' => $code,
            'beautified_code' => $beautifiedCode,
        ]);

        return back()->with('beautified_code', $beautifiedCode);
    }

    /**
     * Beautifier le code avec Prettier
     *
     * @param string $code
     * @param string $language
     * @return string
     */
    private function beautifyCode($code, $language)
	{
		$fileExtension = $this->getFileExtension($language);

		$filePath = storage_path("app/temp_code.$fileExtension");

		file_put_contents($filePath, $code);

		$command = "npx prettier --write $filePath > /dev/null 2>&1";
		shell_exec($command);

		$beautifiedCode = file_get_contents($filePath);

		return trim($beautifiedCode);
	}

    /**
     * Obtenir l'extension du fichier selon le langage
     *
     * @param string $language
     * @return string
     */
    private function getFileExtension($language)
    {
        switch ($language) {
            case 'html':
                return 'html';
            case 'css':
                return 'css';
            case 'javascript':
                return 'js';
            case 'php':
                return 'php';
            case 'json':
                return 'json';
            case 'python':
                return 'py';
            case 'typescript':
                return 'ts';
            case 'ruby':
                return 'rb';
            case 'go':
                return 'go';
            case 'c++':
                return 'cpp';
            default:
                return 'txt';
        }
    }
}
