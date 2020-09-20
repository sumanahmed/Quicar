<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Feedback;

class FeedbackController extends Controller
{
    //show all feedback
    public function index(){
        $feedbacks = Feedback::all();
        return view('quicar.backend.feedback.index', compact('feedbacks'));
    }
}
