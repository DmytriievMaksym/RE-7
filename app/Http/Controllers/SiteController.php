<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EntryRequest;
use App\Http\Requests\ParticipationRequest;
use App\Mail\ParticipationMail;

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
        return view('site.participation');
    }

    public function participationStore(ParticipationRequest $request){
        Mail::to($request->email)->send(new ParticipationMail($request->validated()));
        return view('site.participation-confirm', $request->validated());
    }

    public function passport(){
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
