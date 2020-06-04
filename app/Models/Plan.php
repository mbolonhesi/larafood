<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name','url','price','description'];
   
    public function details(){
        return $this->hasMany(DetailPlan::class); //faz um relacionamento com a tabela details, id (plans) -> plan_id (details_plans)
    }
    public function search($filter = null){

        $results = $this->where('name','LIKE',"%{$filter}%")
            ->orWhere('description','LIKE',"%{$filter}%")
            ->paginate();

        return $results;
    }

}
