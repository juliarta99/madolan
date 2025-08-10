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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landingpage');

Route::middleware(['auth', 'umkm'])->group(function () {
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

    Route::get('/riwayat', function () {
        return view('dashboard.pos.riwayat-transaksi');
    });
    
    Route::get('/list-preorder', function () {
        return view('dashboard.pos.list-preorder');
    });
});

Route::get('/fitur', function () {
    return view('fitur.index');
})->name('fitur.index');

Route::get('/ds', function () {
    return view('fitur.ds.index');
})->name('fitur.ds.index');

Route::get('/fiturforum', function () {
    return view('fitur.fiturforum.index');
})->name('fitur.fiturforum.index');

Route::get('/fiturpembelajaran', function () {
    return view('fitur.fiturpembelajaran.index');
})->name('fitur.fiturpembelajaran.index');

Route::get('/fiturPOS', function () {
    return view('fitur.fiturPOS.index');
})->name('fitur.fiturPOS.index');

Route::get('/fiturlaporan', function () {
    return view('fitur.fiturlaporan.index');
})->name('fitur.fiturlaporan.index');

Route::get('/fiturpendanaan', function () {
    return view('fitur.fiturpendanaan.index');
})->name('fitur.fiturpendanaan.index');

Route::get('/faq', function () {
    return view('faq.index');
})->name('faq.index');

Route::get('/forum', function () {
    return view('forum.index');
})->name('forum.index');

Route::get('/forum/show', function () {
    return view('forum.show');
})->name('forum.show');

Route::get('/pembelajaran', function () {
    return view('pembelajaran.index');
})->name('pembelajaran.index');

Route::get('/pembelajaran/show', function () {
    return view('pembelajaran.show');
})->name('pembelajaran.show');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', function () {
        return view('register.index');
    })->name('register.index');
    Route::get('/register-umkm', function () {
        return view('register.umkm.index');
    });
    Route::post('/register-umkm', [AuthController::class, 'registrationUmkm'])->name('registration.umkm');
    Route::get('/register-mentor', function () {
        return view('register.mentor.index');
    });
    Route::post('/register-mentor', [AuthController::class, 'registrationMentor'])->name('registration.mentor');
    Route::get('/login', function () {
        return view('login.index');
    })->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/pending', function () {
        return view('user-validation.pending');
    });
    Route::get('/reject', function () {
        return view('user-validation.reject');
    });
});

Route::middleware(['auth', 'umkm'])->group(function () {
    Route::get('/chat', [AiConsultationController::class, 'index'])->name('consultation.index');
    Route::get('/chat/{categorySlug}', [AiConsultationController::class, 'index'])->name('consultation.category');
    Route::post('/consultation/send', [AiConsultationController::class, 'sendMessage'])->name('consultation.send');
    Route::post('/consultation/clear', [AiConsultationController::class, 'clearChat'])->name('consultation.clear');
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('index');

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
            Route::get('/kategori', [TransactionCategoryController::class, 'index'])->name('kategori');
            Route::post('/kategori', [TransactionCategoryController::class, 'store'])->name('kategori.store');
            Route::put('/kategori/{category}', [TransactionCategoryController::class, 'update'])->name('kategori.update');
            Route::delete('/kategori/{category}', [TransactionCategoryController::class, 'destroy'])->name('kategori.destroy');
        });
    });


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
    
});

Route::middleware(['auth', 'mentor'])->group(function () {
    Route::get('/mentor/dashboard', function () {
        return view('dashboard.mentor.index');
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
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('/', function () {
                return view('dashboard.admin');
            })->name('index');
    
            Route::prefix('keuangan')->name('keuangan.')->group(function () {
                Route::get('/type', [TransactionTypeController::class, 'index'])
                    ->name('type');
                Route::post('/type', [TransactionTypeController::class, 'store'])
                    ->name('type.store');
                Route::put('/type/{id}', [TransactionTypeController::class, 'update'])
                    ->name('type.update');
                Route::delete('/type/{id}', [TransactionTypeController::class, 'destroy'])
                    ->name('type.destroy');
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
    
                Route::get('/information', function () {
                    return view('dashboard.pendanaan.information.index');
                })->name('information');
                Route::get('/information/create', function () {
                    return view('dashboard.pendanaan.information.create');
                })->name('information.create');
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
    
                Route::get('/forum', function () {
                    return view('dashboard.learning.forum.admin');
                })->name('forum');
                Route::get('/pembelajaran', function () {
                    return view('dashboard.learning.pembelajaran.admin');
                })->name('pembelajaran');
            });
    
            Route::prefix('user')->name('user.')->group(function () {
                Route::get('/', [UserController::class, 'show'] )->name('index');
                Route::put('/approve/{id}', [UserController::class, 'accept'])->name('accept');
                Route::put('/reject/{id}', [UserController::class, 'reject'])->name('reject');
            });
            
            Route::get('/access', function () {
                return view('dashboard.access.index');
            })->name('.access');
        });
    });
});
