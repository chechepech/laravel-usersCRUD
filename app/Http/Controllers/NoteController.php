<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function __construct(){}
    public function all(){return view('notes.all',['notes'=>Note::all()]);}
    public function favorite(){return view('notes.favorite');}
    public function archived(){return view('notes.archived');}
}