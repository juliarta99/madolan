<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Str;
use GuzzleHttp\Psr7\Request;
use App\Models\ProductCategory;
use App\Models\TransactionItem;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\True_;
use function PHPUnit\Framework\returnCallback;

class Pos extends Component
{
    public $scan = false;
    public $currentStep = 1;

    public $currentTransactionId;

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
                    'id' => $produk['id'],
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
            DB::beginTransaction();
            if (empty($this->typePayment) || empty($this->money)) {
                throw new Exception("Transaksi gagal");
            }
            
            $code = $this->generateUniqueTransactionCode();
            $transaction = Transaction::create([
                'code' => $code,
                'umkm_id' => session('umkm_id'),
                'category_id' => 1,
                'transaction_date' => now(),
                'description' => 'pos transaction',
                'customer_name' => $this->customerName ?? null,
                'grand_total' => $this->total,
                'amount_paid' => $this->money,
                'payment' => $this->typePayment,
                'is_paid' => true,
                'created_by' => null
            ]); 
    
            $tampung = [];
    
            foreach ($this->cart as $item) {
                $dataItem = [
                    'transaction_id' => $transaction->id,
                    'name'  => $item['name'],
                    'unit' => $item['unit'],
                    'price' => $item['price'],
                    'quantity' => $item['qty'],
                ];
    
                if (isset($item['id'])) {
                    $dataItem['id'] = $item['id'];
    
                    $cekProduk = Product::findOrFail($item['id']);
    
                    if (!$cekProduk->is_unlimited) {
                        if ($cekProduk->stock - $item['qty'] < 0) {
                            throw new Exception("stok habis",);
                        }
                        $tampung[] = [
                            'id' => $item['id'],
                            'qty' => $item['qty']
                        ];
                    } 
                }
    
                TransactionItem::create($dataItem);
            }

            foreach ($tampung as $item) {
                $produk = Product::findOrFail($item['id']);
                $produk->stock -= $item['qty'];
                $produk->save();
            }
            
            $this->currentTransactionId = $transaction->id;
        
            $this->currentStep = 3;
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                "status" => "gagal",
                "msg" => $e->getMessage()
            ], 400);
            
        }
    }

    
    public function nextStepOne() {
        $this->currentStep = 1;
    }

    function generateUniqueTransactionCode(): string
    {
        do {
            $prefix = 'TRS-' . now()->format('Ymd') . '-';
            $random = Str::upper(Str::random(30)); // 40 karakter random
            $code = $prefix . $random; // total ± 50 karakter
        } while (Transaction::where('code', $code)->exists());

        return $code;
    }
}
