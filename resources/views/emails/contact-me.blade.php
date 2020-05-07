@component('mail::message')

# A Heading

Lorem ipsum dolor sit amet.

- A list
- of differnt
- TODOs

@component('mail::button', ['url' => 'https://laracast.com'])
    Visit Laracasts
@endcomponent

@endcomponent