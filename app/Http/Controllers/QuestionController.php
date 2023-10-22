<?php

namespace App\Http\Controllers;

use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class QuestionController extends Controller
{
    public function add(Request $request) {
        $validate = $request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ans' => 'required',
        ]);

        if ($validate) {
            $q = new Question();
            $q->question = $request->question;
            $q->a = $request->opa;
            $q->b = $request->opb;
            $q->c = $request->opc;
            $q->d = $request->opd;
            $q->ans = $request->ans;
            $q->save();

            Session::put('successMessage', 'Question added successfully');
        }

        return redirect('questions')->with('success', 'added');
    }

    public function show() {
        $qs = question::all();
        // dd($qs);
        return view('questions')->with(['questions'=>$qs]);
    }

    public function update(Request $request) {
        $validate = $request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ans' => 'required',
            'id' => 'required',
        ]);

        if ($validate) {
            $q = question::find($request->id);
            $q->question = $request->question;
            $q->a = $request->opa;
            $q->b = $request->opb;
            $q->c = $request->opc;
            $q->d = $request->opd;
            $q->ans = $request->ans;
            $q->save();
            // dd($validate);

            Session::put('successMessage', 'Question update successfully');
        }

        return redirect('questions')->with('success', 'update');
    }

    public function delete(Request $request) {
        $validate = $request->validate([
            'id' => 'required',
        ]);

        question::where('id',$request->id)->delete();
        Session::put('successMessage', 'Question delete successfully');
        return redirect('questions')->with('success', 'delete');
    }

    public function startquiz() {
        Session::put("nextq",'1');
        Session::put("wrongans",'0');
        Session::put("correctans",'0');
        $q = question::all()->first();


        return view('answerDesk')->with(['question'=>$q]);
    }

    public function submitans(Request $request) {
        // Get the session variables
        $nextq = Session::get("nextq");
        $wrongans = Session::get("wrongans");
        $correctans = Session::get("correctans");

        $validate = $request->validate([
            'ans' => 'required',
            'dbans' => 'required',
        ]);

        $questions = question::all();

        // Check if the answer is correct
        if (trim(strtolower($request->dbans)) === trim(strtolower($request->ans))) {
            $correctans += 1; // Increment correct answer count
        } else {
            $wrongans += 1; // Increment incorrect answer count
        }

        // Increment the "next question" counter
        $nextq += 1;
        Session::put("nextq", $nextq);
        Session::put("wrongans", $wrongans);
        Session::put("correctans", $correctans);

        // Check if there are more questions
        if ($nextq <= count($questions)) {
            // Display the next question
            return view('answerDesk')->with(['question' => $questions[$nextq - 1]]);
        } else {
            // Display the results when there are no more questions
            return view('end')->with([
                'correct' => $correctans,
                'incorrect' => $wrongans,
            ]);
        }
    }







}
