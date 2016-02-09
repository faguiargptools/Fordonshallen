@extends('layouts.master')

@section('bodyClass') body_adblue @stop

@section('adblue-inaktivering')
    active
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Vad är AdBlue?</h2>
        <p>AdBlue-vätska är en giftfri lösning som består utav 32,5 % urea och 67,5 % avjoniserat vatten och som används för att minska kväveoxiden i avgasutsläppen från tunga dieselfordon. Detta uppnås genom att Adblue-vätska i finfördelad form tillsätts till avgaserna innan de passerar genom katalysatorn där större delen utav avgasernas kväveoxid omvandlas till kvävgas och vatten. Det är naturligtvis bra, men det finns dessvärre en del nackdelar också framför allt i form utav höga kostnader för AdBlue-vätska som ständigt behöver fyllas på och för att laga känsliga komponenter i SCR-systemet, som ofta går sönder. Fordonshallen erbjuder ett permanent slut på kostsamma reparationer av AdBlue-systemet med hjälp utav våra högkvalitativa AdBlue enheter!</p>
        <a href="/adblue-inaktivering">Läs mer om AdBlue Inaktivering här!</a>
        <img src="/img/19584952-QzDsq.jpg" class="center-block img-responsive img-thumbnail mt50" />
    </div>
</div>
@stop
