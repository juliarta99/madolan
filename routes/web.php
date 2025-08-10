<?php

use App\Http\Controllers\AiConsultationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FundingTypeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionCategoryController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landingpage');;

// pos
Route::get('/pos', function () {
    return view('pos.pos');
});
Route::get('/pos-scan', function () {
    return view('pos.pos-scan');
});
Route::get('/pos-confirm', function () {
    return view('pos.pos-confirm');
});
Route::get('/pos-succes', function () {
    return view('pos.pos-succes');
});

Route::get('/pending', function () {
    return view('user-validation.pending');
});
Route::get('/reject', function () {
    return view('user-validation.reject');
});

Route::get('/riwayat', function () {
    return view('dashboard.pos.riwayat-transaksi');
});

Route::get('/list-preorder', function () {
    return view('dashboard.pos.list-preorder');
});

//register
Route::get('/register-umkm', function () {
    return view('register.umkm.index');
});
Route::post('/register-umkm', [AuthController::class, 'registrationUmkm'])->name('registration.umkm');
Route::get('/register-mentor', function () {
    return view('register.mentor.index');
});
Route::post('/register-mentor', [AuthController::class, 'registrationMentor'])->name('registration.mentor');

//login user
Route::get('/login', function () {
    return view('login.index');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');


//juli
Route::get('/forum', function () {
    return view('forum.index');
})->name('forum.index');
Route::get('/forum/show', function () {
    return view('forum.show');
})->name('forum.show');

Route::get('/chat', [AiConsultationController::class, 'index'])->name('consultation.index');
Route::get('/chat/{categorySlug}', [AiConsultationController::class, 'index'])->name('consultation.category');

// API Routes untuk AJAX
Route::post('/consultation/send', [AiConsultationController::class, 'sendMessage'])->name('consultation.send');
Route::post('/consultation/clear', [AiConsultationController::class, 'clearChat'])->name('consultation.clear');

Route::get('/consultation/choose', function () {
    return view('consultation.choose');
})->name('consultation.choose');

Route::get('/login', function () {
    return view('login.index');
})->name('login.index');

Route::get('/register', function () {
    return view('register.index');
})->name('register.index');

Route::get('/umkm', function () {
    return view('register.umkm.index');
})->name('register.umkm.index');

Route::get('/mentor', function () {
    return view('register.mentor.index');
})->name('register.mentor.index');
Route::get('/pembelajaran', function () {
    return view('pembelajaran.index');
})->name('pembelajaran.index');
Route::get('/pembelajaran/show', function () {
    return view('pembelajaran.show');
})->name('pembelajaran.show');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard/product/katalog', function () {
    return view('dashboard.product.katalog.index');
})->name('dashboard.product.katalog');
Route::get('/dashboard/product/katalog/create', function () {
    return view('dashboard.product.katalog.create');
})->name('dashboard.product.katalog.create');
Route::get('/dashboard/product/kategori', function () {
    return view('dashboard.product.kategori.index');
})->name('dashboard.product.kategori');

Route::get('/dashboard/keuangan/kategori', function () {
    return view('dashboard.keuangan.kategori.index');
})->name('dashboard.keuangan.kategori');
Route::get('/dashboard/keuangan/pembukuan', function () {
    return view('dashboard.keuangan.pembukuan.index');
})->name('dashboard.keuangan.pembukuan');
Route::get('/dashboard/keuangan/pembukuan/create', function () {
    return view('dashboard.keuangan.pembukuan.create');
})->name('dashboard.keuangan.pembukuan.create');

Route::get('/dashboard/keuangan/laporan/laba-rugi', function () {
    return view('dashboard.keuangan.laporan.laba-rugi');
})->name('dashboard.keuangan.laporan');
Route::get('/dashboard/keuangan/laporan/arus-kas', function () {
    return view('dashboard.keuangan.laporan.arus-kas');
})->name('dashboard.keuangan.laporan.arus-kas');
Route::get('/dashboard/keuangan/laporan/hutang-piutang', function () {
    return view('dashboard.keuangan.laporan.hutang-piutang');
})->name('dashboard.keuangan.laporan.hutang-piutang');
Route::get('/dashboard/keuangan/laporan/penjualan', function () {
    return view('dashboard.keuangan.laporan.penjualan');
})->name('dashboard.keuangan.laporan.penjualan');

Route::get('/dashboard/keuangan/pendanaan', function () {
    return view('dashboard.keuangan.pendanaan.index');
})->name('dashboard.keuangan.pendanaan');
Route::get('/dashboard/keuangan/pendanaan/result', function () {
    return view('dashboard.keuangan.pendanaan.result');
})->name('dashboard.keuangan.pendanaan.result');

Route::get('/dashboard/learning/forum', function () {
    return view('dashboard.learning.forum.index');
})->name('dashboard.learning.forum');
Route::get('/dashboard/learning/forum/create', function () {
    return view('dashboard.learning.forum.create');
})->name('dashboard.learning.forum.create');

Route::get('/dashboard/access', function () {
    return view('dashboard.access.index');
})->name('dashboard.access');
Route::get('/dashboard/access/create', function () {
    return view('dashboard.access.create');
})->name('dashboard.access.create');
Route::get('/dashboard/access/show', function () {
    return view('dashboard.access.show');
})->name('dashboard.access.show');

