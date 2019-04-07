@component('mail::message')
Hello {{ $user->name }},

Thank you for your order!
Your records have been sent for evaluation. 
Evaluation takes us approximately 24 hours. 
After is is completed the report will be available for downloading.


Thank you,<br>
IELTick Team
@endcomponent
