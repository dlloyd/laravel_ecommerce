<?php

namespace Beone;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $cast = [
      'delivered' =>'boolean',
      'purchase_list' => 'array',
    ];

    public function setPurchaseListAttribute($list)
    {
        $this->attributes['purchase_list'] = json_encode($list);
    }
}
