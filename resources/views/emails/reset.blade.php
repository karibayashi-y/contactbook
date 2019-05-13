<h3>
        <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
    </h3>
    <p>
        {{ __('下記URLをクリックして、パスワードを再設定してください。') }}<br>
    </p>
    <p>
        {{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
    </p>