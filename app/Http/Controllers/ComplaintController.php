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
            'description' => 'required',
            'catagory_id' =>'required',
        ]);
        $complaint = New Complaint();
        $complaint->user_id = Auth::id();
        $complaint->catagory_id = $request->catagory_id;
        $complaint->description = $request->description;
//        $complaint->answer = $request->answer;
//        $complaint->feedback = $request->feedback;

        $complaint->save();
        return redirect()->route('homefl');


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

    public function getADComplaintNCategory()
    {
        $data = Complaint::all();
        $kategoris = kategori::all();
        return view('complaints.ad-complaints',compact('data','kategoris'));
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

    public function getFLComplaintNCategory()
    {
        $user_id=Auth::id();
        $data = Complaint::where('user_id',$user_id)-> get();
        $kategoris = kategori::all();
        return view('complaints.fl-home', compact('data','kategoris'));

    }

    public function followUp($id)
    {
        $data = Complaint::find($id);
        $data->updated_at = date("Y-m-d H:i:s");
        $data->save();
        return redirect()->route('homefl');
    }

    public function getTotalComplaint()
    {
        $newcomplaint = Complaint::where('status', "Received")->count();
        $onreview = Complaint::where('status', "On Review")->count();
        $answered = Complaint::where('status', "Answered")->count();
        return view('complaints.ad-home', compact('newcomplaint','onreview','answered'));
    }

    public function onReview($id)
    {
        $data = Complaint::findOrFail($id);
        $data->status = "On Review";
        $data->save();
        return redirect()->route('viewcomplaint');
    }

    public function answer(Request $request, $id)
    {
        $this->validate($request,[
            'answer' => 'required',
        ]);
        $data = Complaint::find($id);
        $data->answer = $request->answer;
        $data->status = "Answered";

        $data->save();
        return redirect()->route('viewcomplaint');
    }

    // public function filter(Request $request)
    // {
    //     $this->validate($request,[
    //         'prioritas' => 'required',
    //         'status' => 'required',
    //         'kategori' => 'required',
    //     ]);
        
    // }
}
