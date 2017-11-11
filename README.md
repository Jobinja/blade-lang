## Blade Macro
This packages introduces some new language related blade directives.

### Language switch case

```php
@iflang('en')

Some marketing content...

@elselang('fa')

    محتوای بازاریابی

@endlang
```