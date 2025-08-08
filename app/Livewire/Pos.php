<?php

namespace App\Livewire;

use Livewire\Component;

class Pos extends Component
{
    public $scan = false;
    public $currentStep = 1;
    public $success = false;

    public $total = 0;
    public $totalItem = 0;

    public $datas = [
        [
            "nama" => "ayam",
            "harga" => 1300,
            "stok" => 12
        ],
        [
            "nama" => "babi",
            "harga" => 1900,
            "stok" => 3
        ],
    ];
    
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


    public function countTotal() {
        $a = 0;
        $b = 0;
        foreach ($this->cart as $item) {
            $a += ($item['qty'] * $item['harga']);
            $b += $item['qty'];
        }
        $this->total = $a;
        $this->totalItem = $b;
    }

    public function tambahKeCart($namaProduk)
    {
        $produk = collect($this->datas)->firstWhere('nama', $namaProduk);
        
        if ($produk) {
            if (isset($this->cart[$namaProduk])) {
                if ($this->cart[$namaProduk]['qty'] < $produk['stok']) {
                    $this->cart[$namaProduk]['qty'] += 1;
                    $this->countTotal();
                }
            } else {
                $this->cart[$namaProduk] = [
                    'nama' => $produk['nama'],
                    'harga' => $produk['harga'],
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
            'nama' => $nama,
            'harga' => $harga,
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
        // if (!$this->customerName && !$this->typePayment && !$this->money ) {
        //     session()->flash('error', 'Data Customer kosong!');
        //     return;
        // } else {
        //     $this->currentStep = 3;
        // }

        $this->currentStep = 3;
    }

    public function nextStepOne() {
        $this->currentStep = 1;
    }
}
