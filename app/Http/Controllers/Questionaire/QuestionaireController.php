<?php
namespace App\Http\Controllers\Questionaire;

use App\questionaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionaireController extends Controller
{
    
    public function index()
    {
        $questionaires = questionaire::All();
        return view('questionaire.questionaire', compact('questionaires'));
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
     * @param  \App\questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function show(questionaire $questionaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionId = questionaire::findOrFail($id);
        return view('questionaire.EditQuestion', compact('questionId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question'=>'required',
        ]);

        $aRes = questionaire::findOrFail($id);

        $aRes->question = $request->question;

        $aRes->save();

        if ($aRes->save()) {
            return redirect()->back()->with('success', 'Successfully Updated!');
        } else {
            return Redirect::back()->withErrors(['errormsg', 'Failed to update data!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(questionaire $questionaire)
    {
        //
    }
}
