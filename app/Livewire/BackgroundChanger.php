<?php

namespace App\Livewire;

use App\Models\Marketplace\Product;
use App\Models\User\UserProduct;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BackgroundChanger extends Component
{
    public $products;
    public $userProducts;

    public function mount()
    {
        $this->products = Product::all();
        $this->userProducts = UserProduct::where('user_id', Auth::id())->pluck('product_id')->toArray();
    }

    public function changeBackgroundColor($productId, $isPurchased)
    {
        $product = Product::find($productId);

        if (!$product) {
            session()->flash('error', 'Produto não encontrado.');
            return;
        }

        $this->dispatch('changeBackgroundColor', ['bgColor' => 'bg-' . $product->context]);

        if (!$isPurchased) {
            $user = Auth::user();
            $wallet = $user->wallet;

            if (!$wallet || $wallet->balance < $product->price) {
                session()->flash('error', 'Saldo insuficiente para realizar a compra.');
                return;
            }

            $wallet->update(['balance' => $wallet->balance - $product->price]);
            UserProduct::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'bought_at' => now(),
            ]);

            $this->userProducts[] = $productId;
            session()->flash('message', 'Produto desbloqueado com sucesso!');
        }
    }

    public function render()
    {
        return view('livewire.background-changer', [
            'products' => $this->products,
            'userProducts' => $this->userProducts
        ]);
    }
}
