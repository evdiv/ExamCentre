@component('mail::message')
Welcome to IELTick

Thank you for signing up with IELTick.
You've just taken the first step to improving your IELTS Speaking band.
We look forward to having you learn with us.

@component('mail::button', ['url' => env('APP_URL') . '/lessons/'])
IELTS Speaking Simulation Exams
@endcomponent

Thank you,<br>
IELTick Team
@endcomponent
