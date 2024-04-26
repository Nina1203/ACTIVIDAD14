<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Note; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $categories = Category::todas_las_categorias();
        #dd($notes);
        return view ('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         #dd($request);
         Category::create([
            
            'category_name' => $request->category_name,
        
        ]);

        return redirect()->route('categories.index')
        ->with('success','Categoría creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('categories.show')
        ->with('categories',Category::categoria_por_id($id))
        ->with('notes',Category::notas_por_categoria($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('categories.edit')
        ->with('category',Category::categoria_por_id($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::categoria_por_id($id);

        $category->update([
            'category_name'     =>  $request->category_name,
        ]);

        return redirect()->route('categories.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::categoria_por_id($id);

        $category->update([
            'active'     =>  false,
        ]);

        $notes = Note::notas_por_category_id($id);

        foreach ($notes as $note) {
            
            $currentnote = Note::nota_por_id($note -> id);

            $currentnote->update([
                'category_id' =>  NULL
            ]);
        }

        return redirect()->route('categories.index');
    }
}
