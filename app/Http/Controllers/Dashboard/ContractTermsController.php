<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContractTerms;
use App\Http\Requests\Dashboard\ContractTermsRequest;

class ContractTermsController extends Controller
{
    public function index()
    {
        $terms = ContractTerms::latest()->paginate(PAGINATION_COUNT);

        return view('dashboard.terms.index', compact('terms'));
    }

    /**
     * Show form for creating term
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.terms.create');
    }

    /**
     * Store a newly created term
     * 
     * @param ContractTerms $term
     * @param ContractTermsRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(ContractTerms $term, ContractTermsRequest $request)
    {
        $request_data = $request->all();
        ContractTerms::create($request_data);
        return redirect()->route('contract_terms.index')
            ->withSuccess(trans('admin.added'));
    }

    /**
     * Show term data
     * 
     * @param ContractTerms $term
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($term)
    {
        $term = ContractTerms::find($term);
        return view('dashboard.terms.show', [
            'term' => $term
        ]);
    }

    /**
     * Edit term data
     * 
     * @param ContractTerms $term
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($term)
    {
        $term = ContractTerms::find($term);
        return view('dashboard.terms.edit', [
            'term' => $term
        ]);
    }

    /**
     * Update term data
     * 
     * @param ContractTerms $term
     * @param ContractTermsRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update($term, ContractTermsRequest $request)
    {
        $term = ContractTerms::find($term);
        $term->update($request->validated());
        return redirect()->route('contract_terms.index')
            ->withSuccess(trans('admin.updated'));
    }

    /**
     * Delete term data
     * 
     * @param ContractTerms $term
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($term)
    {
        $term = ContractTerms::find($term);
        $term->delete();
        return redirect()->route('contract_terms.index')
            ->withSuccess(trans('admin.detelted_sucess'));
    }

   
    
}
