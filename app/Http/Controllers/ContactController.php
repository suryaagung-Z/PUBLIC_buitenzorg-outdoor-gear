<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('guest.contact');
    }

    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        try {
            $sendEmail = new ContactMail($validated['name'], $validated['email'], $validated['message']);
            Mail::to(Config::get('MAIL_USERNAME', 'buitenzorgoutdoorgear@gmail.com'))->send($sendEmail);

            return redirect()
                ->route('guest.contact')
                ->with('status', [
                    'message' => "Email berhasil terkirim",
                    'type' => 'success'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('guest.contact')
                ->with('status', [
                    'message' => "Terjadi kesalahan saat mengirim email: " . $e->getMessage(),
                    'type' => 'danger'
                ]);
        }
    }
}
