<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request) {
        $users = User::with(['umkm', 'mentor'])
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($request->status, function ($query, $status) {
                if ($status == "approve") {
                    $query->where(function ($q) {
                        $q->whereHas('umkm', function ($sub) {
                            $sub->where('is_approve', true);
                        })
                        ->orWhereHas('mentor', function ($sub) {
                            $sub->where('is_approve', true);
                        });
                    });
                } elseif ($status == "pending") {
                    $query->where(function ($q) {
                        $q->whereHas('umkm', function ($sub) {
                            $sub->where('is_approve', false)
                                ->where(function ($s) {
                                    $s->whereNull('reject_message')
                                    ->orWhere('reject_message', '');
                                });
                        })
                        ->orWhereHas('mentor', function ($sub) {
                            $sub->where('is_approve', false)
                                ->where(function ($s) {
                                    $s->whereNull('reject_message')
                                    ->orWhere('reject_message', '');
                                });
                        });
                    });
                } elseif ($status == "rejected") {
                    $query->where(function ($q) {
                        $q->whereHas('umkm', function ($sub) {
                            $sub->whereNotNull('reject_message')
                                ->where('reject_message', '<>', '');
                        })
                        ->orWhereHas('mentor', function ($sub) {
                            $sub->whereNotNull('reject_message')
                                ->where('reject_message', '<>', '');
                        });
                    });
                }
            })
            ->when($request->sort_by, function ($query, $sort_by) {
                if ($sort_by == 'terbaru') {
                    $query->orderBy('created_at', 'desc');
                } else if ($sort_by == 'terlama') {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($request->role, function ($query, $role) {
                $query->where('role', $role);
            })
            ->paginate(10)
            ->withQueryString();

            $pending = User::where(function ($q) {
                $q->whereHas('umkm', function ($query) {
                    $query->whereNull('is_approve')->orWhere('is_approve', false)
                        ->where(function ($sub) {
                            $sub->whereNull('reject_message')
                                ->orWhere('reject_message', '');
                        });
                })
                ->orWhereHas('mentor', function ($query) {
                    $query->whereNull('is_approve')->orWhere('is_approve', false)
                        ->where(function ($sub) {
                            $sub->whereNull('reject_message')
                                ->orWhere('reject_message', '');
                        });
                });
            })
            ->count();

            return view("dashboard.user.index", compact('users', 'pending'));
    }

    

    // public function accept($id) {
    //     $data = Umkm::with(['umkm', 'mentor'])->findOrFail($id);

    //     if ($data->role == 'umkm') {
    //         if ($data->umkm->is_approve) {
    //             abort(400, 'Peserta sudah diterima sebelumnya.');
    //         }

    //         $data->umkm->is_approve = true;
    //         $data->save();
    //     } elseif ($data->role == 'mentor') {
    //         if ($data->umkm->is_approve) {
    //             abort(400, 'Peserta sudah diterima sebelumnya.');
    //         }
    //         $data->umkm->is_approve = true;
    //         $data->save();
    //     } else {
    //         if ($data->is_approve) {
    //             abort(500, 'Program error.');
    //         }
    //     }
        
    //     // Mail::to($data->user->email)->queue(new ValidationAcceptedMail( $data->competition->name));
        
    //     return back()->with('success', 'User berhasil diverifikasi.');
    // }

    public function accept($id) {
        try {
            $data = User::findOrFail($id);

            if ($data->role == 'umkm') {
                $umkm = $data->umkm; // langsung dari relasi
                if ($umkm) {
                    if ($umkm->is_approve) {
                        return back()->with('error', 'Peserta UMKM sudah diterima sebelumnya.');
                    }
                    $umkm->is_approve = true;
                    $umkm->save();
                } else {
                    return back()->with('error', 'Data UMKM tidak ditemukan.');
                }

            } elseif ($data->role == 'mentor') {
                $mentor = $data->mentor; // langsung dari relasi
                if ($mentor) {
                    if ($mentor->is_approve) {
                        return back()->with('error', 'Mentor sudah diterima sebelumnya.');
                    }
                    $mentor->is_approve = true;
                    $mentor->save();
                } else {
                    return back()->with('error', 'Data Mentor tidak ditemukan.');
                }
            }

            return back()->with('success', 'User berhasil diverifikasi.');
        } catch (\Exception $e) {
            \Log::error('Accept error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function reject(Request $request, $id) 
{
    // Ambil user, bukan UMKM, biar relasi umkm & mentor bisa dipakai
    $data = User::with(['umkm', 'mentor'])->findOrFail($id);

    $validatedData = $request->validate([
        'reject_message' => ['required', 'string'],
    ]);

    if ($data->role == 'umkm') {
        if ($data->umkm && $data->umkm->is_approve) {
            abort(400, 'Peserta sudah diterima sebelumnya.');
        }
        if ($data->umkm && !empty($data->umkm->reject_message)) {
            abort(400, 'Peserta sudah ditolak sebelumnya.');
        }

        if ($data->umkm) {
            $data->umkm->reject_message = $validatedData['reject_message'];
            $data->umkm->save(); // simpan ke tabel umkm
        } else {
            return back()->with('error', 'Data UMKM tidak ditemukan.');
        }

    } elseif ($data->role == 'mentor') {
        if ($data->mentor && $data->mentor->is_approve) {
            abort(400, 'Peserta sudah diterima sebelumnya.');
        }
        if ($data->mentor && !empty($data->mentor->reject_message)) {
            abort(400, 'Peserta sudah ditolak sebelumnya.');
        }

        if ($data->mentor) {
            $data->mentor->reject_message = $validatedData['reject_message'];
            $data->mentor->save(); // simpan ke tabel mentor
        } else {
            return back()->with('error', 'Data Mentor tidak ditemukan.');
        }

    } else {
        if ($data->is_approve) {
            abort(500, 'Program error.');
        }
    }

    // Kirim email (aktifkan kalau diperlukan)
    // Mail::to($data->email)->queue(
    //     new ValidationRejectedMail(
    //         $data->competition->name, 
    //         $data->no_registration, 
    //         $validatedData['reject_message']
    //     )
    // );

    return back()->with('success', 'User berhasil ditolak.');
}


}
