<?php

namespace App\Http\Controllers\Web\Newsletter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class NewsletterController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request)
    {
        Newsletter::subscribeOrUpdate($request->get('email'), ['name'=> $request->get('first_name')]);

        return response()->json([
            'message' => 'You´re successfully subscribed!',
        ], 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribe(Request $request)
    {
        Newsletter::unsubscribe($request->get('email'));

        return response()->json([
            'message' => 'You´re successfully unsubscribed!',
        ], 200);
    }
}
