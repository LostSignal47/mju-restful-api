<?php

namespace App\Http\Controllers;

use App\Models\MjuStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MjuStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $students = MjuStudent::all();
        return $students;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        // //
        // MjuStudent::create($validated);
        // $validated = $request->validate([
        //     'student_code' => 'required|string|max:15',
        //     'first_name' => 'required|string|max:50',
        //     'first_name_en' => 'required|string|max:50',
        //     'major_id' => 'required|exists:majors,major_id',
        //     'idcard' => 'required||digits:13',
        //     'address' => 'required|string',
        //     'phone' => 'required|string',
        //     'email' => 'required|email',
        // ]);

        // return response()->json(['message' => 'Student created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,MjuStudent $mju)
    {

        // Log::info($request->mju);
        Log::info("mjuStudent->".$mju);
        $student_code = $request->mju;
        $mju = MJUstudent::find(
            $student_code
        );

        // // ค้นหาตามรหัสนักศึกษา
        // $student_code = $request->mju;
        // $mju = MjuStudent::with("major")->find($student_code);

        return response()->json(
            [
                'message' => 'Student  get successfully',
                'get Data by' => 'Attawit',
                'data' => $mju
            ],
            200
        );
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MjuStudent $mjuStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MjuStudent $mju)    
    {
        // 1)ตรวจสอบความถูกต้องของข้อมูล validate $request
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required||digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);
        
        // 2)แก้ไขข้อมูลใหม่
        $mju->update($validated);

        // 3)กลับไปยังหน้าจอแสดงผล (json)
        return response()->json([
            'message' => 'Student update successfully',
            'data' => $mju
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, MjuStudent $mju)
    {

        $mju->delete();

        return response()->json([
            'message' => 'Just Delete it',
            'data' => $mju

        ],200); 
    }
}