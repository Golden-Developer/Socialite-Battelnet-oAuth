# Socialite-BattleNet
BattleNet provider for Laravel Socialite/Socialite Providers.

## Install

Composer:

`composer require goldendeveloper/battlenet`

Same procedure as any other SocialiteProviders package. Add the event handler to the Socialite Providers array:

```
'Goldendeveloper\SocialiteProviders\BattleNet\BattleNetExtendSocialite@handle',
```

Place your environment variables in your `.env.`:

```
BATTLENET_KEY=client_id
BATTLENET_SECRET=client_secret
BATTLENET_REDIRECT_URI=https://example.com/login 
```

Now you have two options when using the provider.

## Usage (Socialite-way)

Now you can use the provider like so. The session flashing is only required if you need to use a BattleNet region other than `us`:

```
// redirect route
Session::put('bnet.region', 'eu');
return Socialite::with('battlenet')->redirect();

// callback route
$user = Socialite::driver('battlenet')->user();
$accountId = $user->getId(); // bnet accountId
$battletag = $user->getNickname(); // bnet battletag
```

## Usage (Laravel-way)

If you'd like to avoid flashing to the session yourself, you can use the included facade that manages it for you.

Install service provider:

```
Goldendeveloper\SocialiteProviders\BattleNet\BattleNetServiceProvider::class,
```

Install facade:

```
'BattleNet' => Goldendeveloper\SocialiteProviders\BattleNet\BattleNetFacade::class,
```

Now you can simply use the facade. The region defaults to `us`, so you don't even need to pass it through:

```
// redirect route
return BattleNet::redirect('eu');
```
