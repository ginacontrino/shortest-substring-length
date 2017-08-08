### Shortest substring from a stream

This is a PHP script that takes a stream and returns the length of the shortest substring. 
For example, if your input text was 'Ty name is Tanmay' and the substring we are looking for was 'Tanmay',
then the shortest length of a substring would be 6. 

##### Note: I only consider each character once, so the 'a' in 'Tanmay' is not considered as 2 different characters.

#### How to use it

you simply pipe your file (or text, or website with text) trough the script and pass your substring through as an argument:

in case of a file:

```
cat input.txt | php execute.php 'you substring'
```

in case of a text:

```
echo 'your interesting text' | php execute.php 'your substring'
```

in case of a website:

```
curl https://someexamplewebsitewithtext.com | php execute.php 'your substring'
```
<br><br>
I also added some tests, so currently you would have to `composer install` and just run `phpunit test.php`.<br>
Since you don't really need so install PHPUnit for this kind of test, I will change this soon. Using PHPUnit 
here is a bit ridiculous, I know. :stuck_out_tongue_winking_eye:
