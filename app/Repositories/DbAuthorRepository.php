<?php

namespace App\Repositories;

use App\Author;

class DbAuthorRepository
{
    public function allNames()
    {
        return Author::lists('name', 'id')->all();
    }
}
