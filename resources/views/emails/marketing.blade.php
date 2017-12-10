@component('mail::message')
# Gestão de veículos

<center>
Deseja uma gestão da frota automovel de forma personalizada? <br><br>
A aplicação web Frota+ garante essa gestão. 
</center>

@component('mail::button', ['url' => 'http://localhost:85/download'])
<center>
Faça o download do documento de funcionalidade.
</center>

@endcomponent
</center>

<center>
  - Combustivel <br>
  - Penus <br>
  - Alertas <br>
  - Gráficos <br>
  - Exportação de dados <br> <br>

 Tudo o que precisa de saber em tempo real e de facil percepção.

  </center>
  <br>
![](http://localhost:85/download/image2)



<center>
Poder gerir a sua frota tanto no pc como num telemovel em qualquer parte?</center>
<br>
![](http://localhost:85/download/image1)


@component('mail::button', ['url' => 'https://www.frotamais.com'])
Peça já a sua inscrição.
@endcomponent

Aguardamos o seu contacto,<br>
www.frotamais.com<br>
{{ config('app.name') }}
@endcomponent
