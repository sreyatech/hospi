<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\hospiNotification;
use Illuminate\Support\Facades\Auth;
use Notification;

use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addview()
    {
        if(Auth::id()){
            if(Auth::user()->usertype == 1){
                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $req)
    {
        $doctor = new Doctor;
        $doctor->name=$req->name;
        $doctor->phone=$req->phone;
        $doctor->speciality=$req->speciality;
        $doctor->room=$req->room;
        $image = $req->file;
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $req->file->move('doctorImage',$imagename);
        $doctor->image=$imagename;
        $doctor->save();

        return redirect()->back()->with('message',"doctor's data submited successfully...");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showappointments()
    {
        $data = Appointment::all();
        return view('admin.showappointments',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back()->with('message','customer appointment approved successfully...');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back()->with('message','customer appointment canceld successfully...');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showalldoctors()
    {
        $doctors = Doctor::all();
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.showalldoctors',compact('doctors'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedoctor($id)
    {
        $data = Doctor::find($id);
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.updatedoctor',compact('data'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }
    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back()->with('message','doctor data is deleted successfully...');
    }
    public function editdoctor($id,Request $req)
    {
        $data = Doctor::find($id);
        $data->name = $req->name;
        $data->phone = $req->phone;
        $data->speciality = $req->speciality;
        $data->room = $req->room;
        $image = $req->file;
        if($image){
            $imagename = time().'.'.$image->getClientoriginalExtension();
            $req->file->move('doctoreImage',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect()->back()->with('message','doctor data is updated successfully...');
    }
    public function emailview($id){
        $data = Appointment::find($id);
        return view('admin.emailview',compact('data'));
    }
    public function sendemail($id, Request $req){
        $data = Appointment::find($id);
        $details = [
            'greeting' => $req->greeting,
            'body' => $req->body,
            'actiontext' => $req->actiontext,
            'actionurl' => $req->actionurl,
            'endpart' => $req->endpart,
        ];
        Notification::send($data,new hospiNotification($details));

        return redirect()->back()->with('message','email has been sent successfully...');
    }
}
