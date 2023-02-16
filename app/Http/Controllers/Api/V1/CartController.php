<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Controllers\Controller;


class CartController extends Controller
{
    /* VISUALIZACION DEL CARRITO
    */
    public function cart(Request $request){
        return view('checkout');
    }

    /* FUNCION QUE AÑADE UN NUEVO PRODUCTO AL CARRITO
       PARAMETROS DE LA REQUEST:
       - ID: ID DEL PRODUCTO A AÑADIR, SE CONTROLA SI YA EXISTIA PREVIAMENTE PARA SUMARLE UNO MAS EN CANTIDAD
    */
    public function add(Request $request){
        
        $id = $request->producto_id;
        $producto = Producto::find($id);
        
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {
            $cart[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
            ];
        }
        $request->session()->put('cart', $cart);

        return back()->with('success',"$producto->nombre ¡se ha agregado con éxito al carrito!");
   
    }


    /* FUNCION QUE ELIMINA COMPLETAMENTE TODOS LOS PRODUCTOS DEL CARRITO
       SIN PARAMETROS DE LA REQUEST
    */
    public function clear(Request $request){
        $request->session()->forget('cart');
        return back()->with('success',"To!");
    }

    /* FUNCION QUE ACTUALIZA LA CANTIDAD DE PRODUCTOS DEL CARRITO DE UN PRODUCTO DETERMINADO
       PARAMETROS DE LA REQUEST:
       - ID: ID DEL PRODUCTO A ACTUALIZAR
       - CANTIDAD: CANTIDAD FINAL DE ESE PRODUCTO EN EL CARRITO
    */
    public function update(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["cantidad"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /* FUNCION QUE ELIMINA UN PRODUCTO DEL CARRITO
       PARAMETROS DE LA REQUEST:
       - ID: ID DEL PRODUCTO A ELIMINAR
    */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}