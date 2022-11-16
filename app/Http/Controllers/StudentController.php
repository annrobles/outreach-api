<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'student' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'id' => 0,
        ]);

        $validate = $this->validateForm($request);


        if (!$validate->getData()->status) {
            return $validate;
        }

        $student = Student::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Student Created successfully!",
            'student' => $student
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student->load('companies', 'skillsets','skillsets.skill');
        return response()->json([
            'status' => true,
            'student' => $student
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->merge([
            'id' => $student->id,
        ]);
        $validate = $this->validateForm($request);

        if (!$validate->getData()->status) {
            return $validate;
        }

        $student->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Student Updated successfully!",
            'student' => $student
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'status' => true,
            'message' => "Student Deleted successfully!",
        ], 200);
    }

    private function validateForm($request) {

        $response =  response()->json([
            'status' => true
        ], 200);

        $validation = array();

        if ($request->get('id') > 0) {
            $validation = [
                'email' => 'required|email|unique:student,email,'.$request->get('id')
            ];
        } else {
            $validation = [
                'email' => 'required|email|unique:student,email'
            ];
        }
        try {
            //Validated
            $validateUser = Validator::make($request->all(), $validation);
            if($validateUser->fails()){
                $response = response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
        } catch (\Throwable $th) {
            $response = response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        return $response;

    }
}
