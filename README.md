SlickPassword
=============

SlickPassword is a lightweight Service class to generate pronounceable passwords with PHP. You can use it for either a
password manager application, generate initial passwords or what ever.

Functions
=========
SlickPassword generates pronounceable passwords with a user defined length. The Passwords consists of a pronounceable string,
Numbers ans Special Characters. The String can generated for english or germany language. The special characters are
optimized for english, german, english IOS and german IOS Keyboard layouts.
The three groups of signs (string, number, special characters) are permuted randomly to get a higher entropy.

Example
=======
```php
$slickPassword = new phpshaper\slickauth\SlickPassword();
// US Password, total lenght 16 signs. 3 Numbers and 3 special characters
echo $slickPassword->generateUS (16, 3, 3). " ";
// US Password, optimized for IOS , total lenght 16 signs. 2 Numbers and 4 special characters
echo $slickPassword->generateUSiOS (16, 2, 4). " ";
// DE Password, total lenght 16 signs. 1 Number and 1 special characters
echo $slickPassword->generateDE (16, 1, 1). " ";
// DE Password, optimized for IOS, total lenght 16 signs. 3 Numbers and 4 special characters
echo $slickPassword->generateDEiOS (16, 3, 4). " ";
```

Prerequisites
-------------
PHP 5.3

Reference
---------
* Homepage:http://phpshaper.com
* Documentation:
** englisch: http://phpshaper.com/en/en/2014/02/23/61-slickpassword-pronounceable-passwords.html
** deutsch: http://phpshaper.com/easyblog/2014/02/23/62-slickpassword-aussprechbare-passworter.html
* E-Mail: info (at) phpshaper.com
* GITHUB:https://github.com/phpshaper/SlickPassword

History
=======
I created this class in 2009 within a Java/Spring Project. Well, after ten years of self-destructive Java addiction,  I´am now detoxified.
I started to scan my codebase and found this little usefull class and ported it to php.
