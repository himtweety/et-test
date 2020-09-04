<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowProducts extends Controller {

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        //
        $products = \App\Product::all();
        $settings = \App\Setting::all()->pluck(
                'value', 'name'
        )->toArray();
        $settings['last_crawled'] = $settings['last_crawled']->toDateTime()->format('Y-m-d H:i:s');
        return view('welcome')->with([
                    'products' => $products,
                    'settings' => $settings,
        ]);
    }

}
