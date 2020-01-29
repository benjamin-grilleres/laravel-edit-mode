<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;
use Spatie\ResponseCache\Facades\ResponseCache;


class TextEditorController extends Controller
{
    public function index()
    {
        return Editor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('text_id');
        $text = $request->get('content');
        $size = $request->get('font_size');
        $color = $request->get('color');
        $weight = $request->get('font_weight');

        $editText = Editor::where('text_id', $id)->first();

        if($editText){
            $editText->content = $text;
            $editText->font_size = $size;
            $editText->color = $color;
            $editText->font_weight = $weight;
        } else {
            $editText = Editor::create([
                'text_id' => $id,
                'content' => $text,
                'font_size' => $size,
                'color' => $color,
                'font_weight'=> $weight,
            ]);
        }

        $editText->save();

        ResponseCache::forget('/api/editor');

        return $editText;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $text = $request->get('content');
        $size = $request->get('font_size');
        $color = $request->get('color');
        $weight = $request->get('font_weight');

        $editText = Editor::where('id', $id)->firstOrFail();

        if($editText){
            $editText->content = $text;
            $editText->font_size = $size;
            $editText->color = $color;
            $editText->font_weight = $weight;
            $editText->save();
        }
        return $editText;
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
