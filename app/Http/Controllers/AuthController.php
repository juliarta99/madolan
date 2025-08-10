<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registrationUmkm(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns|max:255|unique:users,email',
            'name' => 'required|string|max:100',
            'gender'                => 'required|in:p,l',
            // 'no_handphone'        => 'nullable|string|max:25|unique:users,no_handphone',
            // 'picture'            => 'nullable|file|mimes:jpg,jpeg,png|max:512',
            'password'         => 'required|string|max:255',    
            'konfirm_password'  => 'required|string|same:password',

            'name_umkm' => 'required|string|max:100',
            'no_npwp' => 'nullable|string|max:50',
            'location' => 'required|string|max:100',
            'umkm_photo' => 'required|file|mimes:jpg,jpeg,png|max:1024',
            'since' => 'required|integer',

            'privaci'=> 'accepted'
        ]);

        $dataUser = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'password' => Hash::make($validated['password']),
        ];

        if (isset($validated['no_handphone'])) {
            $dataUser['no_handphone'] = $validated['no_handphone'];
        }

        if ($request->hasFile('picture')) {
            $dataUser['picture'] = fileUpload($request->file('picture'), 'user/pictur');
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
        
        $newUser = User::create($dataUser);

        $dataUmkm['user_id'] = $newUser->id;

        $newUmkm = Umkm::create($dataUmkm);

        Mail::to($newUser->email)->queue(new RegistrationEmail( $newUser->name, 'umkm'));

        DB::commit();

        $request->session()->regenerate();
        $request->session()->put('umkm_id', $newUmkm->id);
        return redirect('/pending');
    }   

    public function registrationMentor(Request $request) {
        // try {
            // DB::beginTransaction();

            $validated = $request->validate([
                'email' => 'required|email:rfc,dns|max:255|unique:users,email',
                'name' => 'required|string|max:100',
                'gender'                => 'required|in:p,l',
                'no_handphone'        => 'sometimes|string|max:25|unique:users,no_handphone',
                'picture'            => 'sometimes|file|mimes:jpg,jpeg,png|max:512',
                'password'         => 'required|string|max:255',    
                'konfirm_password'  => 'required|string|same:password',

                'portfolio' => 'required|file|mimes:pdf|max:2048',
                // 'ig_url' => 'sometimes|string|max:255',
                // 'fb_url' => 'sometimes|string|max:255',
                // 'tiktok_url' => 'sometimes|string|max:255',
                // 'yt_url' => 'sometimes|string|max:255',
                // 'linkedin_url' => 'sometimes|string|max:255',

                'privaci'=> 'accepted'
            ]);

            $dataUser = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'gender' => $validated['gender'],
                'password' => Hash::make($validated['password']),
                'role' => 'mentor'
            ];

            if ($request->hasFile('picture')) {
                $dataUser['picture'] = fileUpload($request->file('picture'), 'user/picture');
            }
            
            $dataMentor = [];

            $dataMentor['portfolio'] = fileUpload($request->file('portfolio'), 'mentor/portfolio');

            if (!empty($validated['ig_url'])) {
                $dataMentor['ig_url'] = $validated['ig_url'];
            } 
            if (!empty($validated['fb_url'])) {
                $dataMentor['fb_url'] = $validated['fb_url'];
            } 
            if (!empty($validated['tiktok_url'])) {
                $dataMentor['tiktok_url'] = $validated['tiktok_url'];
            } 
            if (!empty($validated['yt_url'])) {
                $dataMentor['yt_url'] = $validated['yt_url'];
            } 
            if (!empty($validated['linkedin_url'])) {
                $dataMentor['linkedin_url'] = $validated['linkedin_url'];
            } 

            
            $newUser = User::create($dataUser);
            
            $dataMentor['user_id'] = $newUser->id;
            
            $newMentor = Mentor::create($dataMentor);
            
            Mail::to($newUser->email)->queue(new RegistrationEmail( $newUser->name, 'mentor'));

            DB::commit();

            $request->session()->regenerate();
            $request->session()->put('mentor_id', $newMentor->id);
            return redirect('/pending');
            
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus session khusus user (umkm_id atau mentor_id)
        $request->session()->forget('umkm_id');
        $request->session()->forget('mentor_id');

        // Regenerate session supaya aman
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau homepage
        return redirect('/login');
    }

}

