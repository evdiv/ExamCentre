@component('mail::message')
Welcome to IELTick

Thank you for signing up with IELTick.
You've just taken the first step to improving your IELTS Speaking score.
We look forward to having you learn with us, too.

@component('mail::button', ['url' => env('APP_URL') . '/lessons/'])
Your Demo IELTS Speaking Exam
@endcomponent

Thank you,<br>
IELTick Team
@endcomponent
