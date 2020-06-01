## Laravel implementation for Flutterwave Using Rave Standard

Flutterwave offers payment collections. There are several ways of Integrating flutterwave into your platform:

- [Rave Inline](https://developer.flutterwave.com/docs/rave-inline-1).
- [Rave Standard](https://developer.flutterwave.com/docs/rave-standard).
- [Direct API Calls ](https://developer.flutterwave.com/reference).


Steps to Using this implementation

## Update .ENV file with your API KEYS and SECRET_HASH For webhook

```php
RAVE_SECRET_KEY=FLWPUBK_TEST-647f6289f74aba024f10cc12f71bd6a2-X
RAVE_PUBLIC_KEY=FLWSECK_TEST-1609ba49bee599841c9a590a97984685-X
Encryption Key=
SECRET_HASH=rAVE_SeRETha4SH

```

Update the except array located at /app/Http/Middleware/VerifyCsrfToken

```php
protected $except = [
        '/callback',
        '/checkout',
        '/webhook'
    ];
```

that's all...

Note:remember that the webhook address needs to be updated on your dashboard with all the options checked before use.
To go to your dashbord: https://dashboard.flutterwave.com

