<?php

namespace App\Http\Controllers;

use App\Models\RichTextContent;
use Illuminate\Http\Request;

class RichTextContentController extends Controller
{
    public function create()
    {
        return view('rich_text_content.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        RichTextContent::create($validatedData);

        return redirect()->route('rich_text_content.create')->with('success', 'Contenido creado correctamente.');
    }

    public function show(RichTextContent $richTextContent)
    {
        return view('rich_text_content.show', compact('richTextContent'));
    }
}
