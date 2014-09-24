php-Safe
========

Send data safely trough PHP


###Why PHP-Safe
I can not make you use this library. The library was made to make it easy to handle php security settings. Files, strings and passwords will be converted better and more usable.

Safety is important, i don't care how you do it, as long as you do it.

###How to use PHP-Safe
Setting up PHP safe is easy, just use it as every other class.

```php
    include_once('phpSafe.php');
```


Function list
========


#####randomString
Will generate a random string, you might give a lenght or a character set (array or string).

#####hash
Will hash your string or array to a safe unreadable format(usable for password hashing).

#####strenght
Will check you given string or array against some simple strenght rules (ammount of chars/upper/lower/special, dubble and lenght).

#####sCrypt
Encrypt your values with keys (one ore multiple in an array).

#####sDecrypt
Decrypts the values you've given, keys should be same as sCrypt keys in the same order.


#####convert_multi_key
Converts multiple keys inside an array to one hashed value.

#####lockFile
Locks a file by giving it an .lock extension and crypting all contents with a key

#####unlockfile
Unlocks a file and removes .lock extension