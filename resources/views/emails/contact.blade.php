
    @component('mail::message')


    # NAME : {{$details['name']}}
    # SUBJECT : {{$details['subject']}}
    # EMAIL : {{$details['email']}}

    # MESSAGE : {{$details['message']}}




    {{ config('app.name') }}
    @endcomponent

