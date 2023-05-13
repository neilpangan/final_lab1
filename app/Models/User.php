<?php

// Model deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{
public $timestamps = false; 
protected $primaryKey = 'users_id'; 

// name of table

protected $table = 'teacher';

// column sa table
protected $fillable = [
'users_id','firstname', 'lastname'
];  
}   