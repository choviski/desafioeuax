# Desafio Web Developer
Resolução do desafio da empresa EUAX

## Problema
ocê precisa criar um cadastro de projetos com a data de início e data final para a entrega, esse projeto pode ter 1 ou N atividades que também precisam ser cadastradas com as datas de início e data de fim. Após ter feito todos os cadastros precisamos saber quantos % dos projetos já temos finalizados e também se o projeto terá atrasos ou não. Para saber a % de andamento do projeto deve ser considerado o número de atividades finalizadas e quantidade de atividades ainda sem finalizar. Para saber se o projeto terá atraso considere a maior data final das atividades e compare com a data final do projeto, se for maior que a data final, o projeto terminará com atrasos. 

##  Tecnologias ulitizadas
- HTML
- SQL
- PHP
- FrameWork Laravel
- CSS
- Bootstrap 4
- Javascript
- servidor Apache
- gitHub

## Funcionamento 
O sistema lista todos os projetos existentes, cada projeto tem a opção de visualizar suas respectivas atividades, no cabeçalho encontramos as opções de cadastro de projeto e de atividade, caso o projeto tenha atrasos previsto o sistema exibe uma mensagem, logo abaixo do nome so projeto há uma barra de progressso que indica a porgentagem do projeto que está pronta.
Ao clicar na opção de cadastrar projeto uma janela abre com um formulário para o usuario inserir as informações relacionadas ao projeto.
ao clicar no botão de visualizar atividades o sistema irá listar todas as atividades de um respectivo projeto.
Ao clicar no botão de cadastro de atividade é aberto uma janela que pede para o usuario selecionar a qual projeto deseja inserir a nova atividade, após isso aparece um formulário para preencher de acordo com as informções da atividade.

## Como executar o projeto
Caso nunca tenho trabalhado com o framework Laravel, segue um passo a passo para executar o sistema: 
Após baixar o repositório na sua maquina, abra o arquivo .env com o bloco de notas;
na linha <APP_KEY=>;
apague tudo que está depois do primeiro igual(=);
agora no prompt de comando va até a pasta do repositorio;
digite o seguinte comando <php artisan key:generate>;
no php myAdmin crie o banco de dados chamado desafio;
ainda no prompt de comando digite <php artisan migrate>;
por fim digite <php artisan serve>;


obs1: o username do banco deve ser "root"
obs2: não pode ter senha para acessar o banco
obs3: o servidor que o laravel gera "localhost:8000" 

