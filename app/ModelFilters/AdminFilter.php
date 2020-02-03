<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AdminFilter extends ModelFilter
{
    public function fullName($name)
    {
    	return $this->whereHas('user', function($query) use($name) {
                    $query->where('first_name', 'LIKE', '%' . $name . '%')
    					->orWhere('last_name', 'LIKE', '%' . $name . '%');
                });
    }
}
