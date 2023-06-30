<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyController extends Controller
{
    public function index(): View
    {
        return view('pages.companies.index');
    }

    public function getCompaniesForAjax()
    {
        return Datatables()->of(Company::query())
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= $btn = ' <a class="btn btn-primary shadow btn-xs sharp mr-1" href="javascript:void(0)" id="edit_company" data-id="'.$data->id.'"><i class="fa fa-edit"></i></a>';
                if (currentUser()->can('user-delete')) {
                    $html = $btn . ' <a class="btn btn-danger shadow btn-xs sharp mr-1" href="javascript:void(0)" onclick="deleteCompany(' . $data->id . ')"><i class="fa fa-trash"></i></a>';
                }
                return $html;
            })
            ->rawColumns(['role', 'action', 'active_status'])
            ->make(true);

    }

    public function createRender(): JsonResponse
    {
        return jsonResponse(['status' => 0,'html' => view('general.companies.create')->render()]);
    }

    public function store(StoreCompanyRequest $request): JsonResponse
    {
        $input = $request->all();
        Company::create($input);
        return jsonResponse(['status' => 0,'msg' => 'კომპანია წარმატებით დაემატა']);
    }

    public function edit(Request $request): JsonResponse
    {
        $company = Company::findOrFail($request->id);
        return jsonResponse(['status' => 0,'html' => view('general.companies.edit',compact('company'))->render()]);
    }

    public function update(UpdateCompanyRequest $request, $id)
    {
        $input = $request->all();
        Company::findOrFail($id)->update($input);
        return jsonResponse(['status' => 0,'msg' => 'კომპანია წარმატებით განახლდა!']);
    }

    public function delete(Request $request): JsonResponse
    {
        Company::findOrFail($request->id)->delete();
        return jsonResponse(['status' => 1]);
    }
}
