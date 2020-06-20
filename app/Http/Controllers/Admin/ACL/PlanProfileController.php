<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
        $this->middleware(['can:plans']);
    }

    public function profiles($idPlan)
    {                      
        if (!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles',[
            'plan' => $plan,
            'profiles' => $profiles,
        ]);
    

    }
    public function plans($idProfile)
    {                      
        if (!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans',[
            'plans' => $plans,
            'profile' => $profile,
        ]);
    }

    public function profilesAvailable(Request $request, $idPlan)
    {        
        if (!$plan = $this->plan->with('profiles')->find($idPlan)){
            return redirect()->back();
        }

        $filters = $request->except('_token');        
        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available',[
            'plan' => $plan,
            'profiles' => $profiles,
            'filters' => $filters,
        ]);

    }

    public function attachPlanProfile(Request $request, $idplan)
    {
        $plan = $this->plan->with('profiles')->find($idplan);
        if (!$plan){
            return redirect()->back();
        }
        if (!$request->profiles || count($request->profiles)==0){
            return redirect()
                ->back()
                ->with('info','Precisa selecionar pelo menos uma permissão.');
        }
        $plan->profiles()->attach($request->profiles);
        return redirect()->route('plans.profiles',$plan->id);

    }

    public function detachPlanProfile($idplan,$idprofile)
    {
        $plan = $this->plan->find($idplan);
        $profile = $this->profile->find($idprofile);
        if (!$plan || !$profile){
            return redirect()->back();
        }
        
        $plan->profiles()->detach($profile);
        return redirect()->route('plans.profiles',$plan->id);

    }
}
