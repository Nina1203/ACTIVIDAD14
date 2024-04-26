<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title','content','active','category_id'];

    #protected $guarded = [];

    static function todas_las_notas(){
        return Note::leftJoin('categories','categories.id','=','notes.category_id')
        ->select('category_name','notes.id','title','content')
        ->where('notes.active',true)
        ->get();
    }

    static function nota_por_id($id){
        return Note::leftJoin('categories','categories.id','=','notes.category_id')
        ->select('category_name','notes.id','title','content','notes.created_at','notes.updated_at')
        ->where('notes.id',$id)
        ->where('notes.active',true)
        ->firstOrFail();
       
    }

    static function notas_por_category_id($id){
        return Note::leftJoin('categories','categories.id','=','notes.category_id')
        ->select('category_name','notes.id','category_id','title','content','notes.created_at','notes.updated_at')
        ->where('category_id',$id)
        ->where('notes.active',true)
        ->get();
       
    }
}
