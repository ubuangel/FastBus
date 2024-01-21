@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
</head>

    <body>
        <div class="container justify-content-center">
            <div class="d-flex mb-5">
                <div class="btn-tab arrow arrow-color">
                    <div>Elige tu asiento</div>
                </div>
                <div class="btn-tab arrow">
                    <div>Llena tus datos</div>
                </div>
                <div class="btn-tab arrow">
                    <div>Confirma tu reserva</div>
                </div>
            </div>
        </div>
        <div class="croquis_bus_general">
            <div class="container">
                <div class="column">
                    <div class="seat col1" id="49" data-bs-toggle="tooltip" data-precio="120.00">49</div>
                    <div class="seat col1" id="52" data-bs-toggle="tooltip" data-precio="120.00">52</div>
                    <div class="seat col1" id="55" data-bs-toggle="tooltip" data-precio="120.00">55</div>
                    <div class="seat col1" id="58" data-bs-toggle="tooltip" data-precio="120.00">58</div>
                    <div class="seat col1" id="61" data-bs-toggle="tooltip" data-precio="120.00">61</div>
                    <div class="seat col2" id="64" data-bs-toggle="tooltip" data-precio="120.00">64</div>
                    <div class="seat col2" id="67" data-bs-toggle="tooltip" data-precio="120.00">67</div>
                    <div class="seatempty col4"></div>
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                </div>
                <div class="column">
                    <div class="seat col2" id="50" data-bs-toggle="tooltip" data-precio="120.00">50</div>
                    <div class="seat col2" id="53" data-bs-toggle="tooltip" data-precio="120.00">53</div>
                    <div class="seat col2" id="56" data-bs-toggle="tooltip" data-precio="120.00">56</div>
                    <div class="seat col3" id="59" data-bs-toggle="tooltip" data-precio="120.00">59</div>
                    <div class="seat col3" id="62" data-bs-toggle="tooltip" data-precio="120.00">62</div>
                    <div class="seat col3" id="65" data-bs-toggle="tooltip" data-precio="120.00">65</div>
                    <div class="seat col3" id="68" data-bs-toggle="tooltip" data-precio="120.00">68</div>
                    <div class="seatempty col4"></div>
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                </div>
                <div class="column">
                    <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div>      
                    <div class="seatempty col4"></div>
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div>              
                </div>
                <div class="column">
                    <div class="seat col4" id="51" data-bs-toggle="tooltip" data-precio="120.00">51</div>
                    <div class="seat col4" id="54" data-bs-toggle="tooltip" data-precio="120.00">54</div>
                    <div class="seat col4" id="57" data-bs-toggle="tooltip" data-precio="120.00">57</div>
                    <div class="seat col4" id="60" data-bs-toggle="tooltip" data-precio="120.00">60</div>
                    <img class="h-8 w-auto" src="{{ asset('img/svg/baño.svg') }}" alt="baño" >
                    <div class="seat col4" id="66" data-bs-toggle="tooltip" data-precio="120.00">66</div>
                    <div class="seat col4" id="69" data-bs-toggle="tooltip" data-precio="120.00">69</div>
                    <div class="seatempty col4"></div>
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                </div>
                <div class="column">
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div>
                    <div class="seatempty col4"></div>
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                </div>
                <div class="column">
                    <div class="seat col4" id="1" data-bs-toggle="tooltip" data-precio="90.00">1</div>
                    <div class="seat col4" id="5" data-bs-toggle="tooltip" data-precio="90.00">5</div>
                    <div class="seat col4" id="9" data-bs-toggle="tooltip" data-precio="90.00">9</div>
                    <div class="seat col4" id="13" data-bs-toggle="tooltip" data-precio="90.00">13</div>
                    <div class="seat col4" id="17" data-bs-toggle="tooltip" data-precio="90.00">17</div>
                    <div class="seat col4" id="21" data-bs-toggle="tooltip" data-precio="90.00">21</div>
                    <div class="seat col4" id="25" data-bs-toggle="tooltip" data-precio="90.00">25</div>
                    <div class="seat col4" id="29" data-bs-toggle="tooltip" data-precio="90.00">29</div>
                    <div class="seat col4" id="33" data-bs-toggle="tooltip" data-precio="90.00">33</div>
                    <div class="seat col4" id="37" data-bs-toggle="tooltip" data-precio="90.00">37</div>
                    <div class="seat col4" id="41" data-bs-toggle="tooltip" data-precio="90.00">41</div>
                    <div class="seat col4" id="45" data-bs-toggle="tooltip" data-precio="90.00">45</div>
                </div>
                <div class="column">
                    <div class="seat col4" id="2" data-bs-toggle="tooltip" data-precio="90.00">2</div>
                    <div class="seat col4" id="6" data-bs-toggle="tooltip" data-precio="90.00">6</div>
                    <div class="seat col4" id="10" data-bs-toggle="tooltip" data-precio="90.00">10</div>
                    <div class="seat col4" id="14" data-bs-toggle="tooltip" data-precio="90.00">14</div>
                    <div class="seat col4" id="18" data-bs-toggle="tooltip" data-precio="90.00">18</div>
                    <div class="seat col4" id="22" data-bs-toggle="tooltip" data-precio="90.00">22</div>
                    <div class="seat col4" id="26" data-bs-toggle="tooltip" data-precio="90.00">26</div>
                    <div class="seat col4" id="30" data-bs-toggle="tooltip" data-precio="90.00">30</div>
                    <div class="seat col4" id="34" data-bs-toggle="tooltip" data-precio="90.00">34</div>
                    <div class="seat col4" id="38" data-bs-toggle="tooltip" data-precio="90.00">38</div>
                    <div class="seat col4" id="42" data-bs-toggle="tooltip" data-precio="90.00">42</div>
                    <div class="seat col4" id="46" data-bs-toggle="tooltip" data-precio="90.00">46</div>

                </div>
                <div class="column">
                <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                    <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                    <div class="seatempty col4"></div> 
                    <div class="seatempty col4"></div> 
                </div>
                <div class="column">
                    <div class="seat col4" id="3" data-bs-toggle="tooltip" data-precio="90.00">3</div>
                    <div class="seat col4" id="7" data-bs-toggle="tooltip" data-precio="90.00">7</div>
                    <img class="h-8 w-auto" src="{{ asset('img/svg/baño.svg') }}" alt="baño" > 
                    <div class="seat col4" id="15" data-bs-toggle="tooltip" data-precio="90.00">15</div>
                    <div class="seat col4" id="19" data-bs-toggle="tooltip" data-precio="90.00">19</div>
                    <div class="seat col4" id="23" data-bs-toggle="tooltip" data-precio="90.00">23</div>
                    <div class="seat col4" id="27" data-bs-toggle="tooltip" data-precio="90.00">27</div>
                    <div class="seat col4" id="31" data-bs-toggle="tooltip" data-precio="90.00">31</div>
                    <div class="seat col4" id="35" data-bs-toggle="tooltip" data-precio="90.00">35</div>
                    <div class="seat col4" id="39" data-bs-toggle="tooltip" data-precio="90.00">39</div>
                    <div class="seat col4" id="43" data-bs-toggle="tooltip" data-precio="90.00">43</div>
                    <div class="seat col4" id="47" data-bs-toggle="tooltip" data-precio="90.00">47</div>
                </div>
                <div class="column">
                    <div class="seat col4" id="4" data-bs-toggle="tooltip" data-precio="90.00">4</div>
                    <div class="seat col4" id="8" data-bs-toggle="tooltip" data-precio="90.00">8</div>
                    <img class="h-8 w-auto" src="{{ asset('img/svg/baño.svg') }}" alt="baño" >
                    <div class="seat col4" id="16" data-bs-toggle="tooltip" data-precio="90.00">16</div>
                    <div class="seat col4" id="20" data-bs-toggle="tooltip" data-precio="90.00">20</div>
                    <div class="seat col4" id="24" data-bs-toggle="tooltip" data-precio="90.00">24</div>
                    <div class="seat col4" id="28" data-bs-toggle="tooltip" data-precio="90.00">28</div>
                    <div class="seat col4" id="32" data-bs-toggle="tooltip" data-precio="90.00">32</div>
                    <div class="seat col4" id="36" data-bs-toggle="tooltip" data-precio="90.00">36</div>
                    <div class="seat col4" id="40" data-bs-toggle="tooltip" data-precio="90.00">40</div>
                    <div class="seat col4" id="44" data-bs-toggle="tooltip" data-precio="90.00">44</div>
                    <div class="seat col4" id="48" data-bs-toggle="tooltip" data-precio="90.00">48</div>
                </div>
            </div>
        </div>
    </body>
@endsection
