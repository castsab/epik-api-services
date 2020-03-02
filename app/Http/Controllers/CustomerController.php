<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller {

    public $storagePath = "../public/images";
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    public function saveCustomer(Request $request) {
        $this->validate($request, [
            'documentType' => 'required',
            'documentNumber' => 'required',
            'name' => 'required',
            'lastName' => 'required',
            'dateBirth' => 'required',
            'maritalStatus' => 'required'
        ]);

        $modelCustomer = new Customer();
        $modelCustomer->document_type = $request->documentType;
        $modelCustomer->document_number = $request->documentNumber;
        $modelCustomer->name = $request->name;
        $modelCustomer->last_name = $request->lastName;
        $modelCustomer->date_birth = $request->dateBirth;
        $modelCustomer->marital_status = $request->maritalStatus;
        
        if ($request->hasFile('firm')) {
            $request->file('firm')->move(
            $this->storagePath, $request->file('firm')->getClientOriginalName());
            $modelCustomer->firm_path = "images/".$request->file('firm')->getClientOriginalName();
        }
        
        if ($request->hasFile('photo')) {
            $request->file('photo')->move(
            $this->storagePath, $request->file('photo')->getClientOriginalName());
            $modelCustomer->photo_path = "images/".$request->file('photo')->getClientOriginalName();
        }
        
        $modelCustomer->save();

        return response()->json(['status' => 'success'], 200);
    }

}
