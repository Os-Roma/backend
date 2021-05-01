<?php 

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class ActorBuilder extends Builder
{	
	/**
	 * @param Builder $query 
	 * @return Builder 
	 */
	public function search($search)
    {
        return $this->where('name', 'LIKE', "%$search%");
    }
}