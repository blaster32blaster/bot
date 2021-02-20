<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mouth
{
    private $openClose;

    public function __construct()
    {
        $this->openClose = false;
    }

    public function openOrClose()
    {
        return $this->openClose = !$this->openClose;
    }
}
class Man
{
    private $mouth;

    public function __construct(Mouth $mouth)
    {
        $this->mouth = $mouth;
    }

    protected function openClose()
    {
        return $this->mouth->openOrClose();
    }
}
class Doctor extends Man
{
    private $patient;

    public function __construct(Man $patient)
    {
        $this->patient = $patient;
    }

    public function requestOpenCloseMouth()
    {
        return $this->patient->openClose();
    }
}



class TestController extends Controller
{
    public function test()
    {
        $mouth = new Mouth();
        $man = new Man($mouth);
        // $doctor = new Doctor($man);
        // $rq = $doctor->requestOpenCloseMouth();
        // dd($rq);
        $rq = $man->openClose();
        return response('the answer is ' . $rq);
        // return 'hello';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
