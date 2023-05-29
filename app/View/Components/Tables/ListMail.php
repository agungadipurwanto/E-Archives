<?php

namespace App\View\Components\Tables;

use App\Models\Mail;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListMail extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        $mails = Mail::orderBy('id')->get();
        return view('components.tables.list-mail', ['mails' => $mails]);
    }
}
