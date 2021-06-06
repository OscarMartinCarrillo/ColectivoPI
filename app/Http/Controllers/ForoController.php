<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ForoController extends Controller
{

    //Sobre Categorías
    public function indexCategory()
    {
        $categories = Category::orderBy('id')->paginate(10);
        $themes = Theme::orderby('id')->get();
        return view('foro.categories', compact('categories', 'themes'));
    }

    public function createCategory()
    {
        return view('foro.crearCategorie');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:20']
        ]);
        try {
            $category = new Category();
            $category->nombre = ucwords($request->nombre);
            $category->user_id = Auth::user()->id;

            $category->save();


            return redirect()->route('foro.indexCategory')->with('mensaje', "Categoría Creada");
        } catch (\Exception $ex) {
            return redirect()->route('foro.indexCategory')->with('error', "No se ha podido crear la Categoría. Error tipo: " . $ex->getMessage());
        }
    }

    public function destroyCategory(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('foro.indexCategory')->with('mensaje', "Se ha borrado correctamente.");
        } catch (\Exception $ex) {
            return redirect()->route('foro.indexCategory')->with('error', "No se ha podido borrar. ".$ex->getMessage());
        }

    }


    //Sobre Temas
    public function indexTheme($idCat)
    {
        $themes = Theme::orderBy('created_at', 'desc')
            ->where('category_id', $idCat)
            ->paginate(10);
        $posts = Post::orderby('id')->get();
        return view('foro.themes', compact('themes', 'posts'));
    }

    public function createTheme()
    {
        $categories = Category::orderby('created_at')->get();
        return view('foro.createTheme', compact('categories'));
    }

    public function storeTheme(Request $request)
    {

        $request->validate([
            'category_id' => ['required'],
            'nombre' => ['required', 'min:5', 'max:40'],
            'contenido' => ['required', 'min:5', 'max:1400']
        ]);
        try {

            $theme = new Theme();
            $theme->nombre = $request->nombre;
            $theme->category_id = $request->category_id;
            $theme->user_id = Auth::user()->id;

            $theme->save();

            $post = new Post();
            $post->contenido = base64_encode($request->contenido);
            $post->theme_id = $theme->id;
            $post->user_id = Auth::user()->id;
            $post->save();
            return redirect()->route('foro.indexTheme', ['id' => $request->category_id])->with('mensaje', "Tema creado correctamente.");
        } catch (\Exception $ex) {
            return redirect()->route('foro.indexTheme', ['id' => $request->category_id])->with('error', "No se ha podido crear el Tema." . $ex->getMessage());
        }
    }

    public function destroyTheme(Theme $theme)
    {
        $id = $theme->category_id;
        try {
            $theme->delete();
            return redirect()->route('foro.indexTheme', ['id' => $id])->with('mensaje', "Tema Borrada");
        } catch (\Exception $ex) {
            return redirect()->route('foro.indexTheme', ['id' => $id])->with('error', "No se ha podido borrar: " . $ex->getMessage());
        }
    }

    //Sobre Posts
    public function indexPost($idTheme)
    {
        $posts = Post::orderby('created_at')->where('theme_id', $idTheme)->paginate(30);
        return view('foro.posts', compact('posts'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'contenido' => ['required', 'max:1400'],
        ]);
        $idTheme = $request->idTheme;
        try {
            $post = new Post();
            $post->contenido = base64_encode($request->contenido);
            $post->theme_id = $idTheme;
            $post->user_id = Auth::user()->id;

            $post->save();
            return redirect()->route('foro.indexPost', ['id' => $request->idTheme])->with('mensaje', "Se ha publicado el mensaje.");
        } catch (\Exception $ex) {
            return redirect()->route('foro.indexPost', ['id' => $request->idTheme])->with('error', "No se ha podido publicar el mensaje. " . $ex->getMessage());
        }
    }

    public function destroyPost(Post $post)
    {
        $id = $post->theme_id;
        try {
            if (count(Post::where('theme_id', $id)->get()) == 1) {

                $theme = Theme::where('id', $id)->get();
                $idCat = $theme[0]->category_id;
                $theme[0]->delete();

                return redirect()->route('foro.indexTheme', ['id' => $idCat])->with('mensaje', "Mensaje y Tema Borrado");
            }

            $post->delete();
            return redirect()->route('foro.indexPost', ['id' => $id])->with('mensaje', "Mensaje Borrado");
        } catch (\Exception $ex) {
            return redirect()->route('foro.indexPost', ['id' => $id])->with('error', "No se ha podido borrar: " . $ex->getMessage());
        }
    }
}
