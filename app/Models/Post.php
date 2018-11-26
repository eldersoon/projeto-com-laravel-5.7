<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function listaNoticias(){
       /*
        $listaNoticias = Post::select('id', 'title', 'body', 'created_at');

        foreach($listaNoticias as $key => $value){
           $value->user_id = User::find($value->user_id)-$name;
           //$value->user_id = $value->user->name;
          // unset($value->user);
        }
        */

        $listaNoticias = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.id', 'posts.title', 'posts.body', 'users.name as autor', 'posts.image', 'posts.created_at')
            ->whereNull('deleted_at');
       
        return $listaNoticias;
    }

    public static function listaNoticiasSite(){
 
         $listaNoticias = DB::table('posts')
             ->join('users', 'users.id', '=', 'posts.user_id')
             ->select('posts.id', 'posts.title', 'posts.body', 'users.name', 'posts.image', 'posts.created_at')
             ->whereNull('deleted_at');
         
        return $listaNoticias;
     }
}
