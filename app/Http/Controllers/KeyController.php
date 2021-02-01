<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

class KeyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('age', ['only' => ['getUser']]);
        $this->middleware('age', ['except' => ['generateKey']]);
    }

    public function generateKey(){
        return Str::random(32);
    }

    public function fooExample(){
        return 'KeyController from post';
    }

    public function getUser($id){
        return 'User id= ' . $id;
    }

    public function getPost($cat1, $cat2){
        return 'Post cat1= ' . $cat1 . ' cat2=' . $cat2;
    }

    public function getProfile(){
        echo '<a href="'. route('profile.action') .'">Profile</a>';
        // return 'Route Profile Action : ' .route('profile.action');
    }

    public function getProfileAction(){
        return 'Route Profile : ' . route('profile');
    }
    //
}
