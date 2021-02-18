

Laravel netgsm Package
===


- **AUTHOR** Bünyamin AKÇAY bunyamin@bunyam.in


## Installation

You should install this package through Composer.

>composer require bakcay/netgsm:dev-main


You do not need to edit app.php if you are using laravel 7+,
- "7- Versions are not supported."

Edit .env file parameters below

```env
NETGSM_USER_CODE=53xxxxx
NETGSM_SECRET=123456
NETGSM_HEADER=Myfirm
```


## Usage


```php
 $message = new \Bakcay\NetGsm\NetGsm();
 $message->setMessage("Hello, Message")
            ->setNumber("05354440000")
            ->send();
```

That's it, enjoy.
