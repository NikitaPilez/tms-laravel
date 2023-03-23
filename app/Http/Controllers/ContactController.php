<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Feedback;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function contacts()
    {
        return view('contacts');
    }

    public function sendFeedback(ContactRequest $request)
    {
        $validated = $request->validated();

        if ($request->has('file')) {
            $uploadedFile = $request->file('file');

            $createdFile = Storage::disk('local')->put(
                time() . '_' . $uploadedFile->getClientOriginalName(),
                $uploadedFile
            );

            $file = File::create([
                'name' => $uploadedFile->getClientOriginalName(),
                'type' => $uploadedFile->getClientOriginalExtension()
            ]);
        }

        $feedback = Feedback::create([
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'file_id' => isset($file) ? $file->id : null
        ]);

        return redirect()->back();
    }
}
