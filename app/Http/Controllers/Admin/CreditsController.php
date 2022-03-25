<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\UserDetailsRequest;
use App\Http\Managers\UserManager;
use App\Models\Purpose;

class CreditsController extends Controller
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userManager->getUsers(Purpose::CREDITS);
        return view('admin.pages.credits.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.credits.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDetailsRequest $request)
    {
        $data = $request->all();
        $this->userManager->storeCredits($data);
        return redirect()->route('admin.customer.credits')->with('success','Successfully Added the Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $customer)
    {
        return view('admin.pages.credits.form', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $customer)
    {
        $data = $request->all();
        $this->userManager->updateUser($data, $customer);
        return redirect()->route('admin.customer.credits')->with('success','Successfully Updated the Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = $this->userManager->removeUser($request, Purpose::CREDITS);
        if($delete){
            return redirect()->route('admin.customer.credits')->with('success','Successfully deleted the Data');
        }
        return redirect()->route('admin.customer.credits')->with('error','Something went wrong');
    }
}
