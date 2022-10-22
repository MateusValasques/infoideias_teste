<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        //compara o quociente de divisão inteira
        //se for zero, o ano está no seculo dos seus primeiros digitos atraves de ano/100
        if($ano%100 == 0){
            return intdiv($ano, 100);
        }
        //Se não for zero, significa que já está no seculo seguinte ao seus primeiros dígitos
        else{
            return intdiv($ano, 100)+1;
        }
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    function EPrimo(int $numero){
        //Função que vai determinar se é um número primo comparando o quociente inteiro da divisão do número
        //por seus antecessores
        for ($a=2; $a < $numero; $a++){
            
            if($numero % $a == 0){
                return false;
            }
        }
        return true;
    }
    public function PrimoAnterior(int $numero): int {
        //Vai iterar os números anteriores para descobrir o primo mais próximo
        for($numero = $numero -1; $numero>0; $numero--){
            
            if(EPrimo($numero) == true){
    
                return $numero;
            }
            
            
        }
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        //Inicialização com o menor número possível na linguagem
        $primeiro = PHP_INT_MIN;
        $segundo = PHP_INT_MIN;
        
        for($i = 0; $i < count($arr); $i++ ){
            
            foreach($arr[$i] as $num){
                if($num > $primeiro){
                    //Passa para o segundo maior quando encontra um maior que ele mesmo
                    $segundo = $primeiro;
                    $primeiro = $num;
                }
    
                if ($num > $segundo && $num < $primeiro){
                    $segundo = $num;
                }
            }
        }
        return $segundo;
            
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */


	public function SequenciaCrescente(array $arr): boolean {
        //Já direciona para o caso de array com apenas 1 item retornar true
        if(count($arr) > 1){

            for($i = 0; $i < count($arr)-1; $i++){
                //Compara o atual com o próximo para acompanhar quebra no crescimento
                if($arr[$i] >= $arr[$i+1]){
                    array_splice($arr, $i, 1);
                    //Quando encontra a quebra de padrão, remove o componente atual e tenta novamente
                    for($j = 0; $j < count($arr)-1; $j++){
                        //Se encontrar outra quebra de padrão, retorna falso pois iria requer mais de uma retirada
                        if($arr[$j] >= $arr[$j+1]){
                            return false;
                        }
                    }
                    
                } 
            }
        }
        //Se não tiver mais de uma quebra de padrão, a função resulta true
        return true;
    }
}
