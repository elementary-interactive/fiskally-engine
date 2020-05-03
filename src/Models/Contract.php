<?php

namespace ElementaryInteractive\FiskallyEngine\Models;

class Contract extends Generic
{

    /**
     * Get the current active contract.
     * 
     * @return ElementaryInteractive\FiskallyEngine\Models\Contract
     */
    public static function active(): Contract
    {
        return self::where('valid_at', '<=', now())
            ->where(function($query) {
                $query->where('expired_at', '>', now())
                    ->orWhereNull('expired_at');
            })
            ->first();
        
        
    }
}