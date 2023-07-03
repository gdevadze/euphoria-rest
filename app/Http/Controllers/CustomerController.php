<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('pages.customers.index');
    }

    public function getCompaniesForAjax()
    {
        return Datatables()->of(Customer::query())
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= $btn = ' <a class="btn btn-success shadow btn-xs sharp mr-1" href="javascript:void(0)" id="edit_quantity" data-id="'.$data->id.'"><i class="fa fa-check"></i></a>';
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
        $companies = Company::all();
        return jsonResponse(['status' => 0,'html' => view('general.customers.create',compact('companies'))->render()]);
    }

    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['user_id'] = currentUser()->id;
        $input['tel'] = str_replace(' ','',$input['tel']);
        Customer::create($input);
        return jsonResponse(['status' => 0,'msg' => 'კლიენტი წარმატებით დაემატა']);
    }

    public function edit(Request $request): JsonResponse
    {
        $customer = Customer::findOrFail($request->id);
        return jsonResponse(['status' => 0,'html' => view('general.customers.update_quantity',compact('customer'))->render()]);
    }

    public function updateQuantity(Request $request)
    {
        $input = $request->all();
        Customer::findOrFail($request->id)->update($input);
        return jsonResponse(['status' => 0,'msg' => 'გატარების რაოდენობა წარმატებით განახლდა!']);
    }

    public function delete(Request $request): JsonResponse
    {
        Company::findOrFail($request->id)->delete();
        return jsonResponse(['status' => 1]);
    }
}
