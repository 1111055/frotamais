@component('mail::message')
# Gestão de Frota Automóvel

Exº {{$dados->name_user}}

<center>
Acusa-mos a recepção do seu pedido de contacto. <br><br>
</center>

<center>
A equipa Frota+ agradeçe o seu interesse, brevemente receberá um email com instruções de acesso a plataforma. <br><br>
</center>

Os seus dados:

Nome: {{$dados->name_user}}
<hr>
Email: {{$dados->email_user}}
<hr>
Empresa: {{$dados->name_empresa}}
<hr>
Nif: {{$dados->nif}}


@component('mail::button', ['url' => 'https://frotamais.com'])
Frota+
@endcomponent

<br><br>


<center>
<strong>Usufrua da plataforma e faça uma grande gestão.</strong> 
</center>

<br><br>


www.frotamais.com<br>
{{ config('app.name') }}
@endcomponent
