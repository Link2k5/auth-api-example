<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request) : JsonResponse
    {
        $file = $request->file('file');
        $ext = ['jpg', 'jpeg', 'git', 'png'];

        if ($file->isValid() && in_array($file->extension(), $ext)) {
                $file->storeAs('img', $file->getClientOriginalName());

                return response()->json([
                    'upload' => true,
                    'filename' => $file->getClientOriginalName(),
                ], 200);
        }
        return response()->json([
            'message' => 'Falha ao tentar fazer upload de arquivo',
        ], 200);
    }
}
