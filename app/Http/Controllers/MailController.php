<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class MailController extends Controller
{
    private $DIRECTORY = 'public';

    public function create(Request $request)
    {
        $validated = $request->validate([
            'number'    => ['required', 'unique:mails'],
            'subject'   => ['required'],
            'from'      => ['required'],
            'to'        => ['required'],
            'date'      => ['required', 'date'],
            'file'      => ['required', File::types('pdf')->max(1024 * 20)],
            'type'      => ['required', Rule::in(['INCOMING', 'OUTGOING'])]
        ]);

        if ($validated) {
            $file = $validated['file'];

            Storage::putFile($this->DIRECTORY, $file);

            $validated['file'] = $file->hashName();

            Mail::create($validated);
        }

        return redirect()->back(201);
    }

    public function show($file)
    {
        return redirect(Storage::url($file));
    }

    public function delete($id)
    {
        $mail = Mail::find($id);

        Storage::delete($this->DIRECTORY.'/'.$mail->file);
        $mail->delete();

        return redirect()->back();
    }
}
