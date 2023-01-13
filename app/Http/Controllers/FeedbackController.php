<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;


class FeedbackController extends Controller
{
    public function index()
    {
        // 5 feedbacks per page
        $feedbacks = Feedback::paginate(5);

        return view('feedbacks.feedbackform', [
            'feedbacks' => $feedbacks
        ]);
    }

    public function store(Request $request)
    {
        // validimi i formes se feedback
        $this->validate($request, [
            'body' => 'required',
            'feedback_icon' => 'required',
            'feedback_type' => 'required'
        ]);

        // ne menyre qe nje user te kete nje feedback
        if (Feedback::where('user_id', auth()->user()->id)->exists()) {

            Feedback::where('user_id', auth()->user()->id)->update([

                'body' => $request->body,
                'feedback_icon' => $request->feedback_icon,
                'feedback_type' => $request->feedback_type,

            ]);
        } else {


            Feedback::where('id', auth()->user()->id)->create([
                'user_id' => auth()->user()->id,
                'body' => $request->body,
                'feedback_icon' => $request->feedback_icon,
                'feedback_type' => $request->feedback_type,

            ]);
        }

        return back();
    }
}
