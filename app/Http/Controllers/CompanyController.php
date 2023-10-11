<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class CompanyController extends Controller
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
        $companies=Company::all();
        return view('company.showCompanyDetails',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('company.createCompany');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'logo_url'=>'required|image:jpeg,png,jpg',
        ]);
        if($validator->fails()){
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
           
            //check compnay already created or not
            $company= Company::where('name',$request->input('name'))->orWhere('email',$request->input('email'))->first();

            if($company){
                return redirect()->back()->withErrors('Company Already Register')->withInput();
            }
            else{
                $logoUrl=$request->file('logo_url');
              //use to store the logo in storage/app/public/companyLogo
                $path = Storage::disk('public')->put('companyLogo', $logoUrl);
              
                    Company::create([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'logo_url' => $path,
                        'website' => $request->input('website'),
                    ]);
                
                    return view('home');
            }
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $company= Company::where('name',$request->input('name'))->where('email',$request->input('email'))->first();
        if($company){
            return view('/company/showCompanyDetails')->with($company);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
    
        return view('company.editCompany',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validator=Validator::make($request->all(),[
            'logo_url'=>'required|image:jpeg,png,jpg',
        ]);
        if($validator->fails()){
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
                $logoUrl=$request->file('logo_url');
                $path = Storage::disk('public')->put('companyLogo', $logoUrl);
                Company::where('id',$company->id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'logo_url'=>$path,
                    'website'=>$request->website
        
                ]);
               return redirect()->route('companies.index');   
            }   
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}
