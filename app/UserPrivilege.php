<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class UserPrivilege extends Model
{
    protected $fillable = [
        'user_id',
        'view',
        'edit',
        'delete',
    ];
}
