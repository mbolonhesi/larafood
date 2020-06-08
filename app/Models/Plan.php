<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name','url','price','description'];
   
    public function details(){
        return $this->hasMany(DetailPlan::class); //faz um relacionamento com a tabela details, id (plans) -> plan_id (details_plans)
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class); //faz um relacionamento com a tabela profile, id (plans) -> plan_id (plan_profile)
    }
    
    public function search($filter = null){

        $results = $this->where('name','LIKE',"%{$filter}%")
            ->orWhere('description','LIKE',"%{$filter}%")
            ->paginate();

        return $results;
    }

    /*
     * Profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id',function($query){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if ($filter)
                $queryFilter->where('profiles.name','LIKE',"%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }

}
