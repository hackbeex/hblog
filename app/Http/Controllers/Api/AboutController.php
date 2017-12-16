<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class AboutController extends ApiController
{
    public function edit()
    {
        $about = setting('about', '');

        return $this->response->json(['content' => $about]);
    }

    public function update(Request $request)
    {
        $about = $request->get('content', '');

        setting(['about' => $about])->save();

        return $this->response->withNoContent();
    }
}