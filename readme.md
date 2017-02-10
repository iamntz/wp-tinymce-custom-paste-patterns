### What is this?

WordPress allows you to automagically convert a selected text to a link when you paste an url (into TinyMCE). But how about converting ANY text into an URL? E.g. if you want to convert a _relative_ path to an url? If you know some very little Regex, you can tweak it as needed. Here is how:

### Usage

By default, it will accept clipboard content that follows this pattern: `/?go=NUMBER`. If you want to add a custom pattern, you can do so by using a filter in your `functions.php`:

```php
add_filter('ntz/tinymce/custom_paste_patterns', function($patterns){
  // Uncomment the next line if you want to remove any existing patterns!
  // $patterns = [];
  $patterns[] = '^(\/\?visit=\d)'; // /?visit=number
  $patterns[] = '^(\/goto\/\d)'; // /goto/number
  $patterns[] = '^(\/buy\/\w)'; // /buy/word
  return $patterns;
});
```

## Found this useful?

You can get [hosting](https://m.do.co/c/c95a44d0e992), [donate](https://www.paypal.me/iamntz) or buy me a [gift](http://iamntz.com/wishlist).

### License

MIT