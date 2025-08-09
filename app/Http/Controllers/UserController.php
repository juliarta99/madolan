<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request) {
        $users = User::with(['umkm', 'mentor'])
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
            ->when($request->time, function ($query, $time) {
                if ($time == 'terbaru') {
                    $query->orderBy('created_at', 'desc');
                } else if ($time == 'terlama') {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($request->role, function ($query, $role) {
                $query->where('role', $role);
            })
            ->paginate(10)
            ->withQueryString();

            // return view("manajemen-user", compact('users'));
    }

    public function show(Request $request) {
        $users = User::with(['umkm', 'mentor'])
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
            ->when($request->time, function ($query, $time) {
                if ($time == 'terbaru') {
                    $query->orderBy('created_at', 'desc');
                } else if ($time == 'terlama') {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($request->role, function ($query, $role) {
                $query->where('role', $role);
            })
            ->paginate(10)
            ->withQueryString();

            // return view("manajemen-user", compact('users'));
    }

    public function accept($role, $id) {

        if ($role == 'umkm') {
            $data = Umkm::findOrFail($id);
        } elseif ($role == 'mentor') {
            $data = Umkm::findOrFail($id);
        }
        

        if ($data->is_approve) {
            abort(400, 'Peserta sudah diterima sebelumnya.');
        }

        //tolak tidak bisa diterima

        $data->is_approve = true;
        $data->save();

        // Mail::to($data->user->email)->queue(new ValidationAcceptedMail( $data->competition->name));
        
        // return back()->with('success', 'User berhasil diverifikasi.');
    }

    public function reject(Request $request, $role, $id) {
        $if ($role == 'umkm') {
            $data = Umkm::findOrFail($id);
        } elseif ($role == 'mentor') {
            $data = Umkm::findOrFail($id);
        }

        if ($data->is_approve) {
            abort(400, 'Peserta sudah diterima sebelumnya.');
        }

        if (!empty($data->reject_message)) {
            abort(400, 'Peserta sudah ditolak sebelumnya.');
        }

        $validatedData = $request->validate([
            'reject_message' => ['required', 'string'],
        ]);

        $data->reject_message = $validatedData['reject_message'];
        $data->save();

        // Mail::to($data->user->email)->queue(new ValidationRejectedMail( $data->competition->name, $data->no_registration, $data->reject_message));

        // return back()->with('success', 'User berhasil ditolak.');
    }
}
