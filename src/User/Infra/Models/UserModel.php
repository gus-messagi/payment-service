<?php

declare(strict_types=1);

namespace Src\User\Infra\Models;

use Illuminate\Database\Eloquent\Model;

final class UserModel extends Model
{
    protected $table = "users";
    protected $fillable = [
        "name",
        "email",
        "document",
        "client_key",
    ];
}