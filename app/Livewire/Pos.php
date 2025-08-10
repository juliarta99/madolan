<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Transaction;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use phpDocumentor\Reflection\Types\True_;

class Pos extends Component
{
    public $scan = false;
    public $currentStep = 1;


    public $search = '';
    public $filter;

    public $total = 0;
    public $totalItem = 0;

    public $products;
    public $categories;
    
    public $cart = [];

    public $customProduk = [
        "nama" => '',
        "harga" => 0,
        "satuan" => ''
    ];

    // step two

    public $customerName = '';
    public $typePayment = '';
    public $money = 0;
    public $change = 0;

    public function mount()
    {
        $this->findProduct();
        $this->allcategory();
    }

    public function updatedSearch()
    {
        $this->findProduct();
    }

    public function updatedFilter()
    {
        $this->findProduct();
    }

    public function countTotal() {
        $a = 0;
        $b = 0;
        foreach ($this->cart as $item) {
            $a += ($item['qty'] * $item['price']);
            $b += $item['qty'];
        }
        $this->total = $a;
        $this->totalItem = $b;
    }


    public function findProduct() {
        $umkmId = session('umkm_id');

        $this->products = Product::where('umkm_id', $umkmId)
            ->where('status', 1)
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('slug', 'LIKE', '%' . $search . '%');
                });
            })
            ->when($this->filter != 0, function ($query) {
                $query->where('category_id', $this->filter);
            })
            ->get();
    }

    public function allcategory() {
        $umkmId = session('umkm_id');
        $this->categories = ProductCategory::where('umkm_id', $umkmId)->get();
    }



    // public function tambahKeCart($namaProduk)
    // {
    //     $produk = collect($this->cart)->firstWhere('name', $namaProduk);
        
    //     if ($produk) {
    //         if (isset($this->cart[$namaProduk])) {
    //             if (($this->cart[$namaProduk]['qty'] < $produk['stok'] && $produk['is_unlimited'] == false) || $produk['is_unlimited'] == true) {
    //                 $this->cart[$namaProduk]['qty'] += 1;
    //                 $this->countTotal();
    //             }
    //         } else {
    //             $this->cart[$namaProduk] = [
    //                 'name' => $produk['name'],
    //                 'price' => $produk['price'],
    //                 'unit' => $produk['unit'],
    //                 'qty' => 1,
    //             ];
    //             $this->countTotal();
    //         }
    //     } else {
    //         $this->cart[$namaProduk]['qty'] += 1;
    //         $this->countTotal();
    //     }
    // }

    public function tambahKeCart($namaProduk)
    {
        $produk = collect($this->products)->firstWhere('name', $namaProduk);
        
        if ($produk) {
            $key = $produk->name; 

            if (isset($this->cart[$key])) {
                if (
                    ($this->cart[$key]['qty'] < $produk->stock && $produk->is_unlimited == false)
                    || $produk['is_unlimited'] == true
                ) {
                    $this->cart[$key]['qty'] += 1;
                    $this->countTotal();
                }
            } else {
                $this->cart[$key] = [
                    'name' => $produk['name'],
                    'price' => $produk['price'],
                    'unit' => $produk['unit'],
                    'qty' => 1,
                ];
                $this->countTotal();
            }
        } else {
            $this->cart[$namaProduk]['qty'] += 1;
            $this->countTotal();
        }
    }


    public function kurangDariCart($namaProduk)
    {
        if (isset($this->cart[$namaProduk])) {
            if ($this->cart[$namaProduk]['qty'] > 1) {
                $this->cart[$namaProduk]['qty'] -= 1;
                $this->countTotal();
            } else {
                unset($this->cart[$namaProduk]);
                $this->countTotal();
            }
        }
    }

    public function resetCart() {
        $this->cart = [];
    }

    public function custom($nama, $harga, $satuan) {

        if (empty($nama) || $harga <= 0) {
            session()->flash('error', 'Data produk tidak valid!');
            return;
        }

        $this->cart[$nama] = [
            'name' => $nama,
            'price' => $harga,
            'unit' => $satuan,
            'qty' => 1,
        ];
        $this->countTotal();
    }

    public function toggleScan()
    {
        $this->scan = !$this->scan;
    }

    public function render()
    {
        return view('livewire.pos');
    }

    public function nextStepTwo() {
        if (count($this->cart) == 0) {
            session()->flash('error', 'Datacart kosong!');
            return;
        } else {
            $this->currentStep = 2;
        }
    }

    public function nextStepTree() {
        try {
            if (!$this->customerName && !$this->typePayment && !$this->money ) {
                session()->flash('error', 'Data Customer kosong!');
                return;
            } else {
                DB::beginTransaction()
                $transaction = Transaction::create([

                ]); 
    
                $this->currentStep = 3;
                DB:com
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function nextStepOne() {
        $this->currentStep = 1;
    }
}
