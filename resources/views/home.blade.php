
        @if(session('status'))
            <p>{{session('status')}}</p>
        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout </button>
        </form>

        <p><a href="{{route('password.confirm')}}"> Password confirmation</a></p>
        <p><a href="{{route('password.confirmation')}}"> Password confirmation status</a></p>

        @if(!auth()->user()->two_factor_secret)
            <p> You have not enabled two factor authentification </p>
            <form action="{{ route('two-factor.enable') }}" method="POST">
                @csrf
                @if(is_null(session()->get('auth.password_confirmed_at')))
                    <button> Enable 2FA </button>
                    <p>[You will need to confirm password before]</p>
                @else
                    <button> Enable 2FA </button>
                    <p>[You can enable now]</p>
                @endif

            </form>
        @else
            @if(session('status')=="two-factor-authentication-enabled")
                <p> You have enabled 2FA ! Please scan the following QR Code into your phone authenticator application </p>
                {!! auth()->user()->twoFactorQrCodeSvg() !!}

                <p> Please store this recovery codes in a secure location </p>
                @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $recoveryCode)
                    <p> {{ $recoveryCode }} </p>
                @endforeach
            @endif
            @if(is_null(auth()->user()->two_factor_confirmed_at))
                <form action="{{ route('two-factor.confirm') }}" method="POST">
                    @csrf
                    <p> You need to confirm 2FA by using 6 digits !</p>
                    <input type="text" name="code" placeholder="code">
                    @error('code')
                    <p>{{ $message }}</p>
                    @enderror
                    <button> Confirm 2FA </button>
                </form>
            @endif
            <form action="{{ route('two-factor.disable') }}" method="POST">
                @csrf
                @method('DELETE')
                @if(is_null(session()->get('auth.password_confirmed_at')))
                    <button> Disable 2FA </button>
                    <p>[You will need to confirm password before]</p>
                @else
                    <button> Disable 2FA </button>
                    <p>[Now you can disable]</p>
                @endif

            </form>
        @endif

