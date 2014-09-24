php-Safe
========

Send data safely trough PHP


========
###Function List

#####randomString
Will generate a random string, you might give a lenght or a character set (array or string).

#####hash
Will hash your string or array to a safe unreadable format(usable for password hashing).

#####strenght
Will check you given string or array against some simple strenght rules (ammount of chars/upper/lower/special, dubble and lenght).

#####sCrypt
Encrypt your values with keys (one ore multiple in an array).

#####sDecrypt
Decrypts the values you've given, keys should be same as sCrypt keys, in the same order.


#####convert_multi_key
Converts multiple keys in array to one hashed value