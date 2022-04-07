<?php

namespace App\Http\Controllers;

use App\Event;
use App\Straits\StraitUploadFile;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    use StraitUploadFile;

    function index() {
        $events = Event::paginate();
        return view('admin.event.index', compact('events'));
    }

    function create() {
        $events = Event::paginate();
        return view('admin.event.create', compact('events'));
    }

    function store(Request $request) {
        $imageInput = $this->UploadFile($request, 'core_image', 'EVENT');

        Event::create([
            'event_name'	=>  $request['event_name'],
            'price'	=>  $request['price'],
            'content' => $request['content'],
            'business_name' => $request['business_name'],
            'core_image' => $imageInput['feature_image'],
            'core_image_name' => $imageInput['feature_image_name']
        ]);

        
        return redirect(route('event.index'));
    }
}
