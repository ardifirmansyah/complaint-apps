<?php

namespace App\Http\Controllers;
use App\kategori;
use App\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function create()
    {
        $kategoris = kategori::all();
        return view('complaints.fl-new-complaint',['kategoris'=>$kategoris]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'description' => 'required|max:256',
            'catagory_id' =>'required',
        ]);
        $complaint = New Complaint();
        $complaint->user_id = Auth::id();
        $complaint->catagory_id = $request->catagory_id;
        $complaint->description = $request->description;
//        $complaint->answer = $request->answer;
//        $complaint->feedback = $request->feedback;

        $complaint->save();
        return redirect()->route('newcomplaint');


    }

    public function getComplaint()
    {
        $user_id=Auth::id();
        $data = Complaint::where('user_id',$user_id)-> get();
//        return $data;
//        $kategori = $data->kategori;
//        return $kategori;
        return view('complaints.fl-home',['data'=>$data]);

    }

    public function getComplaintAll()
    {
        $data = Complaint::all();
        return view('complaints.ad-complaints',['data'=>$data]);
    }
    public function  getComplaintDetail($id)
    {
        $data = Complaint::find($id);
        return ($data);
//        return view('complaints.ad-complaints',['data'=>$data]);
    }

    public function getComplaintStatus($status)
    {
        $data = Complaint::where('status', $status)->get();
        return ($data);
    }


}
