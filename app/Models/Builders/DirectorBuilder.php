<?php 

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class DirectorBuilder extends Builder
{	
    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function birth_date($birth_date)
    {
        return $this->where('birth_date', 'LIKE', "%$birth_date%");
    }

    public function movie($movie)
    {
        return $this->whereHas('movies',function ($query) use ($movie) {
            $query->where('movies.slug', 'LIKE', "%$movie%");
        });
    }

    public function episode($episode)
    {
        return $this->whereHas('episodes',function ($query) use ($episode) {
            $query->where('episodes.slug', 'LIKE', "%$episode%");
        });
    }
}