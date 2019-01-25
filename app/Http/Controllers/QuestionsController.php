<?php

namespace sialens\Http\Controllers;

use Illuminate\Http\Request;
use sialens\Question;
use sialens\Option;
use sialens\User;
use sialens\Auth;

class QuestionsController extends Controller
{

    public function __construct ()

    {

        $this->middleware('auth');

    }

        
    public function index()
    
    {
    
        $questions  = Question::notApproved()->latest()->get();
    
        return view('questions.index', ['questions' => $questions, 'approved' => false]);
    
    }

    public function approved(Request $request)
    
    {
    
        $request->user()->authorizeRoles(['Gweinyddwr', 'Rheolwr']);
        
        $questions  = Question::approved()->latest()->get();

    
        return view('questions.index', ['questions' => $questions, 'approved' => true]);
    
    }

    public function show(Question $question)
    
    {
        
        return view('questions.show', compact('question'));
    }

    public function create(Request $request)
    
    {
       
        $request->user()->authorizeRoles(['Swyddog', 'Rheolwr']);

        return view('questions.create');
    
    }

    public function deleteConfirm($id) {

        $question = Question::find($id);

        $options = Option::where('question_id', $id)->get();
        
        return view('questions.delete', ['question'=>$question, 'options' => $options]);

    }

    public function delete($id, Request $request)
    {
       
        $question = Question::find($id);
        
        if($question->user_id == auth()->id() || $request->user()->hasAnyRole(['Gweinyddwr', 'Rheolwr']) ) {
        
            $deleted = Question::destroy($id);
        
            $deleteded_options = Option::where('question_id', $id)->delete();
        
            return redirect('/');
        
            } else {

            abort(401, 'This action is unauthorized.');
            
        }

    }
    
    public function edit($id, Request $request ){

        $question = Question::find($id);
        

        if($question->user_id == auth()->id() || $request->user()->hasAnyRole(['Gweinyddwr', 'Rheolwr']) ) {
        
            $options = Option::where('question_id', $id)->get();
        
            return view('questions.edit', ['question' => $question, 'options' => $options]);
        
        } else {
        
            abort(401, 'This action is unauthorized.');

        }
    }

    public function update($id, Request $request){
    
        $this->validate($request, [
    
            'body' => 'required'
    
            ]);

        $questionData['body'] = $request->body;

        if( isset($request->approved) && $request->user()->hasAnyRole(['Gweinyddwr', 'Rheolwr']) ) {

            $questionData['approved'] =  $request->approved;

            $yesno = ( isset($questionData['approved']) ) ? 1 : 0;

            $questionData['approved'] = $yesno;

            $questionData['approved_by'] = auth()->id();

            $optionData = $request->option_id;
            
                foreach($optionData as $option_id) {

                    $option = Option::find($option_id);

                    $option->approved = $yesno;
                    
                    $option->save();

                }

            }
       
        Question::find($id)->update($questionData);

        

        return redirect('/');
    }

    public function store(Question $question)
    {
        # code...
        
        $this->validate(request(),   [              
             'body' => 'required'         
              ]);
        

   
        $data = new Question;
        $data->body = request('body'); 
        $data->user_id= auth()->id();
        
        
        $data->save();
        $id['question_id']= $data->id;
        $id['option_number'] = 1;
        
        return redirect('/options/create')->with('data', $id);

       
    }
}
