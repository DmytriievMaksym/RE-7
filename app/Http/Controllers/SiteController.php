<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EntryRequest;
use App\Http\Requests\ParticipationRequest;
use App\Mail\ParticipationMail;
use App\Enums\CategoryEnum;

class SiteController extends Controller
{
    public function say($message='Привіт'){
        return view('site.say', ['message' => $message]);
    }

    public function entry(){
        return view('site.entry');
    }

    public function entryStore(EntryRequest $request){
        return view('site.entry-confirm', $request->validated());
    }

    public function participation(){
        return view('site.participation', ['categories' => CategoryEnum::cases()]);
    }

    public function participationStore(ParticipationRequest $request){
        Mail::to($request->email)->send(new ParticipationMail($request->validated()));
        return redirect()
            ->route('participation.confirm')
            ->with('formData', $request->validated());
    }

    public function participationConfirm(){
        if (!session()->has('formData')) {
            return redirect()->route('participation.form');
        }
        return view('site.participation-confirm', ['data' => session('formData')]);
    }
    public function getPassport(){
        $projectData = [
            'author' => 'Дмитрієв М.А.',
            'group' => 'РЕ-51',
            'location' => 'КПІ ім. Ігоря Сікорського, корпус №17, експо-хол',
            'dates' => '14-15 вересня',
            'phpVersion' => PHP_VERSION,
            'framework' => 'Laravel '.app()->version(),
        ];
        return view('site.passport',['project' => $projectData]);
    }
}
