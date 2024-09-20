<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BasketController extends Controller
{
//    private $basket;
//
//    public function __construct() {
//        $this->getBasket();
//    }
    public function index(Request $request) {
        $basket_id = $request->cookie('basket_id');
//        dd($basket_id);
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('basket.index', compact(['products', 'basket_id']));
        } else {
            abort(404);
        }
    }

    public function oformlenie(Request $request) {
        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('basket.oformlenie', compact('products'));
        } else {
            abort(404);
        }
    }
    public function oformlenie_store(Request $request) {
        $basket_id = $request->cookie('basket_id');
        $products = Basket::findOrFail($basket_id)->products;
        $cost = 0;
        $basketCost = 0;
        foreach ($products as $product){
            if ($product->discount){
                $itemPrice = $product->discount;
            }
            else {
                $itemPrice = $product->amount;
            }
            $itemQuantity =  $product->pivot->quantity;
            $cost = $cost + $itemQuantity;
            $itemCost = $itemPrice * $itemQuantity;
            $basketCost = $basketCost + $itemCost;
        }
        if ($request->delivery == 'Доставка курьером'){
            $basketCost = $basketCost + 100;
        }
        Order::create([
            'basket_id' => $basket_id,
            'amount' => $basketCost,
            ] + $request->all());
        return view('basket.access');
    }
    /**
     * Добавляет товар с идентификатором $id в корзину
     */
    public function add(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        $quantity = $request->input('quantity') ?? 1;
        if (empty($basket_id)) {
            // если корзина еще не существует — создаем объект
            $basket = Basket::create();
            // получаем идентификатор, чтобы записать в cookie
            $basket_id = $basket->id;
        } else {
            // корзина уже существует, получаем объект корзины
            $basket = Basket::findOrFail($basket_id);
            // обновляем поле `updated_at` таблицы `baskets`
            $basket->touch();
        }
        if ($basket->products->contains($id)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $basket->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // если такого товара нет в корзине — добавляем его
            $basket->products()->attach($id, ['quantity' => $quantity]);
        }
        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
        return back()->withCookie(cookie('basket_id', $basket_id, 525600));
    }
    /**
     * Удаляет товар с идентификаторм $id из корзины
     */
    public function remove(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        $basket = Basket::findOrFail($basket_id);
//        dd($basket);
        $basket->remove($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Полностью очищает содержимое корзины покупателя
     */
    public function clear(Request $request) {
        $basket_id = $request->cookie('basket_id');
        $basket = Basket::findOrFail($basket_id);
        $pivotRow = $basket->products()->where('product_id', $basket_id);
        // удаляем товар из корзины (разрушаем связь)
        $pivotRow->detach();
//        $basket->delete();
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }
    /**
     * Увеличивает кол-во товара $id в корзине на единицу
     */
    public function plus(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
//        dd($basket_id);
        if (empty($basket_id)) {
            abort(404);
        }
        $this->change($basket_id, $id, 1);
        // выполняем редирект обратно на страницу корзины
        return redirect()
            ->route('basket.index')
            ->withCookie(cookie('basket_id', $basket_id, 525600));
    }

    /**
     * Уменьшает кол-во товара $id в корзине на единицу
     */
    public function minus(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        if (empty($basket_id)) {
            abort(404);
        }
        $this->change($basket_id, $id, -1);
        // выполняем редирект обратно на страницу корзины
        return redirect()
            ->route('basket.index')
            ->withCookie(cookie('basket_id', $basket_id, 525600));
    }

    /**
     * Изменяет кол-во товара $product_id на величину $count
     */
    private function change($basket_id, $product_id, $count = 0) {
        if ($count == 0) {
            return;
        }
        $basket = Basket::findOrFail($basket_id);
        // если товар есть в корзине — изменяем кол-во
        if ($basket->products->contains($product_id)) {
            $pivotRow = $basket->products()->where('product_id', $product_id)->first()->pivot;
            $quantity = $pivotRow->quantity + $count;
            if ($quantity > 0) {
                // обновляем кол-во товара $product_id в корзине
                $pivotRow->update(['quantity' => $quantity]);
                // обновляем поле `updated_at` таблицы `baskets`
                $basket->touch();
            } else {
                // кол-во равно нулю — удаляем товар из корзины
                $pivotRow->delete();
            }
        }
    }


//    /**
//     * Увеличивает кол-во товара $id в корзине на единицу
//     */
//    public function plus($id) {
////        dd($this);
//        $this->increase($id);
//        // выполняем редирект обратно на страницу корзины
//        return back()->withCookie(cookie('basket_id', $this->basket->id, 525600));
//    }
//
//    /**
//     * Уменьшает кол-во товара $id в корзине на единицу
//     */
//    public function minus($id) {
//        $this->basket->decrease($id);
//        // выполняем редирект обратно на страницу корзины
//        return redirect()->route('basket.index');
//    }

//    /**
//     * Возвращает объект корзины; если не найден — создает новый
//     */
//    private function getBasket() {
//        $basket_id = request()->cookie('basket_id');
//        if (!empty($basket_id)) {
//            try {
//                $this->basket = Basket::findOrFail($basket_id);
//            } catch (ModelNotFoundException $e) {
//                $this->basket = Basket::create();
//            }
//        } else {
//            $this->basket = Basket::create();
//        }
//        return redirect()
//            ->route('basket.index')
//            ->withCookie(cookie('basket_id', $basket_id, 525600));
//        cookie::queue('basket_id', $this->basket->id, 525600);
//    }
}
