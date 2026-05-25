<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    // ============================================================
    // Tampilkan halaman login
    // ============================================================
    public function create(): View
    {
        return view('auth.login');
    }

    // ============================================================
    // Proses login (gunakan LoginRequest yang sudah dikustomisasi)
    // ============================================================
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi user
        $request->authenticate();

        // Regenerasi session untuk keamanan (mencegah session fixation)
        $request->session()->regenerate();

        // Redirect ke halaman utama setelah login berhasil
        return redirect()->intended(route('dashboard', absolute: false));
    }

    // ============================================================
    // Proses logout
    // ============================================================
    public function destroy(Request $request): RedirectResponse
    {
        // Logout user dari guard 'web'
        Auth::guard('web')->logout();

        // Invalidate session saat ini
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