// mentor
Route::get('/mentor/dashboard', function () {
    return view('dashboard.mentor');
})->name('mentor.dashboard');
Route::get('/mentor/dashboard/forum', function () {
    return view('dashboard.learning.forum.index');
})->name('mentor.dashboard.forum');
Route::get('/mentor/dashboard/pembelajaran', function () {
    return view('dashboard.learning.pembelajaran.index');
})->name('mentor.dashboard.pembelajaran');
Route::get('/mentor/dashboard/pembelajaran/create', function () {
    return view('dashboard.learning.pembelajaran.create');
})->name('mentor.dashboard.pembelajaran.create');

// admin
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin');
})->name('admin.dashboard');

Route::get('/admin/dashboard/user', function () {
    return view('dashboard.user.index');
})->name('admin.dashboard.user');

// Route::get('/admin/dashboard/product/katalog', function () {
//     return view('dashboard.product.katalog.index');
// })->name('admin.dashboard.product.katalog');
// Route::get('/admin/dashboard/product/katalog/create', function () {
//     return view('dashboard.product.katalog.create');
// })->name('admin.dashboard.product.katalog.create');
// Route::get('/admin/dashboard/product/kategori', function () {
//     return view('dashboard.product.kategori.index');
// })->name('admin.dashboard.product.kategori');
Route::get('/admin/dashboard/keuangan/kategori', function () {
    return view('dashboard.keuangan.kategori.index');
})->name('admin.dashboard.keuangan.kategori');

Route::get('/admin/dashboard/keuangan/kategori', function () {
    return view('dashboard.keuangan.kategori.index');
})->name('admin.dashboard.keuangan.kategori');

Route::get('/admin/dashboard/pendanaan/information', function () {
    return view('dashboard.pendanaan.information.index');
})->name('admin.dashboard.pendanaan.information');
Route::get('/admin/dashboard/pendanaan/information/create', function () {
    return view('dashboard.pendanaan.information.create');
})->name('admin.dashboard.pendanaan.information.create');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/kategori', [ProductCategoryController::class, 'index'])
                ->name('kategori');
            Route::post('/kategori', [ProductCategoryController::class, 'store'])
                ->name('kategori.store');
            Route::put('/kategori/{id}', [ProductCategoryController::class, 'update'])
                ->name('kategori.update');
            Route::delete('/kategori/{id}', [ProductCategoryController::class, 'destroy'])
                ->name('kategori.destroy');

            Route::get('/katalog', [ProductController::class, 'index'])
                ->name('katalog');
            Route::get('/katalog/create', [ProductController::class, 'create'])
                ->name('katalog.create');
            Route::post('/katalog', [ProductController::class, 'store'])
                ->name('katalog.store');
            Route::get('/katalog/{id}/edit', [ProductController::class, 'edit'])
                ->name('katalog.edit');
            Route::put('/katalog/{id}', [ProductController::class, 'update'])
                ->name('katalog.update');
            Route::put('/katalog/status/{id}', [ProductController::class, 'updateStatus'])
                ->name('katalog.update-status');
            Route::put('/katalog/stock/{id}', [ProductController::class, 'updateStock'])
                ->name('katalog.update-stock');
            Route::delete('/katalog/{id}', [ProductController::class, 'destroy'])
                ->name('katalog.destroy');
        });

        Route::prefix('keuangan')->name('keuangan.')->group(function () {
            Route::get('/type', [TransactionTypeController::class, 'index'])
                ->name('type');
            Route::post('/type', [TransactionTypeController::class, 'store'])
                ->name('type.store');
            Route::put('/type/{id}', [TransactionTypeController::class, 'update'])
                ->name('type.update');
            Route::delete('/type/{id}', [TransactionTypeController::class, 'destroy'])
                ->name('type.destroy');

            Route::get('/kategori', [TransactionCategoryController::class, 'index'])->name('kategori');
            Route::post('/kategori', [TransactionCategoryController::class, 'store'])->name('kategori.store');
            Route::put('/kategori/{category}', [TransactionCategoryController::class, 'update'])->name('kategori.update');
            Route::delete('/kategori/{category}', [TransactionCategoryController::class, 'destroy'])->name('kategori.destroy');
        });

        Route::prefix('pendanaan')->name('pendanaan.')->group(function () {
            Route::get('/type', [FundingTypeController::class, 'index'])
                ->name('type');
            Route::post('/type', [FundingTypeController::class, 'store'])
                ->name('type.store');
            Route::put('/type/{id}', [FundingTypeController::class, 'update'])
                ->name('type.update');
            Route::delete('/type/{id}', [FundingTypeController::class, 'destroy'])
                ->name('type.destroy');
        });

        Route::prefix('learning')->name('learning.')->group(function () {
            Route::get('/category', [CategoryController::class, 'index'])
                ->name('category');
            Route::post('/category', [CategoryController::class, 'store'])
                ->name('category.store');
            Route::put('/category/{id}', [CategoryController::class, 'update'])
                ->name('category.update');
            Route::delete('/category/{id}', [CategoryController::class, 'destroy'])
                ->name('category.destroy');
        });
    });
});
Route::get('/admin/dashboard/learning/forum', function () {
    return view('dashboard.learning.forum.admin');
})->name('admin.dashboard.learning.forum');
Route::get('/admin/dashboard/learning/pembelajaran', function () {
    return view('dashboard.learning.pembelajaran.admin');
})->name('admin.dashboard.learning.pembelajaran');

Route::get('/admin/dashboard/access', function () {
    return view('dashboard.access.index');
})->name('admin.dashboard.access');
Route::get('/admin/dashboard/user', [UserController::class, 'show'] )->name('admin.dashboard.user');
Route::put('/admin/dashboard/user/approve/{id}', [UserController::class, 'accept']);
Route::put('/admin/dashboard/user/reject/{id}', [UserController::class, 'reject']);
