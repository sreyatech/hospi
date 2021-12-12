<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(Auth::id()){
        return redirect('home');
    }else{
        $doctor = Doctor::all();
        return view('user.home',compact('doctor'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        if(Auth::id()){
            if(Auth::user()->usertype=="0"){
                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
            }else{
                return view('admin.home');
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function appointment(Request $req)
    {
        $appo = new Appointment;
        $appo->name = $req->name;
        $appo->email = $req->email;
        $appo->phone = $req->phone;
        $appo->doctor = $req->doctor;
        $appo->date = $req->date;
        $appo->message = $req->message;
        $appo->status = 'in progress';
        if(Auth::id()){
            $appo->user_id = Auth::user()->id;
        }
        $appo->save();
        return redirect()->back()->with('message','appointment request is successfull...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myappointment()
    {
        if(Auth::id()){
            $userid = Auth::user()->id;
            $appo = Appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appo'));
        }else{
            return redirect()->back()->with('message','please make an appointment first...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel_appo($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back()->with('message','your appointment has canceled succussfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
