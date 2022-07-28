<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;
    //設定這個model是連結到哪個資料表
    protected $table='texts';


        //黑白名單通常會則一使用，不會一起出現，目的都是為了防止不想被動的資料被隨意竄改
    //model的白名單的寫法，只有寫在裡面的欄位可以被寫入資料
    protected $fillable = [
        'text',
        'auther',
        'content',
    ];
    //model的黑名單的寫法，除了寫在裡面的欄位其他都可以寫入資料
    // protected $guarded=[
    //     'id','created_at','upated_at',
    // ];

}
