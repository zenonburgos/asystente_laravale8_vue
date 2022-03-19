<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categories', 'articulos.idcategoria', '=', 'categories.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
                    'articulos.nombre','articulos.marca','articulos.modelo',
                    'articulos.codigo_interno','categories.nombre as nombre_categoria', 
                    'articulos.precio_venta','articulos.stock','articulos.descripcion',
                    'articulos.condicion', 'articulos.precio_compra','articulos.precio_venta2',
                    'articulos.precio_venta3','articulos.factor1','articulos.factor2','articulos.factor3',
                    'articulos.formatos','articulos.listapre')
            ->orderBy('articulos.id', 'desc')->paginate(5);
        }
        else{
            $articulos = Articulo::join('categories', 'articulos.idcategoria', '=', 'categories.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo',
                    'articulos.nombre','articulos.marca','articulos.modelo',
                    'articulos.codigo_interno','categories.nombre as nombre_categoria', 
                    'articulos.precio_venta','articulos.stock','articulos.descripcion',
                    'articulos.condicion', 'articulos.precio_compra','articulos.precio_venta2',
                    'articulos.precio_venta3','articulos.factor1','articulos.factor2','articulos.factor3',
                    'articulos.formatos','articulos.listapre')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('articulos.id', 'desc')->paginate(5);                        
        }
        

        return [
            'pagination' => [
                'total'        => $articulos->total(),
                'current_page' => $articulos->currentPage(),
                'per_page'     => $articulos->perPage(),
                'last_page'    => $articulos->lastPage(),
                'from'         => $articulos->firstItem(),
                'to'           => $articulos->lastItem(),
            ],
            'articulos' => $articulos
        ];
    }

    public function buscarArticulo(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id','nombre')->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }


    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = new Articulo();
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->modelo = $request->modelo;
        $articulo->codigo_interno = $request->codigo_interno;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = '1';
        $articulo->save();
    }


    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $articulo = Articulo::findOrFail($request->id);
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->modelo = $request->modelo;
        $articulo->codigo_interno = $request->codigo_interno;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = '1';
        $articulo->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '0';
        $articulo->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '1';
        $articulo->save();
    }
}
