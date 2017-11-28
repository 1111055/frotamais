@component('mail::message')
# Gestão de veículos

Deseja uma gestão da frota automovel de forma personalizada? <br>
A aplicação web Frota+ garante essa gestão. 

Veja mais sobre a aplicação no documento em anexo. 

@component('mail::button', ['url' => 'https://www.frotamais.com'])
Peça já a sua inscrição.
@endcomponent

Aguardamos o seu contacto,<br>
{{ config('app.name') }}
@endcomponent
