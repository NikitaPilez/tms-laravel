<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Feedback;
use App\Models\File;
use App\Services\FileService;

class ContactController extends Controller
{
    public function contacts()
    {
        return view('contacts');
    }

    public function sendFeedback(ContactRequest $request, FileService $fileService)
    {
        $validated = $request->validated();

        if ($request->has('file')) {
            $file = $fileService->createContactFile($request->file('file'));
        }

        Feedback::query()->create([
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'file_id' => isset($file) ? $file->id : null
        ]);

        return redirect()->back();
    }
}
