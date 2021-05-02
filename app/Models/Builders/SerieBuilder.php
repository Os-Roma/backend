<?php 

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class SerieBuilder extends Builder
{	
    public function title($title)
    {
        return $this->where('title', 'LIKE', "%$title%");
    }

    public function overview($overview)
    {
        return $this->where('overview', 'LIKE', "%$overview%");
    }

    public function release_date($release_date)
    {
        return $this->where('release_date', 'LIKE', "%$release_date%");
    }

    // public function movie($movie)
    // {
    //     return $this->whereHas('movies',function ($query) use ($movie) {
    //         $query->where('movies.slug', 'LIKE', "%$movie%");
    //     });
    // }

    // public function episode($episode)
    // {
    //     return $this->whereHas('episodes',function ($query) use ($episode) {
    //         $query->where('episodes.slug', 'LIKE', "%$episode%");
    //     });
    // }
}