@component('mail::message')
Hello {{ $user->name }},

Thank you for your order!
New IELTS Virtual Exam has been created successfully!

@component('mail::button', ['url' => env('APP_URL') . '/lessons/'])
	Open your IELTS Speaking Exams
@endcomponent

Thanks,<br>
IELTick Team
@endcomponent
