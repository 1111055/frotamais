@component('mail::message')
# Recebeu um Alerta

Tem um *novo* alert no seu sistema de **alertas**.

@component('mail::button', ['url' => 'http://google.pt'])
Teste Exeplo botão!!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
