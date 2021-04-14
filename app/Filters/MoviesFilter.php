<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Movie;



class MoviesFilter extends Filters
{
    /**
     * Sort Movies By rating
     *
     * @param string $value
     *
     * @return Builder
     */
    public function rating()
    {            
        return $this->query->orderBy('rating')->get();
    
    }

    /**
     * Sort Movies By date
     *
     * @param string $value
     *
     * @return Builder
     */
    public function date()
    {            
        return $this->query->orderBy('created_at')->get();
    
    }
}
