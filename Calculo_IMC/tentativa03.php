
        <?php 
        error_reporting(E_ALL);
        ini_set("display_errors",1 );
        ?>

        <form method="get" action="tentativa03.php" class="form">
        	
   
                Nome:
                <input type="text" name="nome"/>
                <br></br>
                
                Seu Peso: 
                <input type="text" name="peso" required/>
                <br></br>
            
                Sua Altura (Use Pontuação: 1.99 Em METROS):
                <input type="text" name="altura" required/>
                <br></br>
                
                <input type="submit" name="envia" value="CALCULAR IMC" style="color: <?= random_color()?>;">
                <br></br>
                </form>
                
        <?php   
        $nome = isset($_GET["nome"])? $_GET["nome"]:null;
		$peso = isset($_GET["peso"])? $_GET["peso"]:null;
        $altura = isset($_GET["altura"])? $_GET["altura"]:null;        


        $input = array("Beba agua",
                        "Coma frutas e legumes",
                        "Beba agua", 
                        "BORA PRA CADIMIA", 
                        "Melhor uma pedra no caminho do que Duas nos rins, BEBA AGUA",
                        "Melhor uma pedra no caminho do que Duas nos rins, BEBA AGUA",);
        $rand_keys = array_rand($input, 2);
   
        
		// imc = peso / altura²);
        function imc($p, $a){
            error_reporting(E_ERROR | E_PARSE);

            if($imc = $p / ($a ** 2))        
            return $imc;
        }
         imc($peso, $altura);
        
        ?>
        
        <?php
		$resultado = number_format(imc($peso, $altura));
		
        function resultado($resultado){
            
            if(isset($resultado) && $resultado != '0'){}
            return $resultado;
        };


        $valores = [
        18.5 => "Peso Pena",
        24.9 => "na média",
        29.9 => "Um pouco a cima do peso, mas ta suave",
        34.9 => "Fordo",
        39.9 => "acima do peso",
        40.0 => "na hora de procurar um Cardiologista",
        49.0 => "na hora de procurar um Cardiologista"
    ];

        foreach($valores as $chave => $value){
            if(imc($peso, $altura) <= $chave){
              
                
                echo " Seu IMC é: ",resultado($resultado), "<br></br> $nome"," está ",$value, "<br></br>",$input[$rand_keys[1]] . "\n";;
                break;
            }
        }
       
        function random_color($start = 0x000000, $end = 0xFFFFFF) {
            return sprintf('#%06x', mt_rand($start, $end));
         }
		?>
			
