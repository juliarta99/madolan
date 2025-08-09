<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function RegistrationUmkm(Request $request) {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'email' => 'required|email:rfc,dns|max:255|unique:users,email',
                'name' => 'required|string|max:100',
                'gender'                => 'required|in:p,l',
                'no_handphone'        => 'required|string|max:25',
                'picture'            => 'sometims|file|mimes:jpg,jpeg,png|max:512',
                'password'         => 'required|string|max:255',    
                'konfirm_password'  => 'required|string|same:password',

                'name_umkm' => 'required|string|max:100',
                'no_npwp' => 'somtimes|string|max:50',
                'location' => 'required|string|max:100',
                'umkm_photo ' => 'required|file|mimes:jpg,jpeg,png|max:512',
                'logo ' => 'required|file|mimes:jpg,jpeg,png|max:512',
                'since' => 'required|year',
                'bussiness_cash' => 'somtimes|double',
                'regency' => 'somtimes|string|max:50',
                'province' => 'somtimes|string|max:50',

                'privaci'=> 'accepted'
            ]);

            $dataUser = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'no_handphone' => $validated['no_handphone'],
                'gender' => $validated['gender'],
                'password' => $validated['password'],
            ];

            if ($request->hasFile('picture')) {
                $dataUser['picture'] = fileUpload($request->file('picture'), 'user/picture');
            }
            
            $dataUmkm = [
                'name' => $validated['name_umkm'],
                'location' => $validated['location'],
                'since' => $validated['since'],
            ];

            $dataUmkm['umkm_photo'] = fileUpload($request->file('umkm_photo'), 'umkm/foto');

            if (isset($validated['logo'])) {
                $dataUmkm['logo'] = fileUpload($request->file('logo'), 'umkm/logo');
            } 

            if (isset($validated['no_npwp'])) {
                $dataUmkm['no_npwp'] = $validated['no_npwp'];
            } 
            if (isset($validated['business_cash'])) {
                $dataUmkm['business_cash'] = $validated['business_cash'];
            } 
            if (isset($validated['regency'])) {
                $dataUmkm['regency'] = $validated['regency'];
            } 
            if (isset($validated['province'])) {
                $dataUmkm['province'] = $validated['province'];
            } 
            
            $newUser = User::create([$dataUser]);

            $dataUmkm['user_id'] = $newUser->id;

            $newUmkm = Umkm::create([
                $dataUmkm
            ]);

            Mail::to($newUser->email)->queue(new RegistrationEmail( $newUser->name, 'umkm'));

            DB::commit();

            // $request->session()->regenerate();
            // $request->session()->put('mentor_id', $newUmkm->id);
            // return redirect()->intended('dashboard');

            return response()->json([
                'success' => true,
                'message' => 'Data user dan umkm berhasil dibuat',
                'user' => $newUser,
                'umkm' => $newUmkm
            ], 201);
            
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }   

    public function RegistrationMentor(Request $request) {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'email' => 'required|email:rfc,dns|max:255|unique:users,email',
                'name' => 'required|string|max:100',
                'gender'                => 'required|in:p,l',
                'no_handphone'        => 'required|string|max:25',
                'picture'            => 'sometims|file|mimes:jpg,jpeg,png|max:512',
                'password'         => 'required|string|max:255',    
                'konfirm_password'  => 'required|string|same:password',

                'portofolio ' => 'required|file|mimes:pdf|max:2048',
                'ig_url' => 'somtimes|string|max:255',
                'fb_url' => 'somtimes|string|max:255',
                'tiktok_url ' => 'somtimes|string|max:255',
                'yt_url' => 'somtimes|string|max:255',
                'linkedin_url' => 'somtimes|string|max:255',

                'privaci'=> 'accepted'
            ]);

            $dataUser = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'no_handphone' => $validated['no_handphone'],
                'gender' => $validated['gender'],
                'password' => $validated['password'],
            ];

            if ($request->hasFile('cover')) {
                $dataUser['picture'] = fileUpload($request->file('picture'), 'user/picture');
            }
            
            $dataMentor = [];

            $dataMentor['portofolio'] = fileUpload($request->file('portofolio'), 'mentor/portofolio');

            if (isset($validated['ig_url'])) {
                $dataMentor['ig_url'] = $validated['ig_url'];
            } 
            if (isset($validated['fb_url'])) {
                $dataMentor['fb_url'] = $validated['fb_url'];
            } 
            if (isset($validated['tiktok_url'])) {
                $dataMentor['tiktok_url'] = $validated['tiktok_url'];
            } 
            if (isset($validated['yt_url'])) {
                $dataMentor['yt_url'] = $validated['yt_url'];
            } 
            if (isset($validated['linkedin_url'])) {
                $dataMentor['linkedin_url'] = $validated['linkedin_url'];
            } 

            
            $newUser = User::create([$dataUser]);
            
            $dataMentor['user_id'] = $newUser->id;
            
            
            $newMentor = Mentor::create([
                $dataMentor
            ]);
            
            Mail::to($newUser->email)->queue(new RegistrationEmail( $newUser->name, 'mentor'));

            DB::commit();

            // $request->session()->regenerate();
            // $request->session()->put('mentor_id', $newUmkm->id);
            // return redirect()->intended('dashboard-mentor');

            return response()->json([
                'success' => true,
                'message' => 'Data user dan umkm berhasil dibuat',
                'user' => $newUser,
                'mentor' => $newMentor
            ], 201);
            
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $data = User::where('email', $credentials['email'])->with(['umkm', 'mentor'])->first();
            $request->session()->regenerate();
            if ($data->umkm) {
                $request->session()->put('umkm_id', $data->umkm->id);
                return redirect()->intended('dashboard');
                // return response()->json([
                //     "status" => "Berhasil"
                // ],200);
            } elseif ($data->mentor) {
                $request->session()->put('umkm_id', $data->umkm->id);
                return redirect()->intended('dashboard-mentor');
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
