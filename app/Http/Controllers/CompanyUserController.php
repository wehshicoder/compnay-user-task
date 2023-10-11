<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyUserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyUsers=CompanyUser::all();
        return view('user.showUserDetails',['users'=>$companyUsers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies= Company::all();
        if($companies){
            return view('user.addCompanyUser',['companies'=>$companies]);
        }else{
            // write code to redirect the user to create company
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users=CompanyUser::all();

        // simple validation to check the user already created or not in the system. 
        $user= CompanyUser::where('email',$request->input('email'))->first();
    
        if($user){

            return view('user.login')->withErrors(['error'=>'User Already Register']);
        }
        else{

            CompanyUser::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'company_id'=>$request->input('company_id'),
            
            ]);
            return view('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyUser $companyUser)
    {
        $company= Company::where('name',$request->input('name'))->where('email',$request->input('email'))->first();
        if($company){
            return view('/company/showCompanyDetails')->with($company);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyUser $companyUser)
    {
        $companies=Company::all();
        $previousSelectedCompany=Company::where('id',$companyUser->company_id)->pluck('name');
        return view('user.editCompanyUser',['companyUser'=>$companyUser,'companies'=>$companies,'previousSelectedCompnay'=>$previousSelectedCompany]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyUser $companyUser)
    {
        $companyUser->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company_id'=>$request->company_id

        ]);
       return redirect()->route('companyUsers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyUser $companyUser)
    {
        $companyUser->delete();
        return redirect()->route('companyUsers.index');
    }
   
}
