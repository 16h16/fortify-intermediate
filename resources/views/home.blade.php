
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
                <button> Enable 2FA </button>
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
            <form action="{{ route('two-factor.confirm') }}" method="POST">
                @csrf
                <input type="text" name="code" placeholder="code">
                @error('code')
                <p>{{ $message }}</p>
                @enderror
                <button> Authentication </button>
            </form>
            <form action="{{ route('two-factor.disable') }}" method="POST">
                @csrf
                @method('DELETE')
                <button> Disable 2FA </button>
            </form>
        @endif
