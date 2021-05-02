<?php 

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class ClassificationBuilder extends Builder
{	
    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function description($description)
    {
        return $this->where('description', 'LIKE', "%$description%");
    }

    // public function movies($movies)
    // {
    //     return $this->whereHas('movies',function ($query) use ($movies) {
    //         $query->where('movies.slug', 'LIKE', "%$movies%");
    //     });
    // }

    // public function series($series)
    // {
    //     return $this->whereHas('series',function ($query) use ($series) {
    //         $query->where('series.slug', 'LIKE', "%$series%");
    //     });
    // }
}