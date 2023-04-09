@component('mail::message')
# Welcome to Laravel Fundamentals

The body of your message.

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| {{ $product->name}}      | {{$product->quantity}}      | {{$product->price}}      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
